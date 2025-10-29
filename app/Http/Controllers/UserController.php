<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    public function indexUser(){
        $user = User::all();
        return view('admin.dataUser.indexDU', compact('user'));
    }

    public function createUser(Request $request){
        $request->validate([
        'name' => 'Required',
        'email' => 'Required|email|unique:users',
        'phone' => 'Required|unique:users',
        'nik' => 'Required|unique:users',
        'gender' => 'Required',
        'role' => 'Required',
        'password' => 'Required',
        'image' => 'nullable|image|mimes:jpeg,png,gif,svg|max:2048'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/userimages', $filename);

        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'nik' => $request->nik,
        'address' => $request->address,
        'gender' => $request->gender,
        'role' => $request->role,
        'password' => bcrypt($request->password),
        'image' => $filename,
    ]);

    return redirect()->route('user.admin')->with('success', "Data berhasil dihapus!");
    }
}
