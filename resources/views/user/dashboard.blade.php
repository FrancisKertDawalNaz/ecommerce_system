@extends('user.layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="fw-bold text-primary">Welcome to the Dashboard</h1>
        <p class="text-secondary">Hello, {{ session('loggedUser')->name ?? 'User' }}!</p>
    </div>
@endsection

