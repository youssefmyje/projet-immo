<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $annonces = Annonce::all();
        $users = User::all();
        return view('admin.index', compact('annonces', 'users'));
    }

    public function toggleAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Les droits administrateur ont été mis à jour.');
    }
}
