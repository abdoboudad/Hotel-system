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

<div class="card p-3">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="work_time" class="form-label">{{ __('custom.role') }} <span class="text-danger">*</span></label>
            <select class="form-select" name="role" aria-label="Default select example">
                <option selected value="{{ old('role') }}">{{ __('custom.select_role') }}</option>
                <option value="manager">{{ __('custom.manager_role') }}</option>
                <option value="tester">{{ __('custom.tester_role') }}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="useremail" class="form-label">{{ __('custom.email') }} <span class="text-danger">*</span></label>
            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="useremail" placeholder="{{ __('custom.enter_email') }}" required="">
            @error('email')
                <div class="invalid-feedback">
                    {{ __('custom.enter_email_message') }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">{{ __('custom.username') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control " value="{{ old('name') }}" name="name" id="username" placeholder="{{ __('custom.enter_username') }}" required="">
            @error('name')
                <div class="invalid-feedback">
                    {{ __('custom.enter_email_message') }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="password-input">{{ __('custom.password') }} <span class="text-danger">*</span></label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password" class="form-control password-input pe-5" onpaste="return false" placeholder="{{ __('custom.enter_password') }}" id="password-input" name="password" required="">
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">{{ __('custom.password_confirmation') }} <span class="text-danger">*</span></label>
            <input type="password" class="form-control " name="password_confirmation" id="username" placeholder="{{ __('custom.confirm_password') }}" required="">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ __('custom.enter_email_message') }}
                </div>
            @enderror
        </div>

        <div class="mt-4">
            <button class="btn btn-primary w-100" type="submit">{{ __('custom.sign_up') }}</button>
        </div>
    </form>
</div>


@endsection