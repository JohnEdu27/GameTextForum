@extends('layouts.auth')
@section('content')
    <div class="text-center py-5">
        <h1>403</h1>
        <h2>Access Forbidden</h2>
        <p>you're not allowed here</p>

        <a href="{{ route('homepage') }}">
            Return to Homepage
        </a>
    </div>
@endsection
