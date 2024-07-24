<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggle($id)
    {
        $user = auth()->user();
        $favorite = Favorite::where('user_id', $user->id)->where('annonce_id', $id)->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'annonce_id' => $id,
            ]);
        }

        return redirect()->back();
    }

    public function index()
    {
        $user = auth()->user();
        $favorites = Favorite::where('user_id', $user->id)->with('annonce')->get();

        return view('favorites.index', compact('favorites'));
    }
}
