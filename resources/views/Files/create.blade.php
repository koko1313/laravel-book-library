@extends('layout')

@section('content')
@include('messages')
<div class="wrapper">
	@if($errors->any())
    <ul>
        @foreach($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    </ul>
@endif
	<form method="Post"  enctype="multipart/form-data">
		{{csrf_field()}}
		@if($file->id > 0)
		{{method_field('PUT')}}
		@endif
	<section class="panel panel-primary">
	<div class="panel-heading">
		Upload Files
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<th>Title</th>
				<th>Books</th>
				<th>.PDF</th>
				<th>Select Cover</th>
				<th>Language</th>
			</thead>
			<tbody>
				<tr>
					<th><input type="text" name="file_title"  
					@if(isset($file)) value="{{$file->file_title}}"
            		@else value="{{old('file_title')}}" @endif 
            		placeholder="Enter file title" id="file_title_id"></th>
            		<th><select name="book">
            			@foreach($book as $b)
            			<option value="{{$b->id}}">{{$b->title}}</option>
            			@endforeach
            		</select></th>
					@if($file->cover)
					<img src="{{url($file->cover)}}" class="img-fluid" width="10%">
					@endif
					<th><input type="file" name="file_name"></th>
					<th><input type="file" name="coverBook" /></th>
					<th><input type="text" name="language" @if(isset($file)) value="{{$file->language}}"
            		@else value="{{old('language')}}" @endif  placeholder="Enter language"></th>
				</tr>
			</tbody>
		</table>
		<div class="form-group">
			<input type="submit" value="Save" class="form-control">
		</div>
	</div>
	</section>
</form>
</div>
@endsection