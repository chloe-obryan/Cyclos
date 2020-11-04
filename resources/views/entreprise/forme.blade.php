@extends('app')
@section('activeEts/Ong')
class="active"
@endsection
@section('content')
<div style="  margin-bottom: 20px;"></div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('entreprise/store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-default">
                            <div class="panel-heading les-titres"><h4 class="les-titres"><span class="glyphicon glyphicon-pencil"></span> Enregistrer mon entreprise</h4></div>
                                <div class="panel-body">

                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Nom</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                      <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>
                                                      <span class="input-group-addon">CYCLOS</span>
                                                    </div>
                                                </div>
                                        </div>   
                                            <div class="form-group">
                                                    <label class="col-md-4 control-label">adress</label>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                          <input type="text" class="form-control" name="adress" value="{{ old('adress') }}" required>
                                                          <span class="input-group-addon">CYCLOS</span>
                                                        </div>
                                                    </div>
                                            </div>   

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Code Postal</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                              <input type="text" class="form-control" name="codePostal" value="{{ old('codePostal') }}" required>
                                              <span class="input-group-addon">CYCLOS</span>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                            <label class="col-md-4 control-label">Site Internet</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="datepicker" name="siteInternet" value="{{ old('siteInternet') }}" required>
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
                                                <label class="col-md-4 control-label">Pays</label>
                                                <div class="col-md-6">
                                                        <select class="form-control" name="pays_id" class="form-control input-md">
                                                                @foreach($pays as $pays)
                                                                    <option value="{{$pays->id}}">{{$pays->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                </div>
                                        </div>
        
                                    <div class="form-group">
                                       <label class="col-md-4 control-label">Logo</label>
                                       <div class="col-md-6">
                                           <input type="file" class="form-control" name="logo" value="{{ old('logo') }}" pattern="^[0-9]+$">
                                       </div>
                                    </div>

                                </div>
                            </div>

                        <div class="panel panel-default">
                                <div class="panel-body">
                                   
                                <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                               Enregister
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

