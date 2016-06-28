<?php

namespace App\Http\Controllers\Auth;

use App\Models\Professeur as Professeur ;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;
class AuthProfesseurController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $loginPath = '/professeur/login';
    protected $username = 'login';
    protected $redirectAfterLogout = '/professeur';
    protected $redirectPath = '/professeur';
    protected $redirectTo = '/professeur';
    protected $guard = 'professeur';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('profguest', ['except' => 'logout']);
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
            'login' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }



    public function getLogin()
   {
       return view('professeur.login');
   }

   public function postLogin(Request $request)
{
    $credentials = $this->getCredentials($request);
    if (\Auth::guard('professeur')->attempt($credentials, true)) {
        return redirect()->intended('/professeur');
    }

    return redirect()->back()
        ->withInput($request->only('login', 'remember'))
        ->withErrors([
            'login' => 'User not found',
        ]);
}



public function logout() {
  \Auth::guard('professeur')->logout();
  return redirect()->intended('/professeur');
}



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Professeur::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
