@extends('layouts.master')
@section('title', 'Sales')
@section('breadcrumb')
<li class="breadcrumb-item active">Sales</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products List</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>subTotal</th>
                                <th style="width: 40px">Actions</th>
                            </tr>
                        </thead>
                        <form action="{{ route('sales.store')}}" method="POST">
                            @csrf
                            <tbody id="cart">
                                <tr>
                                    <td colspan="6" class="text-center">Aun no hay productos</td>
                                </tr>
                            </tbody>
                        </form>
                    </table>

                    {{-- total --}}
                    <div class="row justify-content-end" id="footer">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Buscar producto</label>
                        <input type="search" class="form-control form-control-border" id="searchInput"
                            placeholder="Enter a name or code">
                    </div>
                    {{-- small cards with the search--}}
                    <div id="prods" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3">

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<template id="cards-products">
    <div class="col-md-4">
        <div class="card card-widget">
            <div class="card-body">
                <h5 class="card-title">Cookies</h5>
                <p class="card-text">
                    $ 500
                </p>
                <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </p>
                <button class="btn btn-dark">Add</button>
            </div>
        </div>
    </div>
</template>

<template id="cart-template">
    <tr>
        <td>1.</td>
        <td>Cookies</td>
        <td>
            $ 500
        </td>
        <td>
            <input type="number" class="form-control" value="1">
        </td>
        <td>
            $ 2500
        </td>
        <td>
            <button class="btn btn-danger">Remove</button>
        </td>
    </tr>
</template>

<template id="template-footer">
    <div class="col-md-6  ">
        <hr>
        <h5>Total: $500</h5>
        <button class="btn btn-primary float-right">Checkout</button>
    </div>
</template>

@endsection
@push('scripts')
<script>
    const cardsTemplate = document.getElementById('cards-products').content;
    const footerTemplate = document.getElementById('template-footer').content;
    const cartTemplate = document.getElementById('cart-template').content;
    const cardsContainer = document.getElementById('prods');
    const searchInput = document.getElementById('searchInput');
    const cartContainer = document.getElementById('cart');
    const footerContainer = document.getElementById('footer');
    const fragment = document.createDocumentFragment();

    let carrito = {};

    cardsContainer.addEventListener('click', e => { addCarrito(e) });

    const searchProducts = (e) => {
        const search = e.target.value.toLowerCase();
        if (search.length > 1){
            fetch(
            `/api/products?search=${search}`
        ).then(res => res.json())
        .then(data => {
            // console.log(data);
            renderProducts(data);
        });
        } else {
            cardsContainer.innerHTML = '';
        }
    }

    const renderProducts = (filteredProducts) => {
        cardsContainer.innerHTML = '';
        filteredProducts.forEach(product => {
            cardsTemplate.querySelector('h5').textContent = product.name;
            cardsTemplate.querySelector('p').textContent = `$${product.price}`;
            cardsTemplate.querySelector('small').textContent = `Last updated 3 mins ago`;
            cardsTemplate.querySelector('button').setAttribute('data-id', product.id);
            const clone = cardsTemplate.cloneNode(true);
            fragment.appendChild(clone);
        });
        cardsContainer.appendChild(fragment);
    };

    const addCarrito = e => {
        if (e.target.classList.contains('btn-dark')) {
            // console.log(e.target.dataset.id)
            // console.log(e.target.parentElement)
            setCarrito(e.target.parentElement)
        }
        e.stopPropagation()
    }

    const setCarrito = item => {
    const producto = {
        id: item.querySelector('button').dataset.id,
        name: item.querySelector('h5').textContent,
        price: item.querySelector('p').textContent.replace('$', ''),
        quantity: 1
    };

    if (carrito[producto.id]) {
        carrito[producto.id].quantity += 1;
    } else {
        carrito[producto.id] = producto;
    }
    
    renderCart()
}

    const renderCart = () => {

        cartContainer.innerHTML = '';
        Object.values(carrito).forEach((product,index) => {
            cartTemplate.querySelector('td').textContent = index + 1;
            cartTemplate.querySelector('td:nth-child(2)').textContent = product.name;
            cartTemplate.querySelector('td:nth-child(3)').textContent = product.price;
            cartTemplate.querySelector('td:nth-child(4) input').value = product.quantity;
            cartTemplate.querySelector('td:nth-child(5)').textContent = product.price * product.quantity;
            cartTemplate.querySelector('td:nth-child(6) button').setAttribute('data-id', product.id);
            const clone = cartTemplate.cloneNode(true);
            fragment.appendChild(clone)
        });
        cartContainer.appendChild(fragment);
        renderFooter();
    };

    const renderFooter = () => {
        footerContainer.innerHTML = '';
        
        // sumar totales
    
        const nTotal = Object.values(carrito).reduce((acc, product) => {
            return acc + (product.price * product.quantity)
        }, 0);

        footerTemplate.querySelector('h5').textContent = `Total: $${nTotal}`;
        const clone = footerTemplate.cloneNode(true);
        fragment.appendChild(clone)
        footerContainer.appendChild(fragment);
    };

    searchInput.addEventListener('keyup', searchProducts);

    cartContainer.addEventListener('click', e => {
        if (e.target.classList.contains('btn-danger')) {
            removeCarrito(e.target.dataset.id)
        }
    });

    const removeCarrito = id => {
        delete carrito[id];
        renderCart();
    } 

</script>
@endpush