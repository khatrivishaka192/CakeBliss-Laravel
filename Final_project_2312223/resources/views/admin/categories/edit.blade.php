
@extends('admin.layout')

@section('content')
    <h3 style="color:#ff4fa7; font-weight:600; margin-bottom:20px;>Edit Category</h3>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
