@extends('admin.layouts.app')

@section('page_title', 'Add Gallery')

@section('content')
    <div class="card">
        <div class="card-header"><h3 class="card-title">Add Gallery Item</h3></div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif

            <form action="{{ route('admin.home.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                </div>
                <div class="form-group">
                    <label>Alt Text</label>
                    <input type="text" name="alt_text" class="form-control" value="{{ old('alt_text') }}">
                </div>
                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" checked>
                    <label for="is_active" class="form-check-label">Active</label>
                </div>
                <button class="btn btn-gold">Save</button>
                <a href="{{ route('admin.home.gallery.index') }}" class="btn btn-outline">Cancel</a>
            </form>
        </div>
    </div>
@endsection
