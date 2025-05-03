@extends('layout')
@section('title', 'Master Category')
@section('content-title', 'Category')
@section('content')

@session('add')
    <div class="alert alert-success" id="add">Category Ditambahkan</div>
@endsession
@session('delete')
    <div class="alert alert-danger" id="delete">Category Dihapus</div>
@endsession
@session('edit')
    <div class="alert alert-primary" id="edit">Category Diedit</div>
@endsession

<div class="card shadow mb-4">
    <div class="card-header py-3">
        {{-- <h6 class="m-0 font-weight-bold text-primary">Data Category</h6> --}}
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Tabel (80%) -->
            <div class="col-md-8">
                <div class="table-responsive">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add New Item</a> --}}
                    <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline" style="display:inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <div class="alert alert-danger">
                                Belum Ada Data
                            </div> --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Form (20%) -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name" value="{{ old('name') }}">
                                <!-- error message untuk name -->
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Add Category</button>
                        </form>
                    </div>
                </div>
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
            setTimeout(() => editAlert.remove(), 80); // hapus dari DOM setelah animasi
        }

        const addAlert = document.getElementById('add');
        if (addAlert) {
            addAlert.classList.remove('show');
            setTimeout(() => addAlert.remove(), 80);
        }

        const deleteAlert = document.getElementById('delete');
        if (deleteAlert) {
            deleteAlert.classList.remove('show');
            setTimeout(() => deleteAlert.remove(), 80);
        }

    }, 3000);
</script>