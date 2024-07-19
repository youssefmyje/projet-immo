<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class PageController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function listings()
    {
        $annonces = Annonce::all(); // Assurez-vous d'importer le modèle Annonce si nécessaire
        return view('pages.listings', compact('annonces'));
    }
}
