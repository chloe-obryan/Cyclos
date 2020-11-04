<?php

namespace App\Http\Controllers;
use App\Pays;
use App\User;
use App\Ville;
use App\Secteur;
use App\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $villes =Ville::All();
        $secteurs =Secteur::All();
        $pays =Pays::All();
      
        return view('entreprise.forme',compact('villes','secteurs','pays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        
        Entreprise::create([
          
            'users_id' => Auth::id(),
            'villes_id' => $data['villes_id'],
            'secteurs_id' => $data['secteurs_id'],
            'pays_id' => $data['pays_id'],
            'nom' => $data['nom'],
            'adress' => $data['adress'],
            'codePostal' => $data['codePostal'],
            'SiteInternet' => $data['siteInternet'],
            'logo' => $data['logo']->store('storage/public/uploads','public'),
            
        ]);
        return redirect(route('home'))->with('message', 'Votre annonce a bien été publié');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
