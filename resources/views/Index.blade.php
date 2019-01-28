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
    <a href="{{ URL('phones/create') }}" class="btn btn-primary"> Add new Phone </a>
    </div>
    <form method="POST" action="{{action("SearchController@GetByName")}}" role="search" >
        @csrf
        <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <label>
                <input type="text" class="form-control" name="name" >
            </label>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>

    <form method="POST" action="{{action("SearchController@GetByManufacturer")}}" role="search" >
        @csrf
        <div class="form-group col-md-6">
            <label for="Name">Manufacturer:</label>
            <label>
                <input type="text" class="form-control" name="manufacturer" >
            </label>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>

    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Release Date</th>
            <th>Manufacturer</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($phones as $phone)
            @php
                $date=date('Y-m-d', strtotime($phone['releaseDate']));
            @endphp
            <tr>
                <td>{{$phone['id']}}</td>
                <td>{{$phone['name']}}</td>
                <td>{{$date}}</td>
                <td>{{$phone['manufacturer']}}</td>
                <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('phones/' . $phone['id'] . '/edit') }}">Edit</a>
                </td>
                <td>
                    <form action="{{action('PhonesController@destroy', $phone->id )}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
              {{--  <td><a href="{{action('PhonesController@edit', $phone['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('PhonesController@destroy', $phone['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>  --}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
