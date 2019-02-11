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


    <form method="POST" action="{{action("SearchController@GetBy")}}" role="search" >
        @csrf
        <div class="form-group col-md-6">
            <label for="Name">Search:</label>
            <label>
                <input type="text" class="form-control" name="manufacturer" >
            </label>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>

    </form>
    <div class="form-group col-md-4">
    @if(auth()->user()->isAdmin())

            <a href="{{ URL('manufacturers') }}" class="btn btn-primary"> awdasd </a>

    @endif
    </div>
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

            <tr>
                <td>{{$phone->id}}</td>
                <td>{{$phone->name}}</td>
                <td>{{$phone->releaseDate}}</td>
                <td>{{$phone->manufacturer}}</td>
                <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('phones/' . $phone->id . '/edit') }}">Edit</a>
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
