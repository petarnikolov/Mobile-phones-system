<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
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
                $date=date('Y-m-d', $phone['releaseDate']);
            @endphp
            <tr>
                <td>{{$phone['id']}}</td>
                <td>{{$phone['name']}}</td>
                <td>{{$date}}</td>
                <td>{{$phone['manufacturer']}}</td>


                <td><a href="{{action('PhonesController@edit', $phone['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('PhonesController@destroy', $phone['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>