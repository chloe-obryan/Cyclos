<?php namespace App\Http\Controllers;


use App\Http\Requests\SearchAnnonceRequest;
use App\Http\Requests\StoreAnnonceRequest;
use App\Annonce;
use App\Notification;
use App\User;
use App\Diplome;
use App\Ville;
use App\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnnonceController extends Controller
{

    // public function __construct(){
    //     parent::__construct();
    // }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::User();
        $villes =Ville::All();
        $secteurs =Secteur::All();

        $historique_annonces = $user->promoteurAnnonce()->with('inscrits','promoteur')
            ->where('date_depart','<',date("Y-m-d H:i:s"))
            ->orderBy('date_depart','desc')->get();

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $villes =Ville::All();
        $secteurs =Secteur::All();
        return view('annonce.publier',compact('villes','secteurs'));
    }

    
    public function store(Request $data)
    {
       
        Annonce::create([
          
            'users_id' => Auth::id(),
            'villes_id' => $data['villes_id'],
            'secteurs_id' => $data['secteurs_id'],
            'titre' => $data['titre'],
            'promoteur' => $data['promoteur'],
            'type' => $data['type'],
            'date' => $data['date'],
            'adress1' => $data['adress1'],
            'num_tel' => $data['num_tel'],
            'description' => $data['description'],
            'exigence' => $data['exigence']
        ]);
        return redirect(route('home'))->with('message', 'Votre annonce a bien été publié');
    }

    /**
     * Search the specified resource.
     * @param SearchannonceRequest $request
     * @return Response
     */
    public function search(SearchAnnonceRequest $request)
    {
        $data = $request->all();
        $type_s = $data['type'];
        $ville = $data['ville'];

        $diplome = Diplome::firstOrNew([
            'intitule' => $data['intitule'],
            
        ]);
      
        $annonce = $this->searchResults($diplome,$ville_a,$type);

        return view('annonce.resultatsDeRecherche')->with(compact('annonces','diplomes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $annonce=Annonce::with('commentaires','postulant')->findOrFail($id);
        $user = $annonce->promoteur;
        $auth = Auth::User();

        $acces_tel =false;

        if($auth){

        $user->inscriptions->each(function($inscription) use (&$acces_tel){
            
            if($inscription->inscrits->contains(Auth::User())){
                $acces_tel=true;
            }
            
            if($inscription->promoteur->id == Auth::User()->id){
                $acces_tel=true;
            }
        });
      
        $user->promoteurAnnonce->each(function($annonce) use (&$acces_tel){
            if($annonce->inscrits->contains(Auth::User())){
                $acces_tel=true;
            }
        });
    }

        return view('annonce.details')->with(compact('annonce','auth','acces_tel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $annonce = Annonce::findOrFail($request->only('annonce_id'))->first();

        if ($annonce->promoteur->id == Auth::User()->id) {
            $annonce->inscrits->each(function($inscrit) use (&$annonce)
            {
                Notification::create([
                    'contenu' => 'Attention, ' . Auth::User()->prenom . ' a supprimé '.$annonce->titre.' '.$annonce->titre,
                    'user_id' => $inscrit->id,
                    'url' => route('user/show', Auth::User()->id),
                    'vu' => 0
                ]);
            });
            
            $annonce->delete();
            return redirect()->back()->with('message', 'Votre annonce est supprimé');
        } else {
            abort(404);
        }
    }

    public function register(){
        $annonce=Annonce::findOrFail(Input::get('annonce_id'));
        $user = Auth::User();

        if($annonce->promoteur->id == $user->id) {
            return redirect()->back()->with('erreur','Vous êtes le promoteur');
        }elseif(Carbon::createFromTimestamp(strtotime($annonce->timetamps))->isPast()){
            return redirect()->back()->with('erreur','Cete annonce est passé');
        }elseif( $annonce->inscrits()->find($user->id)){
            return redirect()->back()->with('erreur','Vous êtes déjà inscrit');
        }
    }


 
   
}