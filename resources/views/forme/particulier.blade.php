@extends('app')


 @section('content')
 <div style="  margin-bottom: 20px;"></div>
 <div class="content-wrapper image-arriere">
<br>
 <h4 class="text-center text-black">ENREGISTRER </h4>

 <form class="form-horizontal "action=" {{url('ajouter-diplome')}}" method="post">

<div class="page-sectio d-flex">
@csrf
<div class="form-group" >
  <label class="col-md-4 control-label text-black"  for="">Diplome</label>  
  <div class="col-md-4">
  <input id="" name="intitule" type="text" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-4">
    <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
    <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
  </div>
</div>
</div>

</form>

<form class="form-horizontal "action=" {{url('ajouter-ville')}}" method="post">

<div class="page-sectio d-flex">
@csrf
<div class="form-group" >
  <label class="col-md-4 control-label text-black"  >Ville</label>  
  <div class="col-md-4">
  <input id="" name="nom" type="text" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-4">
    <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
    <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
  </div>
</div>
</div>

</form>

<form class="form-horizontal "action=" {{url('ajouter-secteur')}}" method="post">

<div class="page-sectio d-flex">
@csrf
<div class="form-group" >
  <label class="col-md-4 control-label text-black"  for="">Secteur</label>  
  <div class="col-md-4">
  <input id="" name="secteurActivite" type="text"  class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-4">
    <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
    <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
  </div>
</div>
</div>

</form>

<form class="form-horizontal "action=" {{url('ajouter-pays')}}" method="post">

  <div class="page-sectio d-flex">
  @csrf
  <div class="form-group" >
    <label class="col-md-4 control-label text-black"  for="">Pays</label>  
    <div class="col-md-4">
    <input id="" name="nom" type="text"  class="form-control input-md">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="button1id"></label>
    <div class="col-md-4">
      <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
      <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
    </div>
  </div>
  </div>
  
  </form>

</div>
@endsection