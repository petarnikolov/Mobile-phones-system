@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Phones repository</h2><br/>

        <form method="POST" action="/phones/{{ $phone -> id }}" enctype="multipart/form-data">
            {{method_field('PATCH')}}
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Name:</label>
                    <label>
                        <input type="text" class="form-control" name="name" value="{{ $phone->name }}" required>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Manufacturer:</label>
                    <label>
                        <select class="select4" name="manufacturer" >
                            <option value="">Please Select</option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id}}" {{$phone->manufacturer_id == $manufacturer->id  ? 'selected' : ''}}>{{$manufacturer->name}}</option>
                            @endforeach</select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <strong>Date : </strong>
                    <label for="datepicker"></label>
                    <input class="date form-control" type="text" id="datepicker" name="releaseDate" value="{{$phone->releaseDate}}" required>
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
