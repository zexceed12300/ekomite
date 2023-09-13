<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.bendahara.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.bendahara.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|unique:users',
            'email' => 'required|string',
            'password' => 'required|string',
            'roles' => 'required|string',
            'permissions' => 'required|array',
        ]);
        
        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'email_verified_at' => now(),
            'password' => bcrypt($validateData['password']),
        ]);
        $user->syncRoles($validateData['roles']);
        $user->syncPermissions($validateData['permissions']);

        return redirect()->route('bendahara.index')->with('success', "User {$validateData['name']} berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();
        $permissions = Permission::all();

        return view('pages.bendahara.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
            'roles' => 'required|string',
            'permissions' => 'required|array',
        ]);

        $user->update([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => isset($validateData['password']) ? Hash::make($validateData['password']) : $user->password,
        ]);
        $user->syncRoles($validateData['roles']);
        $user->syncPermissions($validateData['permissions']);

        return redirect()->route('bendahara.index')->with('warning', "User {$validateData['name']} berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->id == $id) {
            return redirect()->route('bendahara.index')->with('error', "Tidak dapat menghapus akun sendiri");
        }
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('bendahara.index')->with('error', "User {$user->name} berhasil dihapus");
    }
}
