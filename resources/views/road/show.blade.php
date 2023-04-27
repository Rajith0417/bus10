<x-map-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show road</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roads.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $road->name }}
            </div>
            <div class="form-group">
                <strong>Price:</strong>
                {{ $road->price }}
            </div>
            <div class="form-group">
                <strong>Distance:</strong>
                {{ $road->distance }}
            </div>
            <div class="form-group">
                <strong>Bidirecton:</strong>
                {{ $road->bidirectioin }}
            </div>
            <div class="form-group">
                <strong>Outstatioin:</strong>
                {{ $road->outstation }}
            </div>
            <div class="form-group">
                <input readonly id="waypoints" value="{{json_encode($waypointsCoords)}}" class="form-control">
            </div>

            <div id="right_waypoints" class="waypointsadd">
                @foreach ($waypoints as $waypoint)
                <span class="right_w_list form-control" id="{{ $waypoint->id }}">{{ $waypoint->id }} - {{ $waypoint->name }} - {{ $waypoint->district->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</x-map-layout>
