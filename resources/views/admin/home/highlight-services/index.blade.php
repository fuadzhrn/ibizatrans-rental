@extends('admin.layouts.app')

@section('page_title', 'Highlight Layanan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Highlight Layanan Home</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-info">Pilih maksimal 4 layanan yang akan tampil di halaman Home.</div>

            @if ($errors->has('highlighted'))
                <div class="alert alert-danger">{{ $errors->first('highlighted') }}</div>
            @endif

            <form action="{{ route('admin.home.highlight-services.update') }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Highlight</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td style="width:80px;">
                                    <input type="checkbox" name="highlighted[]" value="{{ $service->id }}" {{ $service->is_highlighted ? 'checked' : '' }}>
                                </td>
                                <td style="width:60px;"><i class="{{ $service->icon }}"></i></td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>
                                <td style="width:120px;"><input type="number" name="sort_order[{{ $service->id }}]" value="{{ $service->sort_order }}" class="form-control" style="width:80px;"></td>
                                <td>{!! $service->is_highlighted ? '<span class="badge badge-success">Highlighted</span>' : '<span class="badge badge-secondary">Hidden</span>' !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-2">
                    <button class="btn btn-gold">Save Changes</button>
                    <a href="{{ route('dashboard.home') }}" class="btn btn-outline">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
