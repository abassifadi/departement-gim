<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/v1',
        'user/profile/update',
        'user/ppp/choix' ,
        'user/binome/choix' ,
        '/professeur/add_ppp',
        'professeur/profile/update',
        'professeur/profile/update'
    ];



}
