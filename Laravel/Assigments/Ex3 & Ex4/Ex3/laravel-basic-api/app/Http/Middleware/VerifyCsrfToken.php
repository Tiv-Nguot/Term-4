<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/customer/create',
        '/customer/update/*', // Assuming you are using wildcard for IDs in update route
        '/customer/delete/*', // Assuming you are using wildcard for IDs in delete route
    ];
    
}
