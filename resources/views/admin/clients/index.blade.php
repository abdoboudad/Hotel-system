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
        <h5>{{ __('custom.Clients Info') }}</h5>
    </div>
    <div class="card-body">
        <div class="text-end pb-3">
            <a href="{{ route('client.create') }}" class="btn btn-primary d-flex align-items-center" style="width:160px">
                <span class="material-icons-outlined">
                    add
                </span>
                <span class="ms-2">{{ __('custom.Add Clients') }}</span>
            </a>
        </div>
        <div class="table-responsive">
             <table class="table table-bordered">
            <thead class="table-secondary">
              <tr>
                <th scope="col">{{ __('custom.Client Id') }}</th>
                <th scope="col">{{ __('custom.Name') }}</th>
                <th scope="col">{{ __('custom.Email') }}</th>
                <th scope="col">{{ __('custom.Phone') }}</th>
                <th scope="col">{{ __('custom.Action') }}</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td class="d-flex">
                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-primary d-flex align-items-center me-2">
                                <span class="material-icons-outlined">
                                    border_color
                                </span>
                                <span class="ms-2">{{ __('custom.Edit') }}</span>
                            </a>
                            <a href="{{ route('client.show', $client->id) }}" class="btn btn-success d-flex align-items-center me-2">
                                <span class="material-icons-outlined">
                                    more
                                </span>
                                <span class="ms-2">{{ __('custom.More') }}</span>
                            </a>
                            <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="pe-2"> 
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger d-flex align-items-center" onclick="return confirm('{{ __('custom.do you want to delete this item?') }}')" type="submit">
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