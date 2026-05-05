@extends('admin.layouts.app')

@section('page_title', 'Edit Gallery')

@section('content')
    <div class="card">
        <div class="card-header"><h3 class="card-title">Edit Gallery Item</h3></div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif

            <form action="{{ route('admin.home.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
                </div>
                <div class="form-group">
                    <label>Current Image</label>
                    <div><img src="{{ asset('storage/' . $gallery->image) }}" style="width:140px; height:90px; object-fit:cover; border-radius:4px;"></div>
                </div>
                <div class="form-group">
                    <label>Replace Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', $gallery->category) }}">
                </div>
                <div class="form-group">
                    <label>Alt Text</label>
                    <input type="text" name="alt_text" class="form-control" value="{{ old('alt_text', $gallery->alt_text) }}">
                </div>
                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $gallery->sort_order) }}">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" {{ $gallery->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">Active</label>
                </div>
                <button class="btn btn-gold">Save Changes</button>
                <a href="{{ route('admin.home.gallery.index') }}" class="btn btn-outline">Cancel</a>
            </form>
        </div>
    </div>
@endsection
