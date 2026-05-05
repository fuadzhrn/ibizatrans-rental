@extends('admin.layouts.app')

@section('page_title', 'About Ibiza Trans')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">About Ibiza Trans</h3>
            <a href="{{ route('admin.home.about.edit') }}" class="btn btn-gold">Edit About</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @php $about = \App\Models\AboutSection::first(); @endphp

            @if($about)
                <table class="table table-bordered">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td style="width:150px;">
                            @if($about->featured_image_path)
                                <img src="{{ asset('storage/' . $about->featured_image_path) }}" style="width:140px; height:90px; object-fit:cover;" />
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->getParagraphs()[0] ?? '' }}</td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td>{{ $about->updated_at ? $about->updated_at->format('d M Y') : '-' }}</td>
                        <td><a href="{{ route('admin.home.about.edit') }}" class="btn btn-sm btn-primary">Edit</a></td>
                    </tr>
                </table>
            @else
                <div class="alert alert-warning">No About found. You can create it by clicking Edit.</div>
            @endif
        </div>
    </div>
@endsection
