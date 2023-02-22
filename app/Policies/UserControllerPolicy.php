<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserControllerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        dump('constr UserControllerPolicy');
    }

    public function viewUserGroup(?User $user)
    {
        //dd($user);
        return true;
    }

    public function index(?User $user)
    {
        dump('index UserControllerPolicy');
    }
}
