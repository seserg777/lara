<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\User\UpdateUserRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(Request $request)
    {
        //dump($request->route()->getName());
    }

    public function index()
    {
        dd('index');
    }

    public function show()
    {
        dd('show');
    }

    public function create(Request $request)
    {
        //dd('create');
        return view('role.edit');
    }

    public function store(Request $request)
    {
        //dd('store');
        $validateFields = $request->validate([
            'name' => 'required'
        ]);

        if(Role::where('name', $validateFields['name'])->exists()){
            return redirect(route('user.role.create'))->withErrors([
                'name' => 'Role already exists'
            ]);
        }

        $role = Role::create($validateFields);
        if($role){
            return redirect(route('user.role.index', ['id' => $role->id]));
        } else {
            return redirect(route('user.role.create'))->withErrors([
                'formError' => 'Error saving user data'
            ]);
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        dump($request, $id);
        dd('update!');
    }

    public function edit($id)
    {
        dd('edit');
        $request = request();
        if($request->method() == Role::GET){
            $data = [
                'role'         => new Role()
            ];
            return view('role.edit')->with($data);
        } else {
            dd('edit');
        }
        dd($request->method());
    }

    public function delete($id)
    {
        dd('delete');
    }
}
