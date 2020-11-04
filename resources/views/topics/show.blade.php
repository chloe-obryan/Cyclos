@extends('app')

@section('extra-js')
    <script>
        function toggleReplyComment(id){
            let element=document.getElementById('replyComment-' + id);
            element.classList.toggle('d-none');
        }
    </script>
@endsection
@section('content')
<div style="  margin-bottom: 20px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading " >
                    <h5 class="les-titres">Participer activement aux discussions</h5>
                </div>
                <div class="panel-body">
                    <h5 class="panel-title">{{ $topic->title}}</h5>
                    <p>{{ $topic->content }}</p>
                    <div >
                        <div > 
                            <small class="col-md-8 ">posté le <span class="badge badge-dark"> {{ $topic->created_at->format('d/m/y à H:m')}}</span></small>
                            par: <span class="badge badge-primary">{{ $topic->user->nom }}</span>
                        </div>

                        @can('update', $topic)
                        <div class="col-md-8 col-md-offset-2 ">
                            <a href="{{route('topics.edit', $topic) }}" class="btn btn-warning">Editer le topic</a>
                        </div>
                        @endcan

                        @can('delete', $topic)
                        <form action="{{ route('topics.destroy',$topic)}}" method="POST"> 
                            @csrf
                            @method('DElETE')
                            <button type="submit" class="btn btn-danger">suprimer</button>
                        </form>
                        @endcan 
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- commentaire des topics --}}
    <h4> <i> Commentaires</i></h4>
    @forelse ($topic->comments as $comment)
        <div class="panel topic-commentaire">
            <div class="panel-body ">
                {{ $comment->content}}
                <div class="d_flex justify-content-between aline-items-center">
                    <small class="col-md-8 ">Posté le {{ $comment->created_at->format('d/m/y')}}</small>
                    Auteur: <span class="badge badge-dark">{{ $comment->user->nom }}</span>
                </div>
            </div>
        </div>

{{-- commentaires des commentaires --}}
        @foreach ($comment->comments as $replyCommenty)
            <div class="panel commentaire-commentaire">
                <div class="panel-body ">
                    {{ $replyCommenty->content}}
                    <div class="d_flex justify-content-between aline-items-center">
                        <small class="col-md-8 ">Posté le {{ $replyCommenty->created_at->format('d/m/y')}}</small>
                        Par: <span class="badge badge-dark">{{ $replyCommenty->user->nom }}</span>
                    </div>
                </div>
            </div>
        @endforeach

{{-- formulaire de reponse aux commentaires --}}
        @auth
            <button  class="btn btn-info  reponse " onclick="toggleReplyComment({{$comment->id}})"  >Repondre</button>
            <form action="{{route('comments.storeReply', $comment)}}"  class="d-none"  id="replyComment-{{$comment->id}}"  method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="replyComment" class="form-control @error('replyComment') is-invalid @enderror" id="replyComment" rows="5"></textarea>

                    @error('replyComment')
                        <div role="error" class="invalid-feedback">{{ $errors->first('replyComment')}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning">repondre à ce commentaire</button>
            </form>           
        @endauth
    @empty
        <div class="alert alert-info">aucun commentaire pour cette discussion</div>
    @endforelse

{{-- formulaire de reponse aux topics --}}
@auth
    <div>
        <form action="{{ route('comments.store',$topic) }}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="content">Entrer votre commentaire</label>
                <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="content" rows="5"></textarea>
                @error('content') 
                    <div class="invalid-feedback bg-danger ">{{ $errors->first('content')}}</div>
                @enderror 
            </div>
            <button type="submit" class=" btn btn-primary">Soumettre mon commentaire</button>
        </form>
    </div>
@endauth
</div>

@endsection

