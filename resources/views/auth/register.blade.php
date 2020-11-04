@extends('app')

@section('content')
<div style="  margin-bottom: 20px;"></div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="les-titres">Inscription</h4></div>
				<div class="panel-body">
					
					<form class="form-horizontal" role="form" method="POST" action="{{route('register')  }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="well text-center"><h4>L'essentiel sur vous</h4></div>

						<div class="form-group">
							<label class="col-md-4 control-label">Adresse E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmation</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nom" value="{{ old('nom') }}" >
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Prénom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" >
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Civilité</label>
							<div class="col-md-6">
							    <div class="btn-group" data-toggle="buttons">
                                  <label class="btn btn-default active">
                                    <input type="radio" name="genre" value="Homme" checked> Homme
                                  </label>
                                  <label class="btn btn-default">
                                    <input type="radio" name="genre" value="Femme"> Femme
                                  </label>
                                </div>
                            </div>
						</div>

						<div class="form-group">
                            <label class="col-md-4 control-label">Date de naissance</label>
                        	<div class="col-md-6">
                        		<input type="date" class="form-control" id="datepicker" name="date_nais" value="{{ old('date_nais') }}" required>
                        	</div>
                        </div>

                        <div class="well text-center"><h4>Presentation</h4></div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Diplome</label>
							<div class="col-md-6">
									<select class="form-control" name="diplomes_id" class="form-control input-md">
											@foreach($diplomes as $diplome)
												<option value="{{$diplome->id}}">{{$diplome->intitule}}</option>
											@endforeach
										</select>
							</div>
                        </div>
                        
						<div class="form-group">
								<label class="col-md-4 control-label">ville</label>
								<div class="col-md-6">
										<select class="form-control" name="villes_id" class="form-control input-md">
												@foreach($villes as $ville)
													<option value="{{$ville->id}}">{{$ville->nom}}</option>
												@endforeach
											</select>
								</div>
						</div>
							<div class="form-group">
									<label class="col-md-4 control-label">Secteur</label>
									<div class="col-md-6">
											<select class="form-control" name="secteurs_id" class="form-control input-md">
													@foreach($secteurs as $secteur)
														<option value="{{$secteur->id}}">{{$secteur->secteurActivite}}</option>
													@endforeach
												</select>
									</div>
							</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Numéro de téléphone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="num_tel" value="{{ old('num_tel') }}" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Fonction</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="fonction" value="{{ old('fonction') }}" required >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Liens(site,dépot,..)</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lienUtil" value="{{ old('lientil') }}" required >
							</div>
						</div>



                        <div class="form-group">
                        	<label class="col-md-4 control-label">Description</label>
                        	<div class="col-md-6">
                        		<textarea class="form-control" name="description" rows="6" style="resize:none">{{ old('description') }}</textarea>
                        	</div>
                        </div>

                        <div class="form-group">
                        	<label class="col-md-4 control-label">Votre photo</label>
                        	<div class="col-md-6">
                        		<input type="file" name="photo">
                        	</div>
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha col-md-offset-4" data-sitekey="6LfmXCITAAAAAMmKvBnlrN780RdjN8JAWWyPaMnX" style="padding: 15px"></div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									S'inscrire
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



