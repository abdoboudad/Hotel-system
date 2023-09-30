@extends('admin.layouts.layout')
@section('content')
<div class="card mt-2">
  <div class="card-header">
      <h5>{{ __('custom.Clients Info') }}</h5>
  </div>
  <div class="card-body">
      <table class="table table-striped table-bordered table-responsive table-sm" cellspacing="0">
          <thead>
              <tr>
                  <th scope="row">{{ __('custom.Name') }}</th>
                  <th>{{ __('custom.Email') }}</th>
                  <th>{{ __('custom.Number') }}</th>
                  <th>{{ __('custom.Personal judgment type') }}</th>
                  <th>{{ __('custom.Card judgment number') }}</th>
                  <th>{{ __('custom.Join date') }}</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->email }}</td>
                  <td>{{ $client->phone }}</td>
                  <td>{{ $client->card_type }}</td>
                  <td>{{ $client->card_number }}</td>
                  <td>{{ date('d-m-Y', strtotime($client->created_at)) }}</td>
              </tr>
          </tbody>
      </table>
  </div>
</div>

@endsection