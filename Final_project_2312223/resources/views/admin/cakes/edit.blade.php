{{--@extends('admin.layout')--}}

{{--@section('content')--}}
{{--    <div class="mt-3">--}}
{{--        <h2 style="color:#ff4fa7; font-weight:600; margin-bottom:20px;">Edit Cake</h2>--}}
{{--        <form action="{{ route('admin.cakes.update', $cake->id) }}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}
{{--            <div class="mb-3">--}}
{{--                <label>Name</label>--}}
{{--                <input type="text" name="name" class="form-control" value="{{ $cake->name }}" required>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label>Category</label>--}}
{{--                <select name="category" class="form-control" required>--}}
{{--                    <option value="regular" {{ $cake->category == 'regular' ? 'selected' : '' }}>Regular</option>--}}
{{--                    <option value="customized" {{ $cake->category == 'customized' ? 'selected' : '' }}>Customized</option>--}}
{{--                    <option value="wedding" {{ $cake->category == 'wedding' ? 'selected' : '' }}>Wedding</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label>Price</label>--}}
{{--                <input type="number" step="0.01" name="price" class="form-control" value="{{ $cake->price }}" required>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label>Image</label>--}}
{{--                <input type="file" name="image" class="form-control">--}}
{{--                <img src="{{ asset('storage/' . $cake->image) }}" width="80" class="mt-2">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label>Description</label>--}}
{{--                <textarea name="description" class="form-control">{{ $cake->description }}</textarea>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label>Ingredients</label>--}}
{{--                <textarea name="ingredients" class="form-control">{{ $cake->ingredients }}</textarea>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn"--}}
{{--                    style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px; padding:6px 15px;">--}}
{{--                Update Cake--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('admin.layout')

@section('content')
    <div class="mt-3">
        <h2 style="color:#ff4fa7; font-weight:600; margin-bottom:20px;">Edit Cake</h2>

        {{-- Laravel validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.cakes.update', $cake->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $cake->name) }}"
                       required
                       pattern="[A-Za-z\s]+"
                       title="Only letters allowed"
                       placeholder="Enter cake name (text only)">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label>Category</label>
                <select name="category" class="form-control" required>
                    <option value="regular" {{ old('category', $cake->category) == 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="customized" {{ old('category', $cake->category) == 'customized' ? 'selected' : '' }}>Customized</option>
                    <option value="wedding" {{ old('category', $cake->category) == 'wedding' ? 'selected' : '' }}>Wedding</option>
                </select>
                @error('category') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Price --}}
            <div class="mb-3">
                <label>Price</label>
                <input type="number" step="0.01" name="price" class="form-control"
                       value="{{ old('price', $cake->price) }}"
                       required
                       min="1"
                       placeholder="Enter price (number only)">
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg, image/webp">
                @if($cake->image)
                    <img src="{{ asset('uploads/' . $cake->image) }}" width="80" class="mt-2">
                @endif
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"
                          required
                          pattern="[A-Za-z\s]+"
                          title="Only letters allowed"
                          placeholder="Enter description (text only)">{{ old('description', $cake->description) }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Ingredients --}}
            <div class="mb-3">
                <label>Ingredients</label>
                <textarea name="ingredients" class="form-control"
                          required
                          pattern="[A-Za-z\s]+"
                          title="Only letters allowed"
                          placeholder="Enter ingredients (text only)">{{ old('ingredients', $cake->ingredients) }}</textarea>
                @error('ingredients') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn"
                    style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px; padding:6px 15px;">
                Update Cake
            </button>
        </form>
    </div>
@endsection
