@extends('app')

@section('extra-js')
{!! NoCaptcha :: renderJs () !!}
@endsection

@section('content')

<div style="  margin-bottom: 20px;"></div>

<div class="container ">
   <h1 ><span class="les-titres">créer un topics</span> </h1>
<form action="{{route('topics.store')}}" method="POST">
@csrf
    <div class="form-group ">
        <label  for="title">titre</label>
        <input type="text" class="form-control" @error('title') is-invalid @enderror name="title" id="title">
        @error('title')
    <div class="invalid-feedback text-danger">{{ $errors->first('title') }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">vote sujet</label>
        <textarea type="text" class="form-control @error('content') is-invalid @enderror"  name="content" id="content" rows="5"> </textarea>
        @error('content')
        <div class="invalid-feedback text-danger">{{ $errors->first('content') }}</div>
        @enderror
    </div>
<div class="group">
    {!! NoCaptcha :: display() !!}
    @if ( $errors -> has ( 'g-recaptcha-response' ))
    <span class = "help-block" >
        <strong> {{ $errors -> first ( 'g-recaptcha-response' )}} </strong>
    </span>
    @endif
</div>
    <button type="submit" class="btn btn-primary">créer un topic</button>
</form>
</div>
@endsection