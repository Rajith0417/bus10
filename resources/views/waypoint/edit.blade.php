<x-map-layout>
    <div class="panel-heading">waypoint Update</div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="panel-body">
        <form name="category-form" action="/waypoints/{{$waypoint->id}}" method="post" class="form-horizontal" />
        <div class="form-group">
            <label class="control-label col-sm-2">Name: </label>
            <div class="col-sm-10" >
                <input name="name" type="text" value="{{$waypoint->name}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Level: </label>
            <div class="col-sm-10" >
                <input name="level" type="text" value="{{$waypoint->level}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Longitude: </label>
            <div class="col-sm-10" >
                <input name="lng" id="lng" type="text" value="{{$waypoint->lng}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Latitude: </label>
            <div class="col-sm-10" >
                <input name="lat" id="lat" type="text" value="{{$waypoint->lat}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">District: </label>
            <div class="col-sm-10" >
                <input name="district_id" type="text" value="{{$waypoint->district_id}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Show: </label>
            <div class="col-sm-10" >
                <input name="show" type="text" value="{{$waypoint->show}}" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Parent: </label>
            <div class="col-sm-10" >
                <input name="parent_id" type="text" value="{{$waypoint->parent_id}}" class="form-control" />
            </div>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-default" />
        <input type="hidden" name="_method" value="put" />
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <a class="btn btn-default pull-right" href="/waypoints">Back</a>
        </form>

    </div>
</x-map-layout>
