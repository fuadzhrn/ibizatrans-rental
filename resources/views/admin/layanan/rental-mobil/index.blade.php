@extends('admin.layouts.app')

@section('page_title', 'Rental Mobil')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Rental Mobil</h3>
            <a href="{{ route('admin.layanan.rental-mobil.create') }}" class="btn btn-gold">Tambah Mobil</a>
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
                            <th>Preview Image</th>
                            <th>Nama Mobil</th>
                            <th>Kategori</th>
                            <th>Seats</th>
                            <th>Transmission</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vehicles as $item)
                            <tr>
                                <td style="width:110px;">
                                    <img
                                        src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/layanan/layanan-hero.jpg') }}"
                                        alt="{{ $item->name }}"
                                        class="img-thumbnail"
                                        style="width:96px; height:64px; object-fit:cover;"
                                    >
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category ?: '-' }}</td>
                                <td>{{ $item->seats ?: '-' }}</td>
                                <td>{{ $item->transmission ?: '-' }}</td>
                                <td>{{ $item->sort_order }}</td>
                                <td>{!! $item->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>' !!}</td>
                                <td>{{ optional($item->updated_at)->format('d M Y H:i') }}</td>
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('admin.layanan.rental-mobil.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.layanan.rental-mobil.toggle-status', $item) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-secondary">Toggle</button>
                                    </form>

                                    <form action="{{ route('admin.layanan.rental-mobil.destroy', $item) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data mobil ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data rental mobil belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">{{ $vehicles->links('pagination::bootstrap-4') }}</div>
        </div>
    </div>
@endsection
