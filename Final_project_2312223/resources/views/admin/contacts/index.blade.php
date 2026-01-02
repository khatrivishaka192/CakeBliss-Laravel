@extends('admin.layout')

@section('content')
    <h3>Contacts</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ Str::limit($contact->message, 50) }}</td>
                <td>

                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                       class="btn btn-sm"
                       style="background:#ffb6d9; color:#6b0031; border-radius:8px; font-weight:600;">
                        🍰 View
                    </a>
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"
                                style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px; padding:6px 15px;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
@endsection
