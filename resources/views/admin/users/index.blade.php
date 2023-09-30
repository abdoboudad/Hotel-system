@extends('admin.layouts.layout')
@section('content')
<div class="card mt-2">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                <span>{{ __('custom.Success') }}</span>
            </div>
        @endif
    </div>
    <div class="card-header">
        <h5>{{ __('custom.user Info') }}</h5>
    </div>
    <div class="card-body">
        <div class="text-end pb-3">
            <a href="{{ route('user.create') }}" class="btn btn-primary d-flex align-items-center" style="width:180px">
                <span class="material-icons-outlined">
                    add
                </span>
                <span class="ms-2">{{ __('custom.Add user') }}</span>
            </a>
        </div>
        <div class="table-responsive">
    <table class="table table-bordered">
                <thead class="table-secondary">
                <tr>
                    <th scope="col">{{ __('custom.user Id') }}</th>
                    <th scope="col">{{ __('custom.Name') }}</th>
                    <th scope="col">{{ __('custom.Job') }}</th>
                    <th scope="col">{{ __('custom.Action') }}</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="d-flex">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary d-flex align-items-center me-2">
                                    <span class="material-icons-outlined">
                                        border_color
                                    </span>
                                    <span class="ms-2">{{ __('custom.Edit') }}</span>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="pe-2"> 
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger d-flex align-items-center" onclick="return confirm('{{ __('custom.Confirm delete') }}')" type="submit">
                                        <span class="material-icons-outlined">
                                            delete
                                        </span>
                                        <span class="ms-2">{{ __('custom.Delete') }}</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">{{ __('custom.No users found') }}</td>
                        </tr>
                    @endforelse
                
                </tbody>
        </table>
        </div>
      
    </div>
       
</div>

@endsection