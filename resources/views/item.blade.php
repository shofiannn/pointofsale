@extends('layout')
@section('title', 'Master Item')
@section('content-title', 'Item')
@section('content')

@session('add')
    <div class="alert alert-success" id="add">Item Ditambahkan</div>
@endsession
@session('delete')
    <div class="alert alert-danger" id="delete">Item Dihapus</div>
@endsession
@session('edit')
    <div class="alert alert-primary" id="edit">Item Diedit</div>
@endsession

<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Item</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Price</th>  
                                    <th>Stock</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->price}}</td>
                                    <td>{{ $item->stock}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Item</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('item.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Item Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter item name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="price" class="mt-2">Price</label>
                        <input type="number" name='price' id='price' class="form-control @error('price') is-invalid @enderror" placeholder="Enter Item Price" value="{{old('price')}}">
                        <label for="stock" class="mt-2">Stock</label>
                        <input type="number" name='stock' id='stock' class="form-control @error('stock') is-invalid @enderror" placeholder="Enter Item Stock" value="{{old('stock')}}">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Add Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    setTimeout(() => {
        const editAlert = document.getElementById('edit');
        if (editAlert) {
            editAlert.classList.remove('show'); // mulai fade out
            setTimeout(() => editAlert.remove(), 8500); // hapus dari DOM setelah animasi
        }

        const addAlert = document.getElementById('add');
        if (addAlert) {
            addAlert.classList.remove('show');
            setTimeout(() => addAlert.remove(), 50);
        }

        const deleteAlert = document.getElementById('delete');
        if (deleteAlert) {
            deleteAlert.classList.remove('show');
            setTimeout(() => deleteAlert.remove(), 50);
        }

    }, 3000);
</script>