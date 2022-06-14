<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Redirect;

class NotAuthorizedException extends Exception
{
    protected $route;

    public function redirectTo($route) {
        $this->route = $route;
    
        abort(Redirect::to($route));
    }
    
    public function route() {
        return $this->route;
    }
}