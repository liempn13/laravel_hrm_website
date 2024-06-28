@extends('partial.basepage')

@section('main-body-web')
    @foreach ($accounts as $account)
        <li>{{ $account->username }}</li>
        <li>{{ $account->password }}</li>
    @endforeach
@stop
