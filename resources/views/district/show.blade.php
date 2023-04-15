{{-- @section('content') --}}
<x-app-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show district</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('districts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $district->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $district->detail }}
            </div>
        </div>
    </div>
</x-app-layout>
{{-- @endsection --}}
