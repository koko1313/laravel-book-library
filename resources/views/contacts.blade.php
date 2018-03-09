@extends('layout')

@section('content')

@include('messages')
<div class="container">
    <h2>Contact form</h2>

<form method="Post">
    <div class="form-group">
    <input name="subject" type="text" class="form-control" placeholder="Subject">
    </div>

    <div class="form-group">
    <input  type="text" name="email" 
			placeholder="Email..." class="form-control" 
			value="{{old('email')}}">
    </div>

    <div class="form-group">
    <textarea name="message" rows="10" class="form-control"></textarea>
    </div>

    <input class="form-control" type="submit" value="Submit">
    {{csrf_field()}}
</form>
</div>
@endsection