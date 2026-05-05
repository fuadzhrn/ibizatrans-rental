@extends('admin.layouts.app')

@section('page_title', 'Edit About')

@section('content')
    <div class="card">
        <div class="card-header"><h3 class="card-title">Edit About Section</h3></div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif

            @php $about = $aboutSection ?? \App\Models\AboutSection::first(); @endphp

            <form action="{{ route('admin.home.about.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $about->title ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label>Paragraph 1</label>
                    <textarea name="paragraph_1" class="form-control" rows="4">{{ old('paragraph_1', $about->getParagraphs()[0] ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Paragraph 2</label>
                    <textarea name="paragraph_2" class="form-control" rows="3">{{ old('paragraph_2', $about->getParagraphs()[1] ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Paragraph 3</label>
                    <textarea name="paragraph_3" class="form-control" rows="3">{{ old('paragraph_3', $about->getParagraphs()[2] ?? '') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 1 Label</label>
                            <input type="text" name="stat_1_label" class="form-control" value="{{ old('stat_1_label', $about->getStats()[0]['label'] ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 1 Description</label>
                            <input type="text" name="stat_1_description" class="form-control" value="{{ old('stat_1_description', $about->getStats()[0]['description'] ?? '') }}">
                        </div>
                    </div>
                </div>
                <!-- Repeat stats 2-4 -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 2 Label</label>
                            <input type="text" name="stat_2_label" class="form-control" value="{{ old('stat_2_label', $about->getStats()[1]['label'] ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 2 Description</label>
                            <input type="text" name="stat_2_description" class="form-control" value="{{ old('stat_2_description', $about->getStats()[1]['description'] ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 3 Label</label>
                            <input type="text" name="stat_3_label" class="form-control" value="{{ old('stat_3_label', $about->getStats()[2]['label'] ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 3 Description</label>
                            <input type="text" name="stat_3_description" class="form-control" value="{{ old('stat_3_description', $about->getStats()[2]['description'] ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 4 Label</label>
                            <input type="text" name="stat_4_label" class="form-control" value="{{ old('stat_4_label', $about->getStats()[3]['label'] ?? '') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stat 4 Description</label>
                            <input type="text" name="stat_4_description" class="form-control" value="{{ old('stat_4_description', $about->getStats()[3]['description'] ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Featured Image (max 2MB)</label>
                    <input type="file" name="featured_image" class="form-control">
                    @if(!empty($about->featured_image_path))
                        <div class="mt-2"><img src="{{ asset('storage/' . $about->featured_image_path) }}" style="width:200px; height:120px; object-fit:cover;"></div>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-gold">Save Changes</button>
                    <a href="{{ route('admin.home.about.index') }}" class="btn btn-outline">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
