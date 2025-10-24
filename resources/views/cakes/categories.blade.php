@extends('layout')

@section('title', 'Cake Categories - Cake Bliss')

@section('content')
    <div class="container text-center my-5">
        <h2 class="text-pink fw-bold mb-4">Choose Your Cake Category</h2>

        <div class="row g-4 justify-content-center">
            <div class="col-md-3">
                <a href="{{ route('cakes.index', 'regular') }}" class="btn btn-pink w-100 py-3">Regular Cakes</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('cakes.index', 'customized') }}" class="btn btn-pink w-100 py-3">Customized Cakes</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('cakes.index', 'wedding') }}" class="btn btn-pink w-100 py-3">Wedding Cakes</a>
            </div>
        </div>
    </div>
@endsection
