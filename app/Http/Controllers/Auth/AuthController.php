<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends LoginController
{
    protected function redirectTo()
    {
        return route('cart');
    }

    public function username()
    {
        return 'name';
    }

}
