@extends('layouts.master')
@section('title', 'Categories')
@section('breadcrumb')
    <li class="breadcrumb-item {{ request()->routeIs('*categories*') ? 'active' : '' }}">Inventory</li>
@endsection
@section('content')
  
@endsection

<!-- /.col-md-6 -->
