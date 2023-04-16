{{-- @section('content') --}}
<x-map-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show waypoint</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('waypoints.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $waypoint->name }}
            </div>
            <div class="form-group">
                <strong>Level:</strong>
                {{ $waypoint->level }}
            </div>
            <div class="form-group">
                <strong>Longitude:</strong>
                {{ $waypoint->lng }}
                <input type="text" id="lng" name="lng" class="form-control" value="{{ $waypoint->lng }}" readonly>
            </div>
            <div class="form-group">
                <strong>Latitude:</strong>
                {{ $waypoint->lat }}
                <input type="text" id="lat" name="lat" class="form-control" value="{{ $waypoint->lat }}" readonly>
            </div>
            <div class="form-group">
                <strong>District:</strong>
                {{ $waypoint->district_id }}
            </div>
            <div class="form-group">
                <strong>Show:</strong>
                {{ $waypoint->show }}
            </div>
            <div class="form-group">
                <strong>Parent:</strong>
                {{ $waypoint->parent_id }}
            </div>
        </div>
    </div>
</x-map-layout>
{{-- @endsection --}}
