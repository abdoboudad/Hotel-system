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
        <h5>{{ __('custom.Employee Info') }}</h5>
    </div>
    <div class="card-body">
        <div class="text-end pb-3">
            <a href="{{ route('employee.create') }}" class="btn btn-primary d-flex align-items-center" style="width:180px">
                <span class="material-icons-outlined">
                    add
                </span>
                <span class="ms-2">{{ __('custom.Add Employee') }}</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-secondary">
                  <tr>
                    <th scope="col">{{ __('custom.Employee Id') }}</th>
                    <th scope="col">{{ __('custom.Name') }}</th>
                    <th scope="col">{{ __('custom.Job') }}</th>
                    <th scope="col">{{ __('custom.Work time') }}</th>
                    <th scope="col">{{ __('custom.Join date') }}</th>
                    <th scope="col">{{ __('custom.Salary') }}</th>
                    <th scope="col">{{ __('custom.Action') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->job }}</td>
                            <td>{{ $employee->work_time }}</td>
                            <td>{{ $employee->join_date }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td class="d-flex">
                                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary d-flex align-items-center me-2">
                                    <span class="material-icons-outlined">
                                        border_color
                                    </span>
                                    <span class="ms-2">{{ __('custom.Edit') }}</span>
                                </a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="pe-2"> 
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
                            <td colspan="7">{{ __('custom.No employees found') }}</td>
                        </tr>
                    @endforelse
                  
                </tbody>
            </table>
        </div>
       
    </div>
       
</div>

@endsection