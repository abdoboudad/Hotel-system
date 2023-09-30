@extends('admin.layouts.layout')
@section('content')

<div class="container">
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
        <h2>{{ __('custom.Edit Employee') }}</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('custom.Name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
            </div>

            <div class="mb-3">
                <label for="job" class="form-label">{{ __('custom.Job') }}</label>
                <select class="form-select" name="job" aria-label="Default select example">
                    <option selected>{{ __('custom.Select job') }}</option>
                    <option>{{ __('custom.cook') }}</option>
                    <option>{{ __('custom.admin') }}</option>
                    <option>{{ __('custom.Reservations employee') }}</option>
                    <option>{{ __('custom.Receptionist') }}</option>
                    <option>{{ __('custom.Carson Restaurant') }}</option>
                    <option>{{ __('custom.Guidance post') }}</option>
                    <option>{{ __('custom.Maintenance Engineer') }}</option>
                    <option>{{ __('custom.Room attendant') }}</option>
                </select>
            </div>

            <!-- ... previous code ... -->

            <div class="mb-3">
                <label for="work_time" class="form-label">{{ __('custom.Work Time') }}</label>
                <select class="form-select" name="work_time" aria-label="Default select example">
                    <option selected>{{ __('custom.Work Time') }} {{ $employee->work_time }}</option>
                    <option>8AM to 6PM</option>
                    <option>10AM to 8PM</option>
                    <option>12AM to 12PM</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Personal judgment type') }}</label>
                <select class="form-select" name="card_type" aria-label="Default select example">
                    <option selected>{{ __('custom.Select card type') }}</option>
                    <option>{{ __('custom.National card') }}</option>
                    <option>{{ __('custom.Pasport') }}</option>
                    <option>{{ __('custom.Chike') }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Card judgment number') }}</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $employee->card_number }}" aria-describedby="emailHelp" name="card_number" placeholder="your card number">
            </div>

            <div class="mb-3">
                <label for="join_date" class="form-label">{{ __('custom.Join Date') }}</label>
                <input type="date" class="form-control" id="join_date" name="join_date" value="{{ $employee->join_date }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Phone number') }}</label>
                <input type="number" class="form-control" value="{{ $employee->phone }}" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" placeholder="your phone">
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">{{ __('custom.Salary') }}</label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('custom.Update') }}</button>

            <!-- ... rest of the form ... -->

        </form>
    </div>
</div>





       
@endsection