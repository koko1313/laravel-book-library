@extends('layout')

@section('content')
@include('messages')
<div class="container">
    @if(Auth::user()->is_admin === 1)
        <a href="{{route('files.create')}}">Add new file</a> | 
    @endif
<div class="wrapper">
	<section class="panel panel-primary">
	<div class="panel-heading">
		Download Files
	</div>
		<table class="table table-bordered">
			<thead>
				<th>Cover</th>
				<th>Title</th>
				<th>Language</th>
				<th>Upload Date</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($files as $f)
				<tr>
					@if($f->cover)
					<th width="10%"><img src="{{url($f->cover)}}" class="img-fluid" width="100%"></th>
					@endif
					<th>{{$f->file_title}}</th>
					<th>{{$f->language}}</th>
					<th>{{$f->created_at}}</th>
					<th>
						<a href="{{url($f->file_name)}}" download=>
							<button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download</i></button>
						</a>
						<br>
						@if(Auth::user()->is_admin === 1)
						<button class="btn btn-outline-secondary"><a href="{{route('files.edit', $f->id)}}">Edit</a></button>
                    <form method="POST" action="{{route('files.delete', $f->id)}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-outline-secondary" onclick="return confirm('Are you sure ?');">Delete</button>
                    </form>
                    @endif
					</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	<div>
		{{$files->render()}}
	</div>
	</section>
</div>
@endsection