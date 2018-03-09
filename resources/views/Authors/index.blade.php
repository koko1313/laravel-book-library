@extends('layout')

@section('content')
<div class="container">
    <a href={{route('authors.create')}}>Create new</a>

    <table border="1" style="border-collapse: collapse;" class="table table-striped">
        <thead>
        <th>Име</th>
        <th>Oprions</th>
        </thead>
        <tbody>
        @foreach($authors as $a)
            <tr>
                <td>{{$a->name}}</td>
                <td>
                    <button class="btn btn-outline-secondary"><a href="{{route('authors.edit', $a->id)}}">Edit</a></button>
                    <form method="POST" action="{{route('authors.delete', $a->id)}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-outline-secondary" onclick="return confirm('Are you sure ?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{$authors->render()}}
    </div>
</div>
@endsection