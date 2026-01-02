
@extends('admin.layout')

@section('content')

    <h2 class="mb-4 text-center" style="color: #ff4fa7;">Welcome Admin</h2>

    <div class="row justify-content-center g-4">

        <!-- Cakes Module -->
        <div class="col-md-5">
            <div class="card shadow text-center p-3" style="border: 1px solid #ffeaf3; border-radius:10px;">
                <h5 style="color: #ff4fa7; font-weight:600;">Cakes Module</h5>
                <p class="mb-3" style="font-size:0.95rem;">Manage all cakes</p>
                <a href="{{ route('admin.cakes.index') }}" class="btn"
                   style="background-color: #ff4fa7; color: #fff; border-radius: 6px; font-size:0.9rem; padding:5px 12px;">Go to Cakes</a>
            </div>
        </div>

        <!-- Orders Module -->
        <div class="col-md-5">
            <div class="card shadow text-center p-3" style="border: 1px solid #ffeaf3; border-radius:10px;">
                <h5 style="color: #ff4fa7; font-weight:600;">Orders Module</h5>
                <p class="mb-3" style="font-size:0.95rem;">View and manage orders</p>
                <a href="{{ route('admin.orders.index') }}" class="btn"
                   style="background-color: #ff4fa7; color: #fff; border-radius: 6px; font-size:0.9rem; padding:5px 12px;">Go to Orders</a>
            </div>
        </div>

        <!-- Categories Module -->
        <div class="col-md-5">
            <div class="card shadow text-center p-3" style="border: 1px solid #ffeaf3; border-radius:10px;">
                <h5 style="color: #ff4fa7; font-weight:600;">Categories Module</h5>
                <p class="mb-3" style="font-size:0.95rem;">Manage all categories</p>
                <a href="{{ route('admin.categories.index') }}" class="btn"
                   style="background-color: #ff4fa7; color: #fff; border-radius: 6px; font-size:0.9rem; padding:5px 12px;">Go to Categories</a>
            </div>
        </div>

        <!-- Contact Module -->
        <div class="col-md-5">
            <div class="card shadow text-center p-3" style="border: 1px solid #ffeaf3; border-radius:10px;">
                <h5 style="color: #ff4fa7; font-weight:600;">Contact Module</h5>
                <p class="mb-3" style="font-size:0.95rem;">Manage Contacts</p>
                <a href="{{ route('admin.contacts.index') }}" class="btn"
                   style="background-color: #ff4fa7; color: #fff; border-radius: 6px; font-size:0.9rem; padding:5px 12px;">Go to Contacts</a>
            </div>
        </div>

    </div>

@endsection

