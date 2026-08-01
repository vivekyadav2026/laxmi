@extends('errors.layout')

@section('title', 'Server Error')
@section('code', '500')
@section('icon')
<i class="fas fa-server"></i>
@endsection
@section('message', 'Whoops, something went wrong on our servers. Our technical team has been automatically notified and is working on fixing the issue.')
