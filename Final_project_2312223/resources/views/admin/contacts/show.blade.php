@extends('admin.layout')

@section('content')
    <h3>Contact Details</h3>

    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Message:</strong><br>{{ $contact->message }}</p>

    <a href="{{ route('admin.contacts.index') }}"
       class="btn btn-sm"
       style="background:#ffb6d9; color:#6b0031; border-radius:8px; font-weight:600;">
        Back
    </a>
@endsection
