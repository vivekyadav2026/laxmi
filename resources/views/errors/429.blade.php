@extends('errors.layout')

@section('title', 'Too Many Requests')
@section('code', '429')
@section('icon')
<i class="fas fa-hand-paper"></i>
@endsection
@section('message', 'You have made too many requests in a short period of time. Please slow down and try again in a few minutes.')
