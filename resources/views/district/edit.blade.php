{{-- @extends('noMap')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default"> --}}
            <x-app-layout>
                <div class="panel-heading">district Update</div>
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
                    <form name="category-form" action="/districts/{{$district->id}}" method="post" class="form-horizontal" />
                    <div class="form-group">
                        <label class="control-label col-sm-2">Name: </label>
                        <div class="col-sm-10" >
                            <input name="name" type="text" value="{{$district->name}}" class="form-control" />
                        </div>

                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-default" />
                    <input type="hidden" name="_method" value="put" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <a class="btn btn-default pull-right" href="/districts">Back</a>
                    </form>

                </div>
            </x-app-layout>
            {{-- </div>
        </div>
    </div>
</div>
@endsection --}}
