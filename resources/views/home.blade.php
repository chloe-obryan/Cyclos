@extends('app')


@section('content')
<div style="  margin-bottom: 20px;">

</div>

<div class="container">
     <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
            	<div class="panel-heading "><h5 class="les-titres">Votre profil
                    <div class="pull-right"><a href="{{route('user.edit',$user->id)}}">Modifier
                    <i class="fa fa-pencil-square-o"></i></a></div>
                    </h5>
                </div>
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
                                   <h3>{{$user->nom.' '.$user->prenom}}<br>
                                        <small> {{$user->genre}}<br>
                                        ({{ \Carbon\Carbon::createFromTimestamp(strtotime($user->date_nais))->age.' ans' }})
                                        </small>
                                   </h3>
                               </a>
                   
                   
                        <table>
                           <tr>
                              <td><h5>Ville:&nbsp;&nbsp;{{$user->ville->nom}}</h5></td>
                            
                           </tr>
                           <tr>
                             <td>
                                 <h5>
                                    Mes préférences:&nbsp;&nbsp;
                                 </h5>
                             </td>
                             <td>
                               
                             </td>
                           </tr>
                        </table>
                   </div>
                </div>
                <div class="panel-body">
                   <div id="jumb">
                       <h4>Ma bio</h4>
                       <p id="text_jump">
                            @if(!empty($user->description))
                            {{$user->description}}
                            @else
                            Vous n'avez renseigné aucune description
                            @endif
                       </p>
                   </div>
                </div>
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

    <div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h5>LES DERNIERE ANNONCES </h5></div>
				<div class="panel-body">
                   
			    </div>
		    </div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h5>TOUTES LES ANNONCES</h5></div>
				<div class="panel-body">
                   
			    </div>
		    </div>
		</div>
	</div>
</div>

@endsection
