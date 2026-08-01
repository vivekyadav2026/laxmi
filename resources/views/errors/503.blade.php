@extends('errors.layout')

@section('title', 'Service Unavailable')
@section('code', '503')
@section('icon')
<i class="fas fa-tools"></i>
@endsection
@section('message', 'We are currently performing scheduled maintenance to improve our services. We will be back online shortly.')
