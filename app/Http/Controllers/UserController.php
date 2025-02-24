<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = Hash::make($_POST['password']); // Hash the password

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        return redirect('/users');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'] ? Hash::make($_POST['password']) : null; // Update password only if provided

        $updateData = [
            'name' => $name,
            'email' => $email,
        ];

        if ($password) {
            $updateData['password'] = $password;
        }

        DB::table('users')->where('id', $id)->update($updateData);
        return redirect('/users');
    }
}
