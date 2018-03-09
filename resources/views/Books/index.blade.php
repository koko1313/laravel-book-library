@extends('layout')

@section('content')
<div class="container">
    @if(Auth::user()->is_admin === 1)
        <a href="{{route('books.create')}}">Create new</a> |
        <a href="{{route('authors.list')}}">Authors</a>
    @endif
<table border="1" style="border-collapse: collapse;" class="table table-striped">
    <thead>
    <th scope="col">Title</th>
    <th scope="col">Year</th>
    <th scope="col">Author</th>
    <th scope="col">Summary</th>
    @if(Auth::user()->is_admin === 1)
        <th scope="col">Options</th>
    @endif
    </thead>
    <tbody>
    @foreach($books as $b)
        <tr>
            <td>{{$b->title}}</td>
            <td>{{$b->year}}</td>
            <td>{{$b->author->name}}</td>
            <td>{{$b->description}}</td>
            @if(Auth::user()->is_admin === 1)
                <td>
                    <button class="btn btn-outline-secondary"><a href="{{route('books.edit', $b->id)}}">Edit</a></button>
                    <form method="POST" action="{{route('books.delete', $b->id)}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" name="submit" class="btn btn-outline-secondary" onclick="return confirm('Are you sure ?');">Delete</button>
                    </form>

                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
<div>
        {{$books->render()}}
    </div>
</div>
@endsection