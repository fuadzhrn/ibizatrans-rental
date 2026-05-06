@extends('admin.layouts.app')

@section('page_title', 'Pricelist Mobil')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Pricelist Mobil</h3>
            <a href="{{ route('admin.layanan.pricelist-mobil.create') }}" class="btn btn-gold">Tambah Harga</a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama Unit</th>
                            <th>Per Day</th>
                            <th>24 Jam</th>
                            <th>Include Driver</th>
                            <th>Driver Note</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vehiclePrices as $item)
                            <tr>
                                <td>{{ $item->vehicle?->name ?? $item->vehicle_name ?? '-' }}</td>
                                <td>{{ $item->self_drive_per_day_price ? 'Rp ' . number_format($item->self_drive_per_day_price, 0, ',', '.') : '-' }}</td>
                                <td>{{ $item->self_drive_24h_price ? 'Rp ' . number_format($item->self_drive_24h_price, 0, ',', '.') : '-' }}</td>
                                <td>{{ $item->driver_price ? 'Rp ' . number_format($item->driver_price, 0, ',', '.') : '-' }}</td>
                                <td>{{ $item->driver_note ?: '-' }}</td>
                                <td>{{ $item->sort_order }}</td>
                                <td>{!! $item->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>' !!}</td>
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('admin.layanan.pricelist-mobil.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.layanan.pricelist-mobil.toggle-status', $item) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-secondary">Toggle</button>
                                    </form>

                                    <form action="{{ route('admin.layanan.pricelist-mobil.destroy', $item) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data harga ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data pricelist mobil belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">{{ $vehiclePrices->links('pagination::bootstrap-4') }}</div>
        </div>
    </div>
@endsection
