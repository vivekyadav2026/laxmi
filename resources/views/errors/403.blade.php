@extends('errors.layout')

@section('title', 'Access Forbidden')
@section('code', '403')
@section('icon')
<i class="fas fa-lock"></i>
@endsection
@section('message', 'Sorry, you don\'t have the necessary permissions to access this page or resource. Please contact support if you think this is a mistake.')
