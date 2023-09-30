@extends('admin.layouts.layout')
@section('content')
<div class="container mt-2">
    @if (session('success'))
        <div class="alert alert-success">
            <span>{{ session('success') }}</span>
        </div>
    @endif
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card mt-2">
    <div class="card-header">
        <h5>{{ __('custom.Rooms Info') }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('room.update',$room->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="work_time" class="form-label">{{ __('custom.Client') }}</label>
                <select class="form-select" name="client_id" aria-label="Default select example">
                    <option selected value="{{  $room->client_id }}">{{  $room->client->name }}</option>
                    @forelse ($clients as $client)
                    
                        <option value="{{ $client->id }}">{{ $client->name }} </option>
                    @empty
                        
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Room type') }}</label>
                <select class="form-select" name="room_type" aria-label="Default select example">
                    <option selected>{{ $room->room_type }}</option>
                    <option value="{{ __('custom.one room') }}">{{ __('custom.one room') }}</option>
                    <option value="{{ __('custom.one room') }}">{{ __('custom.children room') }}</option>
                    <option value="{{ __('custom.one room') }}">{{ __('custom.vip room') }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Room number') }}</label>
                <input type="number" class="form-control" value="{{ $room->room_num}}"  aria-describedby="emailHelp" name="room_num" placeholder="{{ __('custom.Room number') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Room price') }}</label>
                <input type="number" class="form-control"  id="room_price"  aria-describedby="emailHelp" placeholder="{{ __('custom.Room price') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Room reservation') }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reserved" value="true" id="ontrue" {{ $room->reserved == 'true' ? 'checked' : '' }}>
                    <label class="form-check-label" for="ontrue">
                        {{ __('custom.Reserved') }}
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="reserved" value="false" id="onfalse" {{ $room->reserved == 'false' ? 'checked' : '' }}>
                    <label class="form-check-label" for="onfalse">
                        {{ __('custom.Not Reserved') }}
                    </label>
                  </div>
            </div>
            <div class="mb-3" id="payment" style="display: none;">
                <label for="work_time" class="form-label">{{ __('custom.Payment status') }}</label>
                <select class="form-select" id="choose_pay" aria-label="Default select example">
                    <option selected value="false">{{ __('custom.No payment has been made') }}</option>
                    <option value="true">{{ __('custom.A sum of money has been paid') }}</option>
                </select>
                <div class="px-4 py-2" id="prices" style="display: none;">
                    <label for="exampleInputEmail1" class="form-label">{{ __('custom.first_price_label') }}</label>
                    <input type="text" class="form-control" value="{{ $room->first_price}}" id="first_price" aria-describedby="emailHelp" name="first_price" placeholder="{{ __('custom.first_price_label') }}">
                    <label for="exampleInputEmail1" class="form-label">{{ __('custom.final_price_label') }}</label>
                    <input type="number" class="form-control" value="{{ $room->final_price}}" id="final_price" aria-describedby="emailHelp" name="final_price" placeholder="{{ __('custom.final_price_label') }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Reservation date') }}</label>
                <input type="date" class="form-control" id="rev_date" value="{{ $room->rev_date}}" aria-describedby="emailHelp" name="rev_date">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Reservation expiration date') }}</label>
                <input type="date" class="form-control" id="rev_ex_date" value="{{ $room->rev_ex_date}}" aria-describedby="emailHelp" name="rev_ex_date">
            </div>
            <div style="border-radius:5px" class="p-2 bg-dark bg-gradient text-light">
                <ul class="m-0">
                    <li>
                        <span><strong>{{ __('custom.Total days') }}:</strong><span class="result mx-2" id="result"></span></span>
                    </li>
                    <li>
                        <span><strong>{{ __('custom.Price') }}:</strong><span class="mx-2" id="price"></span></span>
                    </li>
                    <li>
                        <span><strong>{{ __('custom.Total price') }}:</strong><input type="number" name="total_price" id="total_price" value="{{ $room->total_price}}" hidden><span class="mx-2" id="mytotal"></span><span>$</span></span>
                    </li>
                </ul>
            </div>
            <div class="pt-2 text-center">
                <button type="submit" class="btn btn-primary px-4">{{ __('custom.Post') }}</button>
            </div>
            
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#onfalse').click(()=>{
            $('#payment').hide(600)
            $('#prices').hide(600);
        });
        $('#ontrue').click(()=>{
            $('#payment').show(600)
        });
        $('#choose_pay').change(()=>{
            if($('#choose_pay').val() == 'true'){
                $('#prices').show(600);
            }else{
                $('#prices').hide(600);
            }
            console.log($('#choose_pay').val());
        })
            // Function to calculate the difference in days between two dates
        const calculateDateDifference = ()=>{
            const revDate = new Date($('#rev_date').val());
            const revExDate = new Date($('#rev_ex_date').val());

            const differenceInMilliseconds = revExDate - revDate;
            const differenceInDays = differenceInMilliseconds / (1000 * 60 * 60 * 24);
            $('#price').text($('#room_price').val());

            if (isNaN(revDate) || isNaN(revExDate)) {
                $('#result').text('Please enter the dates');
                $('#mytotal').text('...');
                return;
            }
            $('#result').text(differenceInDays + ' days');
            const total = differenceInDays * $('#room_price').val()
            $('#mytotal').text(total)
            $('#total_price').attr('value',total)

            console.log($('#room_price').val());
            console.log(differenceInDays);
        }

        // Add a change event listener to both date inputs
        $('#rev_date, #rev_ex_date,#mytotal').change(function() {
            calculateDateDifference();
        });
    });
    
</script>
@endsection