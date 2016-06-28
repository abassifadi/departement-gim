<?php

namespace App\Http\Controllers\Auth;

use App\Models\Professeur as Professeur ;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;

class AuthAdminPPPController extends Controller
{
      use AuthenticatesAndRegistersUsers, ThrottlesLogins;
      /**
       * Create a new authentication controller instance.
       *
       * @return void
       */

       protected $username = 'nom';
       protected $guard = 'adminppp';
      public function __construct()
      {

          $this->middleware('adminPPPguest', ['except' => 'logout']);
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
              'nom' => 'required|max:255',
              'email' => 'required|email|max:255|unique:users',
              'password' => 'required|confirmed|min:6',
          ]);
      }

      public function getLogin()
     {
         return view('admin_ppp.login');
     }

     public function postLogin(Request $request)
  {
      $credentials = $this->getCredentials($request);
      //return $credentials;
      if (\Auth::guard('adminppp')->attempt($credentials, true)) {
          return redirect()->intended('/AdminPPP');
      }

      return redirect()->back()
          ->withInput($request->only('nom', 'remember'))
          ->withErrors([
              'nom' => 'User not found',
          ]);
  }

  public function logout() {
    \Auth::guard('adminppp')->logout();
    return redirect()->intended('/AdminPPP');
  }
  protected function create(array $data)
  {
        return AdminPPP::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }
}
