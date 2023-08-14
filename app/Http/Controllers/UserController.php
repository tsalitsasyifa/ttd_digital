<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    public function index()
    {
        $user = User::all();
        return view('user.index',["users"=> $user]);
    }

    public function create()
    {
        $division = Division::all();
        return view('user.create',["divisions"=> $division]);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'division_id' => $request->division_id,
            'role' => $request->role,
        ]);
        return redirect('user');
    }

    public function edit($user_id)
    {
        $division = Division::all();
        $user = User::find($user_id);
        return view('user.update', ["users" => $user, "divisions"=> $division]);
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'division_id' => $request->division_id,
            'role' => $request->role,
        ]);
        return redirect('user');
    }

    public function destroy($user_id)
    {
        User::destroy($user_id);
        return redirect('user');
    }
}
