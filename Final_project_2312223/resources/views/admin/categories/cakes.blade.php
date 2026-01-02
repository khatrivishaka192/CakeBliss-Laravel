@extends('admin.layout')

@section('content')
    <h3  style="color:#ff4fa7; font-weight:600; margin-bottom:20px;">Cakes in Category: "{{ $category->name }}"</h3>

    <a href="{{ route('admin.cakes.create') }}" class="btn"
       style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px;padding:8px 18px;
              font-weight:600; margin-bottom:15px; display:inline-block">
        Add New Cake
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cakes as $cake)
            <tr>
                <td>{{ $cake->id }}</td>
                <td>{{ $cake->name }}</td>
                <td>{{ $cake->price }}</td>
                <td>

                    <a href="{{ route('admin.cakes.edit', $cake->id) }}" class="btn btn-sm"
                       style="background-color:#ff85b5; color:#fff; border:none; border-radius:5px;">Edit</a>
                    <form action="{{ route('admin.cakes.destroy', $cake->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm"
                                style="background-color:#ff6b6b; color:#fff; border:none; border-radius:5px;"
                                onclick="return confirm('Delete this cake?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
