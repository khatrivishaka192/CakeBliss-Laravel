
@extends('admin.layout')

@section('content')
    <h3 style="color:#ff4fa7; font-weight:700; margin-bottom:20px;">
        Categories
    </h3>

    {{-- Add Category Button --}}
    <a href="{{ route('admin.categories.create') }}" class="btn"
       style="background:#ff4fa7; color:#fff; border:none; padding:8px 18px; border-radius:10px; font-weight:600;">
        + Add New Category
    </a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    {{-- PINK THEMED TABLE --}}
    <table class="table mt-3"
           style="border:1px solid #ffc1d8; border-radius:12px; overflow:hidden;">
        <thead style="background:#ffe6f1; color:#b30059; font-weight:600;">
        <tr>
            <th style="padding:12px;">ID</th>
            <th style="padding:12px;">Name</th>
            <th style="padding:12px;">Actions</th>
        </tr>
        </thead>

        <tbody style="background:#fff7fb;">

        @foreach($categories as $cat)
            <tr style="border-bottom:1px solid #ffd6e8;">
                <td style="padding:12px;">{{ $cat->id }}</td>
                <td style="padding:12px;">{{ $cat->name }}</td>
                <td style="padding:12px;" class="d-flex gap-2">

                    {{-- Edit Button --}}
                    <a href="{{ route('admin.categories.edit', $cat->id) }}"
                       class="btn btn-sm"
                       style="background:#ff9ecb; color:#6b0031; border-radius:8px; font-weight:600;">
                        ✏ Edit
                    </a>

                    {{-- Delete Button --}}
                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm"
                                onclick="return confirm('Are you sure you want to delete this category? This action cannot be undone.')"
                                style="background:#ff6f91; color:white; border-radius:8px; font-weight:600;">
                            🗑 Delete
                        </button>
                    </form>

                    {{-- View Cakes Button --}}
                    <a href="{{ route('admin.categories.cakes', $cat->id) }}"
                       class="btn btn-sm"
                       style="background:#ffb6d9; color:#6b0031; border-radius:8px; font-weight:600;">
                        🍰 View Cakes
                    </a>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
