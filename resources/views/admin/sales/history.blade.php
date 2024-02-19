@extends('layouts.master')
@section('title', 'Sales')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('inventory') }}">Inventory</a></li>
    <li class="breadcrumb-item active">History</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">History</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Client</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th style="width: 40px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->client }}</td>
                                <td>{{ $s->total }}</td>
                                <td>{{ $s->created_at }}</td>
                                <td width="5%">
                                    <a data-toggle="modal" data-target="#detailModal" data-whatever="{{$s->id}}" class="btn btn-link">
                                        <i class="fas fa-eye"></i>
                                    </a>
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
<!-- Modal detail -->
    <x-modal :idModal="'detailModal'" :title="'Sale detail'">
        <x-slot name="slot">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody id="cart">
                    <tr>
                        <td colspan="5" class="text-center">Select a sale to see the detail</td>
                    </tr>
                </tbody>
            </table>
            {{-- total --}}
            <div class="row justify-content-end" id="footer">
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </x-slot>
    </x-modal>
@endsection
@push('')
<script>
    const exampleModal = document.getElementById('detailModal')
    if (exampleModal) {
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an Ajax request here
            // and then do the updating in a callback.

            // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = `New message to ${recipient}`
            modalBodyInput.value = recipient
        })
@endpush

