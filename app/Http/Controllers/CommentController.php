<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Comment;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewCommentPosted;

class CommentController extends Controller
{
   public function __contruct(){
       $this->middleware('auth');
   }

   public function store(Topic $topic){
    
            request()->validate([
        'content'=>'required|min:5'
        ]);
        $comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;
        $topic->comments()->save($comment);

        //notification
        if(Auth::User()->id != $topic->user->id)
        {
            Notification::create([
                'contenu'=>Auth::User()->prenom.' a répondu à votre Discussion',
                'user_id'=>$topic->user->id,
                'url' => route('topics.show',$topic->id),
                'vu' => 0
            ]);
        }


        return redirect()->route('topics.show',$topic);

    }

    public function storeCommentReply(Comment $comment){

          request()->validate([
              'replyComment'=>'required|min:3'
          ]);

        $commentReply= new Comment;
          $commentReply->content = request('replyComment');
          $commentReply->user_id = auth()->user()->id;

          $comment->comments()->save($commentReply);

          $commentaires=$topic->comments()->lists('user_id');
    $commentateurs=array_unique($commentaires);

    foreach($commentateurs as $commentateur)
    {
        if((Auth::User()->id != $commentateur)and($commentateur != $topic->topic->id))
        {
            Notification::create([
                'contenu'=>Auth::User()->prenom.' a répondu à votre commentaire',
                'user_id'=>$commentateur,
                'url' => route('topics.show',$topic->id),
                'vu' => 0
            ]);
        }
    }
          return redirect()->back();

    }
}
