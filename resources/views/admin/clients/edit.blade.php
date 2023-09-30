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
        <h5>{{ __('custom.Client Info Edit') }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('client.update', $client->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Name') }}</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $client->name }}" name="name" aria-describedby="emailHelp" placeholder="{{ __('custom.Name') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Email') }}</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $client->email }}" aria-describedby="emailHelp" name="email" placeholder="{{ __('custom.Email') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Phone number') }}</label>
                <input type="number" class="form-control" id="exampleInputEmail1" value="{{ $client->phone }}" aria-describedby="emailHelp" name="phone" placeholder="{{ __('custom.Phone number') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Personal judgment type') }}</label>
                <select class="form-select" name="card_type" aria-label="Default select example">
                    <option selected>{{ __('custom.' . $client->card_type) }}</option>
                    <option>{{ __('custom.National card') }}</option>
                    <option>{{ __('custom.Passport') }}</option>
                    <option>{{ __('custom.Chike') }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('custom.Card judgment number') }}</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $client->card_number }}" aria-describedby="emailHelp" name="card_number" placeholder="{{ __('custom.Card judgment number') }}">
            </div>
            <div class="pt-2 text-center">
                <button type="submit" class="btn btn-primary px-4">{{ __('custom.Post') }}</button>
            </div>
        </form>
    </div>
</div>

@endsection