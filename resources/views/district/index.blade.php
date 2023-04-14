<!-- resources/views/district/index.blade.php -->
{{-- @extends('layout')

@section('content') --}}
<x-app-layout>
    <h1>district</h1>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Statistics</th>
                <th>#1</th>
                <th>#2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Driver Name</td>
                <td>John Doe</td>
                <td>Mary Sue</td>
            </tr>
            <tr>
                <td>Origin</td>
                <td>Downtown</td>
                <td>Uptown</td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('district.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Add new district...">
        <button type="submit">Add</button>
    </form>
    <ul>
        @foreach ($districts as $district)
            <li>
                <form action="{{ route('district.update', $district->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="completed">{{$district->name}}</label>
                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $district->completed ? 'checked' : '' }}>
                    <span style="{{ $district->completed ? 'text-decoration: line-through' : '' }}">{{ $district->title }}</span>
                </form>
                <form action="{{ route('district.destroy', $district->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
{{-- @endsection --}}
</x-app-layout>
