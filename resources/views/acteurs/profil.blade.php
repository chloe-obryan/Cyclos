@extends('app')

@section('activeProfil')
class="active"
@endsection

@section('content')
<div style="  margin-bottom: 20px;">

</div>

<div class="container">


    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
            	<div class="panel-heading ">
                    <h5 class="les-titres">
                        Voir les profils
                    </h5>
                </div>
                @foreach ($users as $user)
                <div class="panel-body">
                    <div class="col-xs-4">
                            <a href="">
                                <div class="thumbnail">
                                    <img class="img-rounded" src=" {{asset('storage').'/'.$user->photo}}" alt="photo de profil">
                                </div>
                            </a>
                       </div>
                <div class="col-xs-8">
                           <a href="">
                               <h5>{{$user->nom.' '.$user->prenom}}<br>
                                    <small> {{$user->genre}}<br>
                                    ({{ \Carbon\Carbon::createFromTimestamp(strtotime($user->date_nais))->age.' ans' }})
                                    </small>
                               </h5>
                               <h5>
                                   Ville :<span style="color: cornflowerblue;">{{$user->ville->nom}}</span> <br><br>
                                   Statut :<span style="color: cornflowerblue;">{{$user->fonction}}</span> <br><br>
                                   Niveau :<span style="color: cornflowerblue;">{{ $user->diplome->intitule}}</span> 
                               </h5>
                           </a>
               </div>
            </div> 
                @endforeach
                </div>
            </div>

        <div class="col-md-6">
            <div class="panel panel-default">
            	<div class="panel-heading"><h5>Ca se passe près de chez vous !</h5></div>
            	<div class="panel-body">
                  
            	</div>
            </div>
        </div>
    </div>
</div>

@endsection
