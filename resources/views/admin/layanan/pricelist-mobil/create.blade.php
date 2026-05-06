@extends('admin.layouts.app')

@section('page_title', 'Tambah Pricelist Mobil')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Pricelist Mobil</h3>
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

            <form action="{{ route('admin.layanan.pricelist-mobil.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Kendaraan Mobil (Opsional)</label>
                    <select name="vehicle_id" class="form-control">
                        <option value="">-- Pilih kendaraan --</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Vehicle Name (Fallback/Custom)</label>
                    <input type="text" name="vehicle_name" class="form-control" value="{{ old('vehicle_name') }}">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Harga Per Day</label>
                        <input type="number" name="self_drive_per_day_price" class="form-control" value="{{ old('self_drive_per_day_price') }}" min="0">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Harga 24 Jam</label>
                        <input type="number" name="self_drive_24h_price" class="form-control" value="{{ old('self_drive_24h_price') }}" min="0">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Harga Include Driver</label>
                        <input type="number" name="driver_price" class="form-control" value="{{ old('driver_price') }}" min="0">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Driver Note</label>
                        <input type="text" name="driver_note" class="form-control" value="{{ old('driver_note', 'City tour maksimal 12 jam') }}">
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
                <a href="{{ route('admin.layanan.pricelist-mobil.index') }}" class="btn btn-outline">Back</a>
            </form>
        </div>
    </div>
@endsection
