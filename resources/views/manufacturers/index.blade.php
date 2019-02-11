@extends('layouts.app')

@section('content')
    <div class="container">
        <br />
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <div class="form-group col-md-4">
            <a href="{{ URL('manufacturers/create') }}" class="btn btn-primary"> Add new Manufacturer </a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($manufacturers as $manufacturer)

                <tr>
                    <td>{{$manufacturer->id}}</td>
                    <td>{{$manufacturer->name}}</td>
                    <td>
                        <a class="btn btn-small btn-info" href="{{ URL::to('manufacturers/' . $manufacturer->id . '/edit') }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{action('ManufacturersController@destroy', $manufacturer->id )}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
