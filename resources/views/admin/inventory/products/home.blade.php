@extends('layouts.master')
@section('title', 'Products')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('inventory') }}">Inventory</a></li>
    <li class="breadcrumb-item active">Products</li>
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products List</h3>
                </div>
                <!-- /.card-header -->
               
                    <div class="card-body">
                        <div class="row pb-4">
                            <div class="col-md-12">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add product</button>
                            </div>
                        </div>
                        
                        <table class="table table-bordered" id="table-products">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->description }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td><img src="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" width="80"></td>
                                    <td width="5%">
                                        <a data-toggle="modal" data-target="#editModal" data-whatever={{$p->id}}  class="btn btn-link"><i class="fas fa-pen"></i></a>
                                        <form action="{{ route('inventory.products.delete', $p->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('POST')
                                            <a type="submit" class="btn btn-link btd"><i class="fas fa-trash-alt"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal add -->
@include('admin.inventory.products.modal_add')
  <!-- Modal edit -->
@include('admin.inventory.products.modal_edit')

@stop
@push('scripts')
<script>
$(function () {
    $('#table-products').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
    $('.alert').slideDown();
    setTimeout(function(){$('.alert').slideUp();}, 7000);
</script>

@endpush

