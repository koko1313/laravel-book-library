@extends('layout')

@section('content')

<div class="container">
    <h2>Book form</h2>
@if($errors->any())
    <ul>
        @foreach($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    </ul>
@endif
<form method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    @if($book->id > 0)
     {{method_field('PUT')}}
     @endif
    <div class="form-group">
    <input
            type="text" name="title"
            @if(isset($book))
            value="{{$book->title}}"
            @else
            value="{{old('title')}}"
            @endif
            placeholder="Title"
            class="form-control"
    />
    </div>

    <div class="form-group">
    <select name="author_id" class="form-control">
        <option value="">Select an Author</option>
        @foreach($authors->all() as $au)
        @if($au->id>0 && $au->id===$book->author_id)
        <option selected value="{{$au->id}}">{{$au->name}}</option>
        @else
        <option  value="{{$au->id}}">{{$au->name}}</option>
        @endif
        @endforeach
    </select>
    </div>

    <div class="form-group">
    <input
            type="number" name="year"
            @if(isset($book))
            value="{{$book->year}}"
            @else
            value="{{old('year')}}"
            @endif
            placeholder="Year"
            class="form-control"
    />
    </div>

    <div class="form-group">
    <textarea name="description" cols="50" rows="10" class="form-control">
        @if(isset($book))
        {{$book->description}}
        @else
        {{old('description')}}
        @endif
    </textarea><br />
    </div>

    <input type="submit" name="submit" value="Submit" class="form-control">

</form>
</div>

@endsection