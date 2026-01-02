
@extends('admin.layout')

@section('content')
    <h3 style="color:#ff4fa7; font-weight:600; margin-bottom:20px;">Add Category</h3>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" class="btn"
                style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px; padding:6px 15px;">
            Save
        </button>
    </form>
@endsection
