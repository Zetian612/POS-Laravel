@extends('layouts.master')
@section('title', 'Inventory')
@section('breadcrumb')
    <li class="breadcrumb-item {{ request()->routeIs('inventory') ? 'active' : '' }}">Inventory</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>
                        <a href="{{ route('inventory.products') }}">Products</a>
                    </li>
                    <li>
                        <a href="{{ route('inventory.categories') }}">Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

<!-- /.col-md-6 -->
