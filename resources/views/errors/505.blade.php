@extends('layouts.master')
@section('title', '505 Error')
@section('breadcrumb')
    <li class="breadcrumb-item {{ request()->routeIs('errors.505') ? 'active' : '' }}">505 Error</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="error-page">
            <h2 class="headline text-danger">500</h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>
                <p>
                    We will work on fixing that right away.
                    Meanwhile, you may <a href="{{ route('dashboard') }}">return to dashboard</a> or try using the search form.
                </p>
            </div>
        </div>
    </div>
    <!-- /.error-page -->
@endsection
