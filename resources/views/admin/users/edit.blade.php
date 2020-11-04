@extends('app')

@section('content')
<div style="  margin-bottom: 20px;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editer <strong>{{$user->name}}</strong></div>
               
                <div class="card-body">
                   <form action="{{route('admin.users.update', $user)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="container">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Adresse E-Mail</label>
                        <div class="col-md-2">
                            <input type="email" class="form-control" name="email" value="{{ old('email') ?? $user->email }}" required>
                        </div>
                    </div>
                </div>
                    @foreach ($roles as $role)
                    <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" id="{{$role->id}}" @if ($user->roles->pluck('id')->contains($role->id)) checked
                    @endif>
                    <label for="{{$role->id}}" class="form-cheik-label">{{$role->name}}</label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">modifier les infos</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection