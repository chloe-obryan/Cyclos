<?php

namespace App\Http\Controllers;

use App\User;
use App\Ville;
use App\Diplome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diplome= Diplome::all();
        $villes= Ville::all();
        $users=Auth::User();
        $users= User::latest()->paginate(5);
        return view('acteurs.profil',compact('users','diplome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
 /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit(User $user, Ville $villes)
  {

    return view('acteurs.edit', compact('user','villes'));
  }

  public function update(Request $request, User $user)
    {
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->genre=$request->genre;
        $user->date_nais=$request->date_nais;
        $user->num_tel=$request->num_tel;
        $user->villes_id=$request->villes_id;
        $user->description=$request->description;
        $user->photo=$request->photo->store('storage/public/uploads','public');
        $user->save();
        return redirect()->route('home');
    }

}
