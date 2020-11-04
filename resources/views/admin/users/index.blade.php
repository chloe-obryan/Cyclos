
@extends('app')
@section('content')
<div style="  margin-bottom: 20px;"></div>
<div class="container">
    <div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading "><h3 class="les-titres"><strong>Liste des utilisateurs</strong></h3></div>
                    <div class="panel-body">
                        <table id="produits" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>   
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                    <td >
                                    <a href="{{route('admin.users.edit', $user->id)}}"><button class="btn btn-primary">Editer</button></a>
                                        <form action="{{route('admin.users.destroy', $user->id)}}" method="POST" style="float: left">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning">Suprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
           </div>
        </div>
    </div>
</div>

@endsection
