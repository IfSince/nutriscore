<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller {
    public function get(User $user): Response {
        return response($user);
    }
}
