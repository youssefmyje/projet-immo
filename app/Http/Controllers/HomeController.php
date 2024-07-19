<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les annonces de la base de données
        $annonces = Annonce::all();

        // Passer les annonces à la vue
        return view('welcome', compact('annonces'));
    }
}
