@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Phones repository</h2><br/>

        <form method="POST" action="/manufacturers/{{ $manufacturer -> id }}" enctype="multipart/form-data">
            {{method_field('PATCH')}}
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Name:</label>
                    <label>
                        <input type="text" class="form-control" name="name" value="{{ $manufacturer->name }}" required>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection
