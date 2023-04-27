<x-app-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>roads</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('roads.create') }}"> Create New road</a>
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
            <th>Price</th>
            <th>Distance</th>
            <th>BiDirection</th>
            <th>Outstation</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roads as $road)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $road->name }}</td>
            <td>{{ $road->price }}</td>
            <td>{{ $road->distance }}</td>
            <td>{{ $road->bidirection }}</td>
            <td>{{ $road->outstation }}</td>
            <td>
                <form action="{{ route('roads.destroy',$road->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('roads.show',$road->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('roads.edit',$road->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $roads->links() !!}
</x-app-layout>
