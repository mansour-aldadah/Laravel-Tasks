<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $password = Hash::make($_POST['password']); // Hash the password
        // DB::table('users')->insert([
        //     'name' => $name,
        //     'email' => $email,
        //     'password' => $password,
        // ]);

        $validated = $request->validate([
            'name' => 'required|max:15|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/users');
    }

    public function edit($id)
    {
        // $user = DB::table('users')->where('id', $id)->first();
        $user = User::findOrFail($id);

        // $users = DB::table('users')->get();
        $users = User::all();

        return view('users', compact('user', 'users'));
    }

    public function update(Request $request)
    {
        // $id = $_POST['id'];
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        $password = $request->password ? Hash::make($request->password) : null; // Update password only if provided
        // $updateData = [
        //     'name' => $name,
        //     'email' => $email,
        // ];

        // if ($password) {
        //     $updateData['password'] = $password;
        // }

        // DB::table('users')->where('id', $id)->update($updateData);

        $validated = $request->validate([
            'name' => 'required|max:15|min:3',
            'email' => 'required|email',
        ]);

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($password) {
            $user->password = $password;
        }
        $user->save();

        return redirect('/users');
    }

    public function destroy($id)
    {
        // DB::table('users')->where('id', $id)->delete();

        //First Way
        /*
            $user = User::findOrFail($id);
            $user->delete();
        */
        //Second Way
        User::destroy($id);
        return redirect('/users');
    }
}
