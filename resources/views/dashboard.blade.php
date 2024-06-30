@extends('partial.basepage')

@section('main-body-web')
    @foreach ($accounts as $account)
    <tr>
        <td> {{ $account->username }}</td>
        <td> {{ $account->password }}</td>
    </tr>
    @endforeach
@stop
