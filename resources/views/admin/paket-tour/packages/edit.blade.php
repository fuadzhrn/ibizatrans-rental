@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"><h1 class="m-0">Edit Paket Tour - {{ $package->name }}</h1></div>
      <div class="col-sm-6 text-right">
        <a href="{{ route('admin.paket-tour.packages.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

        <form action="{{ route('admin.paket-tour.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')

          <div class="form-row">
            <div class="form-group col-md-8">
              <label>Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $package->name) }}" required />
            </div>
            <div class="form-group col-md-4">
              <label>Slug</label>
              <input type="text" name="slug" class="form-control" value="{{ old('slug', $package->slug) }}" />
            </div>
          </div>

          <div class="form-group">
            <label>Destination Summary</label>
            <input type="text" name="destination_summary" class="form-control" value="{{ old('destination_summary', $package->destination_summary) }}" />
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $package->description) }}</textarea>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Starting Price</label>
              <input type="number" name="starting_price" class="form-control" value="{{ old('starting_price', $package->starting_price) }}" />
            </div>
            <div class="form-group col-md-6">
              <label>Duration Label</label>
              <input type="text" name="duration_label" class="form-control" value="{{ old('duration_label', $package->duration_label) }}" />
            </div>
          </div>

          <div class="form-group">
            <label>WhatsApp Text</label>
            <input type="text" name="whatsapp_text" class="form-control" value="{{ old('whatsapp_text', $package->whatsapp_text) }}" />
          </div>

          <div class="form-group">
            <label>Image</label>
            <div class="mb-2">
              <img src="{{ $package->image ? asset('storage/'.$package->image) : asset('assets/images/placeholder.png') }}" style="width:200px;height:120px;object-fit:cover" class="img-thumbnail" />
            </div>
            <input type="file" name="image" class="form-control-file" />
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Sort Order</label>
              <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $package->sort_order) }}" />
            </div>
            <div class="form-group col-md-4">
              <label>Badge</label>
              <input type="text" name="badge" class="form-control" value="{{ old('badge', $package->badge) }}" />
            </div>
            <div class="form-group col-md-4 form-check" style="padding-top:30px">
              <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ $package->is_active ? 'checked' : '' }}>
              <label class="form-check-label" for="is_active">Active</label>
            </div>
          </div>

          <button class="btn btn-gold">Save Package</button>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Destinations</div>
          <div class="card-body">
            <form action="{{ route('admin.paket-tour.destinations.store', $package->id) }}" method="POST">
              @csrf
              <div class="input-group mb-2">
                <input type="text" name="name" class="form-control" placeholder="Destination name" required />
                <input type="number" name="sort_order" class="form-control" placeholder="Sort" />
                <div class="input-group-append">
                  <button class="btn btn-primary">Add</button>
                </div>
              </div>
            </form>

            <table class="table table-sm">
              <thead><tr><th>Name</th><th>Sort</th><th>Action</th></tr></thead>
              <tbody>
                @foreach($package->destinations as $d)
                <tr>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->sort_order }}</td>
                  <td>
                    <form action="{{ route('admin.paket-tour.destinations.update', $d->id) }}" method="POST" style="display:inline">
                      @csrf @method('PUT')
                      <input type="hidden" name="name" value="{{ $d->name }}" />
                      <input type="hidden" name="sort_order" value="{{ $d->sort_order }}" />
                      <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </form>
                    <form action="{{ route('admin.paket-tour.destinations.destroy', $d->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">
                      @csrf @method('DELETE')
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header">Prices</div>
          <div class="card-body">
            <form action="{{ route('admin.paket-tour.prices.store', $package->id) }}" method="POST">
              @csrf
              <div class="form-row">
                <div class="col"><input type="text" name="pax_label" class="form-control" placeholder="Pax label (e.g. 1 person)" required></div>
                <div class="col"><input type="number" name="price" class="form-control" placeholder="Price" required></div>
                <div class="col"><input type="number" name="sort_order" class="form-control" placeholder="Sort" /></div>
                <div class="col"><button class="btn btn-primary">Add</button></div>
              </div>
            </form>

            <table class="table table-sm mt-2">
              <thead><tr><th>Pax</th><th>Price</th><th>Sort</th><th>Action</th></tr></thead>
              <tbody>
                @foreach($package->prices as $p)
                <tr>
                  <td>{{ $p->pax_label }}</td>
                  <td>{{ 'Rp '.number_format($p->price,0,',','.') }}</td>
                  <td>{{ $p->sort_order }}</td>
                  <td>
                    <form action="{{ route('admin.paket-tour.prices.update', $p->id) }}" method="POST" style="display:inline">
                      @csrf @method('PUT')
                      <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </form>
                    <form action="{{ route('admin.paket-tour.prices.destroy', $p->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">
                      @csrf @method('DELETE')
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Facilities</div>
          <div class="card-body">
            <form action="{{ route('admin.paket-tour.facilities.store', $package->id) }}" method="POST">
              @csrf
              <div class="input-group mb-2">
                <input type="text" name="name" class="form-control" placeholder="Facility name" required />
                <input type="number" name="sort_order" class="form-control" placeholder="Sort" />
                <div class="input-group-append">
                  <button class="btn btn-primary">Add</button>
                </div>
              </div>
            </form>

            <table class="table table-sm">
              <thead><tr><th>Facility</th><th>Sort</th><th>Action</th></tr></thead>
              <tbody>
                @foreach($package->facilities as $f)
                <tr>
                  <td>{{ $f->name }}</td>
                  <td>{{ $f->sort_order }}</td>
                  <td>
                    <form action="{{ route('admin.paket-tour.facilities.update', $f->id) }}" method="POST" style="display:inline">
                      @csrf @method('PUT')
                      <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </form>
                    <form action="{{ route('admin.paket-tour.facilities.destroy', $f->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">
                      @csrf @method('DELETE')
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header">Itineraries</div>
          <div class="card-body">
            <form action="{{ route('admin.paket-tour.itineraries.store', $package->id) }}" method="POST">
              @csrf
              <div class="form-row">
                <div class="col-4"><input type="text" name="time_label" class="form-control" placeholder="Time (e.g. 07.00 - 08.00)"></div>
                <div class="col-6"><input type="text" name="activity" class="form-control" placeholder="Activity" required></div>
                <div class="col-2"><button class="btn btn-primary">Add</button></div>
              </div>
            </form>

            <table class="table table-sm mt-2">
              <thead><tr><th>Time</th><th>Activity</th><th>Sort</th><th>Action</th></tr></thead>
              <tbody>
                @foreach($package->itineraries as $it)
                <tr>
                  <td>{{ $it->time_label }}</td>
                  <td>{{ $it->activity }}</td>
                  <td>{{ $it->sort_order }}</td>
                  <td>
                    <form action="{{ route('admin.paket-tour.itineraries.update', $it->id) }}" method="POST" style="display:inline">
                      @csrf @method('PUT')
                      <button class="btn btn-sm btn-outline-secondary">Edit</button>
                    </form>
                    <form action="{{ route('admin.paket-tour.itineraries.destroy', $it->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete?')">
                      @csrf @method('DELETE')
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
