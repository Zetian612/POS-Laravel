@extends('layouts.master')
@section('title', 'Inventory')
@section('breadcrumb')
    <li class="breadcrumb-item {{ request()->routeIs('inventory') ? 'active' : '' }}">Inventory</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $countOfProducts }}</h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('inventory.products') }}" class="small-box-footer">Go to <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $countOfCategories }}<sup style="font-size: 20px"></sup></h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('inventory.categories') }}" class="small-box-footer">Go to <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $countOfSales }}</h3>
                        <p>Sales</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('sales.history') }}" class="small-box-footer">Go to <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
