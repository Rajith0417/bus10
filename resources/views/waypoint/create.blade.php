<x-map-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New waypoint</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('waypoints.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <label for="">Whoops!</label> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('waypoints.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Level:</label>
                    <input type="text" name="level" class="form-control" placeholder="Level">
                </div>
                <div class="form-group">
                    <label for="">Longitude:</label>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="Longitude">
                </div>
                <div class="form-group">
                    <label for="">Latitude:</label>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="Latitude">
                </div>
                <div class="form-group">
                    <label for="">District:</label>
                    <input type="text" name="district_id" class="form-control" placeholder="District">
                </div>
                <div class="form-group">
                    <label for="">Show:</label>
                    <input type="text" name="show" class="form-control" placeholder="Snow">
                </div>
                <div class="form-group">
                    <label for="">Parent:</label>
                    <input type="text" name="parent_id" class="form-control" placeholder="Parent">
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="">Detail:</label>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</x-map-layout>
