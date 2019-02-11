@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add new Manufacturer</h2><br/>
    <form method="post" action="{{url('manufacturers/')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Phone Name" required>
                </label>
            </div>
        </div>


    <form>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    </form>
</div>

@endsection
