<?php


namespace App\Services\Common;

use App\Http\Requests\Common\User\UpdateUserRequest;
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
        return User::findOrFail($id);
    }

    public function update(EditUserRequest $request)
    {
        /*if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }*/

        $user = User::findOrFail($request->id);
        $user->update($request->validated());

        $userRole = $request->input('role');
        if ($userRole !== null) {
            $user->roles()->detach();
            $user->roles()->attach($userRole);
        }

        //dump($user);
        //dd('update');

        return $user->first();
    }

    public function all()
    {
        return User::paginate(10);
    }
}
