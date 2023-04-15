<x-app-layout>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Districts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('districts.create') }}"> Create New district</a>
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
        @foreach ($districts as $district)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $district->name }}</td>
            <td>{{ $district->detail }}</td>
            <td>
                <form action="{{ route('districts.destroy',$district->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('districts.show',$district->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('districts.edit',$district->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $districts->links() !!}
</x-app-layout>
