<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminPPP extends Authenticatable
{
    protected $table = "admin_ppps" ;
    protected $guard = "adminppp";
}
