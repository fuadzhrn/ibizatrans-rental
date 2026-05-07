@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"><h1 class="m-0">Edit FAQ</h1></div>
      <div class="col-sm-6 text-right">
        <a href="{{ route('admin.paket-tour.faqs.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

        <form action="{{ route('admin.paket-tour.faqs.update', $tourFaq->id) }}" method="POST">
          @csrf @method('PUT')
          <div class="form-group">
            <label>Question</label>
            <input type="text" name="question" class="form-control" value="{{ old('question', $tourFaq->question) }}" required />
          </div>
          <div class="form-group">
            <label>Answer</label>
            <textarea name="answer" class="form-control" required>{{ old('answer', $tourFaq->answer) }}</textarea>
          </div>
          <div class="form-group">
            <label>Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $tourFaq->sort_order) }}" />
          </div>
          <div class="form-group form-check">
            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ $tourFaq->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active</label>
          </div>
          <button class="btn btn-gold">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
