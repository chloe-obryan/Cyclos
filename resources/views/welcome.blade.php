@extends('app')
@section('Accueil')
class="active"
@endsection
@section('content')
<div style="  margin-bottom: 20px;"></div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="{{asset("img/header01.png")}}"   alt="photo1">
          <div class="carousel-caption">
          </div>
        </div>
        <div class="item">
          <img src="{{asset("img/header02.png")}}" alt="photo2">
          <div class="carousel-caption">
          </div>
        </div>
        <div class="item">
          <img src="{{asset("img/header3.png")}}" alt="photo3">
          <div class="carousel-caption">
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Prochain</span>
      </a>
    </div>
    @include('annonce.recherche')
    <div class="container" style="padding-top: 20px">
        <div class="row">
        	<div class="col-md-6">
        		<div class="panel panel-default">
        			<div class="panel-heading les-titres"><h5>LES DERNIERS ANNONCES</h5></div>
        			<div class="panel-body">
                        
                        
        		    </div>
        	    </div>
        	</div>
        	<div class="col-md-6">
        		<div class="panel panel-default">
        			<div class="panel-heading"><h5>LES ANNONCES LES PLUS NOTES</h5></div>
        			<div class="panel-body">
                      
                       
        		    </div>
        	    </div>
        	</div>
        </div>
    </div>

@endsection
@section('script_carousel')
<script>
//$('.carousel').carousel();
$('.fade').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});
</script>
@endsection