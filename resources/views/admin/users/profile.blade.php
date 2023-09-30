@extends('admin.layouts.layout')
@section('content')
<div class="card mt-3 p-3">
    <table class="table" style="width:100%">
        <tr>
            <th>{{__("custom.icon")}}:</th>
            <td>
                <img style="width: 100px;" src="{{ asset('img/user.jpg') }}" alt="">
            </td>
          </tr>
        <tr>
          <th>{{__("custom.Name")}}:</th>
          <td>{{ $user->name }}</td>
        </tr>
        <tr>
          <th>{{__("custom.email")}}:</th>
          <td>{{ $user->email }}</td>
        </tr>
        <tr>
          <th>{{__("custom.role")}}:</th>
          <td>{{ $user->role }}</td>
        </tr>
        <tr>
            <th>{{__("custom.Join date")}}:</th>
            <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
          </tr>
      </table>
</div>


@endsection