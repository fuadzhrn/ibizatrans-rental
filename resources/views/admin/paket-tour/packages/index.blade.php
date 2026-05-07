@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"><h1 class="m-0">Tour Packages</h1></div>
      <div class="col-sm-6 text-right">
        <a href="{{ route('admin.paket-tour.packages.create') }}" class="btn btn-gold">Tambah Paket Tour</a>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Package Name</th>
                <th>Destination Summary</th>
                <th>Starting Price</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($packages as $pkg)
              <tr>
                <td style="width:90px"><img src="{{ $pkg->image ? asset('storage/'.$pkg->image) : asset('assets/images/placeholder.png') }}" class="img-thumbnail" style="width:80px;height:50px;object-fit:cover"/></td>
                <td>{{ $pkg->name }}</td>
                <td>{{ $pkg->destination_summary }}</td>
                <td>{{ $pkg->starting_price ? 'Rp '.number_format($pkg->starting_price,0,',','.') : '-' }}</td>
                <td>{{ $pkg->sort_order }}</td>
                <td>{!! $pkg->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>' !!}</td>
                <td>{{ $pkg->updated_at->format('Y-m-d') }}</td>
                <td>
                  <a href="{{ route('admin.paket-tour.packages.edit', $pkg->id) }}" class="btn btn-sm btn-primary">Edit / Manage</a>

                  <form action="{{ route('admin.paket-tour.packages.toggle-status', $pkg->id) }}" method="POST" style="display:inline">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-warning" type="submit">Toggle</button>
                  </form>

                  <form action="{{ route('admin.paket-tour.packages.destroy', $pkg->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete package?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-3">{{ $packages->links() }}</div>
      </div>
    </div>
  </div>
</div>
@endsection
