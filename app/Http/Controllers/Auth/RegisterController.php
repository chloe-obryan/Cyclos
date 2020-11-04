<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Diplome;
use App\Ville;
use App\Secteur;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $diplomes=Diplome::All();
        $villes =Ville::All();
        $secteurs =Secteur::All();
        return view('auth.register',compact('diplomes','villes','secteurs'));
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $diplome = Diplome::get();
        $user = User::create([
            'diplomes_id' => $data['diplomes_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'genre' => $data['genre'],
            'villes_id' => $data['villes_id'],
            'secteurs_id' => $data['secteurs_id'],
            'date_nais' => $data['date_nais'],  
            'num_tel' => $data['num_tel'],
            'fonction' => $data['fonction'],
            'lienUtil' => $data['lienUtil'],
            'description' => $data['description'], 
            'photo'=>$data['photo']->store('storage/public/uploads','public'),
        ]);
   
  $role = Role::select('id')->where('name','utilisateur')->first();
  $user->roles()->attach($role);
  return $user;
    }

/**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */

public function show($id){
    $user = User::findOrFail($id);


}

}