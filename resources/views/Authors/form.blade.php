@extends('layout')

@section('content')

<div class="container">
    <h2>Authors form</h2>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    </ul>
@endif

<form method="POST">
    <div class="form-group">
    <input
            type="text" name="name"
            @if(isset($author))
            value="{{$author->name}}"
            @endif
            placeholder="Name"
            class="form-control"
    />
    </div>

    <input type="submit" value="Submit" class="form-control">
    {{csrf_field()}}

    @if(isset($author))
        {{method_field('PUT')}}
    @endif
</form>

</div>

@endsection