@extends('errors.layout')

@section('title', 'Page Expired')
@section('code', '419')
@section('icon')
<i class="fas fa-hourglass-end"></i>
@endsection
@section('message', 'Your session has expired due to inactivity. Please go back, refresh the page, and try again.')
