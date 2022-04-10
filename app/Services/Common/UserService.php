<?php


namespace App\Services\Common;

use Illuminate\Http\Request;
use App\Http\Requests\Common\UpdateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;

class UserService
{
    private array $available_sorts = [
        'name' => 'name',
        'email' => 'email',
        'status' => 'status',
    ];
    private string $base_sort_key = 'name';

    public function list($request)
    {

    }

    public function detail($id)
    {
        return User::with('roles')->findOrFail($id);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        $userRole = $request->input('role');
        if ($userRole !== null) {
            $user->roles()->detach();
            $user->roles()->attach($userRole);
        }
    }

    public function all()
    {
        return User::with('roles')->paginate(10);
    }
}
