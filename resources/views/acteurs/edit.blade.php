@extends('app')

@section('content')

<div style="  margin-bottom: 20px;"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="les-titres">Editer votre profil</h4></div>
				<div class="panel-body">
			

					<form class="form-horizontal" role="form" method="POST" action="{{ route('user.update',$user) }}" >
						@csrf
						@method('PATCH')
						<div class="well text-center"><h4>Vos coordonnées</h4></div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nom" value="{{$user->nom}}" required>
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="prenom" value="{{ $user->prenom }}" required>
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Civilité</label>
							<div class="col-md-6">
							    <div class="btn-group" data-toggle="buttons">
                                  <label class="btn btn-default
                                  @if($user->genre == 'Homme')
                                  {{'active'}}
                                  @endif
                                  ">
                                    <input type="radio" name="genre" value="Homme"
                                    @if($user->genre == 'Homme')
                                    {{'checked'}}
                                    @endif
                                    > Homme
                                  </label>
                                  <label class="btn btn-default
                                    @if($user->genre == 'Femme')
                                    {{'active'}}
                                    @endif
                                  ">
                                    <input type="radio" name="genre" value="Femme"
                                    @if($user->genre == 'Femme')
                                    {{'checked'}}
                                    @endif
                                    > Femme
                                  </label>
                                </div>
                            </div>
						</div>

						<div class="form-group">
                            <label class="col-md-4 control-label">Date de naissance</label>
                        	<div class="col-md-6">
                        		<input type="text" class="form-control" id="datepicker" name="date_nais" value="{{$user->date_nais}}" required>
                        	</div>
                        </div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Numéro de téléphone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="num_tel" value="{{ $user->num_tel }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">ville</label>
							<div class="col-md-6">
									<select class="form-control" name="villes_id" class="form-control input-md">
											@foreach($villes as $ville)
												<option value="{{$user->ville->id}}">{{$user->ville->nom}}</option>
											@endforeach
										</select>
							</div>
					</div>


                        <div class="form-group">
                        	<label class="col-md-4 control-label">Présentation</label>
                        	<div class="col-md-6">
                        		<textarea class="form-control" name="description" rows="6" style="resize:none">{{ $user->description }}</textarea>
                        	</div>
                        </div>

                        <div class="form-group">
                        	<label class="col-md-4 control-label">Votre photo</label>
                            <div class="col-md-6">
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="thumbnail">
                                <img src="{{asset('storage').'/'.$user->photo}}" alt="photo de profil" class="img-rounded">
                                </div>
                              </div>

                            </div>

                        	<input type="file" name="photo">
                        	</div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Enregistrer
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

