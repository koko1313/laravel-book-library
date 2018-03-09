@extends('layout')

@section('content')
<div class="container">
  <h2>Registration form</h2>

@include('messages')

  <form method="POST">
  	<div class="form-group">
      <label for="facultyNum">Facuty Number:</label>
      <input type="facultyNum" class="form-control" id="facultyNum" placeholder="Enter faculty number" name="facultyNum">
    </div>
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="fname" class="form-control" id="fname" placeholder="Enter first name" name="fname">
    </div>
     <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="lname" class="form-control" id="lname" placeholder="Enter last name" name="lname">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
      <label for="cfpassword">Confirm Password:</label>
      <input type="password" class="form-control" id="cfpassword" placeholder="Confirm password" name="cfpassword">
    </div>
    <div class="form-group">
      <label for="email">Email Address:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email adress" name="email">
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