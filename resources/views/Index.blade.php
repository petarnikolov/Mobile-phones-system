@extends('layouts.app')

@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <a href="{{ URL('phones/create') }}" class="btn btn-primary"> Add new Phone </a>
    <a href="{{ URL::to('phones/GetByName/awdas') }}" class="btn btn-primary"> Filter by name </a>

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
                <a class="btn btn-small btn-info" href="{{ URL::to('phones/' . $phone['id'] . '/edit') }}">Edit manufacturer</a>
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
