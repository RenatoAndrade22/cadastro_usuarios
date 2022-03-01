<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('welcome', ['users'=>$users]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('edit', ['user'=>$user]);
    }

    public function register()
    {
        return view('register');
    }

    public function store(NewUserRequest $request)
    {

        $imageName = $this->uploadImage($request);

        $user = new User();
        $user->image = $imageName;
        $user->name = $request->get('name');
        $user->birth_data = $request->get('birth_data');
        $user->saveOrFail();

        return back()
            ->with('success','Usuário cadastrado com sucesso!');
    }

    public function uploadImage($request)
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        return $imageName;
    }

    public function update(UpdateUserRequest $request, $id)
    {

        $user = User::find($id);

        if ($request->image)
            $user->image = $this->uploadImage($request);

        $user->name = $request->get('name');
        $user->birth_data = $request->get('birth_data');
        $user->saveOrFail();

        return back()
            ->with('success','Usuário atualizado com sucesso!');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()
            ->with('success-deleted','Usuário excluído!');
    }
}
