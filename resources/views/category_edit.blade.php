@extends('layout')
@section('title', 'Edit Category')
@section('content-title', 'Edit Category')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Spoofing HTTP PUT method --}}
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" placeholder="Enter category name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary w-50 mr-2">Update Category</button>
                <a href="{{ route('category.index') }}" class="btn btn-danger w-50">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection