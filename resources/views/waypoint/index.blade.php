<x-app-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>waypoints</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('waypoints.create') }}"> Create New waypoint</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($waypoints as $waypoint)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $waypoint->name }}</td>
            <td>{{ $waypoint->detail }}</td>
            <td>
                <form action="{{ route('waypoints.destroy',$waypoint->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('waypoints.show',$waypoint->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('waypoints.edit',$waypoint->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $waypoints->links() !!}
</x-app-layout>
