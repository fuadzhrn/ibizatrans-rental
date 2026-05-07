@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"><h1 class="m-0">FAQ Paket Tour</h1></div>
      <div class="col-sm-6 text-right">
        <a href="{{ route('admin.paket-tour.faqs.create') }}" class="btn btn-gold">Tambah FAQ</a>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Question</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($faqs as $faq)
              <tr>
                <td>{{ $faq->question }}</td>
                <td>{{ $faq->sort_order }}</td>
                <td>{!! $faq->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>' !!}</td>
                <td>{{ $faq->updated_at->format('Y-m-d') }}</td>
                <td>
                  <a href="{{ route('admin.paket-tour.faqs.edit', $faq->id) }}" class="btn btn-sm btn-primary">Edit</a>
                  <form action="{{ route('admin.paket-tour.faqs.toggle-status', $faq->id) }}" method="POST" style="display:inline">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-warning">Toggle</button>
                  </form>
                  <form action="{{ route('admin.paket-tour.faqs.destroy', $faq->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-3">{{ $faqs->links() }}</div>
      </div>
    </div>
  </div>
</div>
@endsection
