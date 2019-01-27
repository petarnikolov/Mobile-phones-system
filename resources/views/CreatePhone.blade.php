@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Phones repository</h2><br/>
    <form method="post" action="{{url('phones')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">Name:</label>
                <label>
                    <input type="text" class="form-control" name="name">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">Manufacturer:</label>
                <label>
                    <input type="text" class="form-control" name="manufacturer">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input type="file" name="filename">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <strong>Date : </strong>
                <label for="datepicker"></label>
                <input class="date form-control" type="text" id="datepicker" name="releaseDate">
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
