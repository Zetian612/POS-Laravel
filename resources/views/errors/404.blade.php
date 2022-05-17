@extends('layouts.master')
@section('title', '404 Error')
@section('breadcrumb')
    <li class="breadcrumb-item {{ request()->routeIs('errors.404') ? 'active' : '' }}">404 Error</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
            <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="{{ route('dashboard') }}">return to dashboard</a> or try using the search form.
            </p>
        </div>
    </div>
</div>
    <!-- /.error-page -->
@endsection
