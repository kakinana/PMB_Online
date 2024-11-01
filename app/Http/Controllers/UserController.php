<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $maba = User::create([
            'name' => 'maba',
            'email' => 'maba@maba.com',
            'password' => bcrypt('12345678'),
        ]);
        $maba->assignRole('maba');
    }

    public function show()
    {
        $users = User::where('name', '!=', 'admin')->get();; 
        //dd($users);
        return view('dataUser', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign "maba" Role
        $user->assignRole('maba');

        return redirect()->route('lihat-user')->with('success', 'User registered successfully with "maba" role.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('lihat-user')->with('success', 'User registered successfully with "maba" role.');
    }
}
