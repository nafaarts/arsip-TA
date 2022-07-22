<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::filter()->latest()->paginate(10)->withQueryString();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'NIM' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'jurusan' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'NIM' => $request->NIM,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin ?? 0,
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'NIM' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'jurusan' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        $user->update([
            'name' => $request->name,
            'NIM' => $request->NIM,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'password' => $request->has('password') ? bcrypt($request->password) : $user->password,
            'is_admin' => $request->is_admin ?? 0,
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
