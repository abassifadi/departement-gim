<?php

namespace App\Http\Controllers\AdminPPP;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminPPPController extends Controller
{
    public function welcomeAdminPPP(){
          return view('index_admin_ppp') ;
    }


}
