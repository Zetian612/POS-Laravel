@extends('layouts.master')
@section('title', 'Categories')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('inventory') }}">Inventory</a></li>
<li class="breadcrumb-item {{ request()->routeIs('*categories*') ? 'active' : '' }}">Categories</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories List</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row pb-4">
                        <div class="col-md-12">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Add
                                category</button>
                        </div>
                    </div>

                    <table class="table table-bordered" id="table-categories">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->name }}</td>
                                <td width="5%">
                                    <a data-toggle="modal" data-target="#editModal" data-whatever={{ $c->id }}
                                        class="btn
                                        btn-link"><i class="fas fa-pen"></i></a>
                                    <form action="{{ route('inventory.categories.delete', $c->id) }}" method="POST"
                                        >
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-link btd"><i class="fas fa-trash-alt"></i></button>
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

<x-modal id="modalAdd">
    <x-slot:title>
        Add Category
        </x-slot>
        <x-slot:body>
            <form id="formAddEdit" action="{{ route('inventory.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="Enter name">
                </div>
                </x-slot>
                <x-slot:footer>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </x-slot>

</x-modal>

<x-modal id="editModal">
    <x-slot:title>
        Edit Category
        </x-slot>
        <x-slot:body>
            <form  method="POST" id="formAddEdit" action="{{ route('inventory.categories.update', 'id') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                </x-slot>
                <x-slot:footer>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </x-slot>

</x-modal>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#table-categories').DataTable({
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
   $('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var url = "{{ route('inventory.categories.edit', ':id') }}"
  var urlUpdate = "{{ route('inventory.categories.update', ':id') }}"
  url = url.replace(':id', recipient)

    var modal = $(this)
  $.ajax({
    url: url,
    type: "GET",
    success: function(data) {
        modal.find('form').attr('action', urlUpdate.replace(':id', data.id))
        modal.find('#name').val(data.name)
    }
    })
    });
    $(function () {
    $('#formAddEdit').validate({
        rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 40
        }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
    });
    });
</script>
@endpush