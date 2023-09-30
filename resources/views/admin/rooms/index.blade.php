@extends('admin.layouts.layout')
@section('content')
<div class="container mt-2">
    @if (session('success'))
        <div class="alert alert-success">
            <span>{{ session('success') }}</span>
        </div>
    @endif
</div>
<div class="card mt-2">
    <div class="card-header">
        <h5>{{ __('custom.Rooms Info') }}</h5>
    </div>
    <div class="card-body">
        <div class="text-end pb-3">
            <a href="{{ route('room.create') }}" class="btn btn-primary d-flex align-items-center" style="width:160px">
                <span class="material-icons-outlined">
                    add
                </span>
                <span class="ms-2">{{ __('custom.Add Rooms') }}</span>
            </a>
        </div>
        <div class="table-responsive">
             <table class="table table-bordered">
            <thead class="table-secondary">
              <tr>
                <th scope="col">{{ __('custom.Room Id') }}</th>
                <th scope="col">{{ __('custom.Price') }}</th>
                <th scope="col">{{ __('custom.Type') }}</th>
                <th scope="col">{{ __('custom.Reservation status') }}</th>
                <th scope="col">{{ __('custom.Payment') }}</th>
                <th scope="col">{{ __('custom.Leaved') }}</th>
                <th scope="col">{{ __('custom.Reservation Time') }}</th>
                <th scope="col">{{ __('custom.Reservation expiration') }}</th>
                <th scope="col">{{ __('custom.Action') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $room)
                    <tr>
                        <th scope="row">{{ $room->room_num }}</th>
                        <td>{{ $room->total_price }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td>{!! $room->reserved == 'false' ? '<span class="btn btn-success">' . __('custom.Not Reserved') . '</span>' : '<span class="btn btn-danger">' . __('custom.Reserved'). ' by '. $room->client->name . '</span>' !!}</td>
                        <td>{!! $room->first_price == '' ? '<span class="btn btn-info">' . __('custom.Not Payed') . '</span>' : '<span class="btn btn-danger">' . __('custom.Payed') . '</span>' !!}</td>
                        <td>{!! $room->final_price == '' ? '<span class="btn btn-warning">' . __('custom.Verified Payment') . '</span>' : '<span class="btn btn-danger">' . __('custom.Verified') . '</span>' !!}</td>
                        <td>{{ $room->rev_date }}</td>
                        <td>{{ $room->rev_ex_date }}</td>
                        <td class="d-flex">
                            <a href="{{ route('room.edit',$room->id) }}" class="btn btn-primary d-flex align-items-center me-2">
                                <span class="material-icons-outlined">
                                    border_color
                                </span>
                                <span class="ms-2">{{ __('custom.Edit') }}</span>
                            </a>
                            <form action="{{ route('client.destroy',$room->id) }}" method="POST" class="pe-2"> 
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger d-flex align-items-center" onclick="return confirm('{{ __('custom.Do you want to delete this item?') }}')" type="submit">
                                    <span class="material-icons-outlined">
                                        delete
                                    </span>
                                    <span class="ms-2">{{ __('custom.Delete') }}</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
        </div>
       
    </div>
</div>

@endsection