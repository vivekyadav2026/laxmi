@extends('errors.layout')

@section('title', 'Page Not Found')
@section('code', '404')
@section('icon')
<i class="fas fa-search"></i>
@endsection
@section('message', 'Oops! We can\'t seem to find the page you\'re looking for. It might have been moved, renamed, or it never existed in the first place.')
