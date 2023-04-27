<x-map-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New road</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roads.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <label class="col-sm-2 col-form-label" for="">Whoops!</label> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roads.store') }}" method="POST">
        @csrf

        <div class="d-flex flex-row">
            <label class="col-sm-2 col-form-label" for="">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="d-flex flex-row">
            <label class="col-sm-2 col-form-label" for="">Price:</label>
            <input type="text" name="price" class="form-control" placeholder="Price">
        </div>
        <div class="d-flex flex-row">
            <label class="col-sm-2 col-form-label" for="">Distance:</label>
            <input type="text" name="distance" class="form-control" placeholder="Distance">
        </div>
        <div class="d-flex align-items-center">
            <label class="col-sm-2 col-form-label" for="">Bidirection:</label>
            <input type="checkbox" name="bidirection" class="form-check-input">
        </div>
        <div class="d-flex align-items-center">
            <label class="col-sm-2 col-form-label" for="">Outstation:</label>
            <input type="checkbox" name="outstation" class="form-check-input">
        </div>
        <div class="d-flex flex-row">
            <label class="col-sm-2 col-form-label" for="">waypoints:</label>
            <input readonly id="waypoints" type="inbox" name="waypoints" class="form-control-plaintext">
        </div>
        <div class="d-flex flex-row">
            <label class="col-sm-2 col-form-label" for="">District:</label>
            <select name="" id="districtAjax" class="form-control">
                <option value="0">Districts</option>
                @foreach ($districts as $district)
                <option value="{{$district->id}}">{{$district->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-xs-12 col-sm-12 col-md-5 drag-drop" id="left-section">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 drag-drop" id="right-section">
            </div>
        </div>

    </form>
</x-map-layout>
