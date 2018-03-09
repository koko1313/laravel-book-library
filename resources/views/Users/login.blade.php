@extends('layout')

@section('content')
<div class="container">
  <h2>Login form</h2>

@include('messages')

  <form method="POST">
  	<div class="form-group">
      <label for="facultyNum">Facuty Number:</label>
      <input type="facultyNum" class="form-control" id="facultyNum" placeholder="Enter faculty number" name="facultyNum">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit"/>
      {{csrf_field()}}
  </form>
</div>
@endsection