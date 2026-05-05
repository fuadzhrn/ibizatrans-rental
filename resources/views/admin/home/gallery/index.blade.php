@extends('admin.layouts.app')

@section('page_title', 'Home Gallery')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Home Gallery</h3>
            <div>
                <a href="{{ route('admin.home.gallery.create') }}" class="btn btn-gold">Add Gallery</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Sort</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $item)
                            <tr>
                                <td style="width:100px;"><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-thumbnail" style="width:90px; height:60px; object-fit:cover;"/></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->sort_order }}</td>
                                <td>{!! $item->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Hidden</span>' !!}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.home.gallery.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.home.gallery.destroy', $item) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this image?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <form action="{{ route('admin.home.gallery.toggle-status', $item) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-secondary">Toggle</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">{{ $galleries->links('pagination::bootstrap-4') }}</div>
        </div>
    </div>
@endsection
