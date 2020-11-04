@extends('app')
@section('content')
<div style="  margin-bottom: 20px;"></div>
<div class="container">
<h1 class="les-titres">{{$topic->title}}</h1>
<form action="{{ route('topics.update',$topic) }}" method="POST">
@csrf
@method('PATCH')
    <div class="form-group">
        <label for="title">titre</label>
    <input type="text" class="form-control" @error('title') is-invalid @enderror name="title" id="title" value="{{$topic->title}}">
        @error('title')
    <div class="invaled-feeback">{{ $error->first('title') }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">vote sujet</label>
        <textarea type="text" class="form-control" @error('content') is-invalid @enderror name="content" id="content" rows="5">{{$topic->content}}</textarea>
        @error('content')
        <div class="invaled-feeback">{{ $error->first('content') }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">modifier</button>
</form>
</div>
@endsection