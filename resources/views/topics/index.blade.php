@extends('app')
@section('content')
<div style="  margin-bottom: 20px;"></div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
            	<div class="panel-heading"><h5 class="">
                   <a class="panel-heading" href="{{ route('topics.create') }}">Nouvelle discussion
                    <i class="fa fa-pencil-square-o"></i></a>
                    </h5>
                </div>

                <div class="panel-body pt-6">
                    a
                    <h4>Catégories</h4>
                  <ol>
                      <li> <a href="{{ route('topics.create') }}"> Formations</a></li>
                      <li> <a href="{{ route('topics.create') }}"> Annonces</a></li>
                      <li> <a href="{{ route('topics.create') }}"> Planet Idées</a></li>
                      <li> <a href="{{ route('topics.create') }}"> Conseils et entreprise</a></li>

                  </ol>
                </div>
                </div>
            </div>

        <div class="col-md-8">
            <div class="panel panel-default">
            	<div class="panel-heading"><h5 class="les-titres">Discussions</h5></div>
            	<div class="panel-body">
                    <div class="list-group">
                        @foreach ($topics as $topic)
                        <div class="list-group-item">
                            <h4><a href="{{route('topics.show',$topic)}}">{{ $topic->title }}</a></h4>
                            <p>{{ $topic->content }}</p>
                                <div class="d_flex justify-content-between aline-items-center">
                                    <div><i class="fa fa-comments"></i><small class="color-red">  {{ $topic->comments->count() }}</small></div>
                                    <small class="col-md-8 ">Posté le {{ $topic->created_at->format('d/m/y à H:m')}}</small>
                                    Auteur: <span class="badge badge-primary">{{ $topic->user->nom }}</span>
                                </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $topics->links() }}
            	</div>
            </div>
        </div>
    </div>

	</div>
</div>
@endsection