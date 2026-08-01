@extends('errors.layout')

@section('title', 'Unauthorized')
@section('code', '401')
@section('icon')
<i class="fas fa-user-lock"></i>
@endsection
@section('message', 'You must be logged in to view this page. Please log in with your credentials to continue.')
