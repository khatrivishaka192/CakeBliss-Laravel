
@extends('admin.layout')

@section('content')
    <div class="mt-3">
        <h2 style="color:#ff4fa7; font-weight:600; margin-bottom:20px;">Add New Cake</h2>

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

        <form action="{{ route('admin.cakes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}"
                       placeholder="Enter cake name (text only)"
                       required
                       pattern="[A-Za-z\s]+"
                       title="Only letters allowed">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control" required>
                    <option value="" disabled selected>Select category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Price --}}
            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control"
                       value="{{ old('price') }}"
                       placeholder="Enter price (number only)"
                       required
                       min="1">
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control"
                       accept="image/png, image/jpeg, image/jpg, image/webp"
                       required>
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"
                          placeholder="Enter description (text only)"
                          required
                          pattern="[A-Za-z\s]+"
                          title="Only letters allowed">{{ old('description') }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Ingredients --}}
            <div class="mb-3">
                <label>Ingredients</label>
                <textarea name="ingredients" class="form-control"
                          placeholder="Enter ingredients (text only)"
                          required
                          pattern="[A-Za-z\s]+"
                          title="Only letters allowed">{{ old('ingredients') }}</textarea>
                @error('ingredients') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn"
                    style="background-color:#ff4fa7; color:#fff; border:none; border-radius:5px; padding:6px 15px;">
                Add Cake
            </button>
        </form>
    </div>
@endsection
