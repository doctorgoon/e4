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
        '/administration/clients/rechercher-client/*',
        '/administration/gsk/rechercher-medecin',
        '/administration/asalee/rechercher-cabinet',
        '/administration/formules/licences-pneumopharma/rechercher',
        '/administration/formules/licences-pneumopharma/cle-activation',
        '/administration/clients/rechercher-client/customer-service',
    ];
}
