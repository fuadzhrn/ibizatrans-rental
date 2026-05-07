@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"><h1 class="m-0">Tambah Paket Tour</h1></div>
      <div class="col-sm-6 text-right">
        <a href="{{ route('admin.paket-tour.packages.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
          </div>
        @endif

        <form action="{{ route('admin.paket-tour.packages.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required />
          </div>

          <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" />
          </div>

          <div class="form-group">
            <label>Badge</label>
            <input type="text" name="badge" class="form-control" value="{{ old('badge') }}" />
          </div>

          <div class="form-group">
            <label>Destination Summary</label>
            <input type="text" name="destination_summary" class="form-control" value="{{ old('destination_summary') }}" />
          </div>

          <div class="form-group">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
          </div>

          <div class="form-group">
            <label>Highlight</label>
            <input type="text" name="highlight" class="form-control" value="{{ old('highlight') }}" />
          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file" />
          </div>

          <div class="form-group">
            <label>Starting Price</label>
            <input type="number" name="starting_price" class="form-control" value="{{ old('starting_price') }}" />
          </div>

          <div class="form-group">
            <label>Duration Label</label>
            <input type="text" name="duration_label" class="form-control" value="{{ old('duration_label') }}" />
          </div>

          <div class="form-group">
            <label>WhatsApp Text</label>
            <input type="text" name="whatsapp_text" class="form-control" value="{{ old('whatsapp_text') }}" />
          </div>

          <div class="form-group">
            <label>Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" />
          </div>

          <div class="form-group form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ old('is_active') ? 'checked' : 'checked' }}>
            <label class="form-check-label" for="is_active">Active</label>
          </div>

          <button class="btn btn-gold">Save</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
