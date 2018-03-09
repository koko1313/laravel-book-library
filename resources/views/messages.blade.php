@if(count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    </ul>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
    </div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif