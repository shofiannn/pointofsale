@extends('layout')
@section('title', 'Edit Item')
@section('content-title', 'Edit Item')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Item</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('item.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Spoofing HTTP PUT method --}}
            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter item name" value="{{ old('name', $item->name) }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label for="price" class="mt-2">Price</label>
                <input type="number" name='price' id='price' class="form-control @error('price') is-invalid @enderror" placeholder="Enter Item Price" value="{{old('price', $item->price)}}">
                <label for="stock" class="mt-2">Stock</label>
                <input type="number" name='stock' id='stock' class="form-control @error('stock') is-invalid @enderror" placeholder="Enter Item Stock" value="{{old('stock', $item->stock)}}">
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary w-50 mr-2">Update Item</button>
                <a href="{{ route('item.index') }}" class="btn btn-danger w-50">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection