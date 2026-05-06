@extends('admin.layouts.app')

@section('page_title', 'Tambah Rental Mobil')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Rental Mobil</h3>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.layanan.rental-mobil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nama Mobil</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="Contoh: City Car, MPV, SUV, Hiace">
                </div>

                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Seats</label>
                        <input type="number" name="seats" class="form-control" value="{{ old('seats') }}" min="1" max="60">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Transmission</label>
                        <input type="text" name="transmission" class="form-control" value="{{ old('transmission') }}" placeholder="Contoh: Manual / Automatic">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
                    </div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', 1) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>

                <button class="btn btn-gold">Save</button>
                <a href="{{ route('admin.layanan.rental-mobil.index') }}" class="btn btn-outline">Back</a>
            </form>
        </div>
    </div>
@endsection
