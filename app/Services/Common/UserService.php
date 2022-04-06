<?php


namespace App\Services\Common;

use App\Http\Requests\Common\User\UpdateUserRequest;
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

    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->validated());
    }

    public function all()
    {
        return User::paginate(10);
    }
}
