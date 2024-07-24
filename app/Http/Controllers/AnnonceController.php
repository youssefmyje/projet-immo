<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AnnonceController extends Controller
{
    public function create()
    {
        return view('annonces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'localisation' => 'required|string|max:255',
            'surface' => 'required|integer',
            'nombre_chambres' => 'required|integer',
            'nombre_salles_de_bain' => 'required|integer',
            'type' => 'required|string|max:255',
            'photos' => 'nullable|array',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $annonce = new Annonce();
        $annonce->titre = $request->titre;
        $annonce->description = $request->description;
        $annonce->prix = $request->prix;
        $annonce->localisation = $request->localisation;
        $annonce->surface = $request->surface;
        $annonce->nombre_chambres = $request->nombre_chambres;
        $annonce->nombre_salles_de_bain = $request->nombre_salles_de_bain;
        $annonce->type = $request->type;
        $annonce->user_id = Auth::id();
        $annonce->save();

        $data = [];
        if ($request->hasfile('photos')) {
            foreach ($request->file('photos') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('photos'), $name);
                $data[] = $name;
            }
            $annonce->photos = json_encode($data);
            $annonce->save();
        }

        return redirect()->route('annonces.create')->with('success', 'Annonce ajoutée avec succès.');
    }

    public function index()
    {
        $annonces = Annonce::all();
        return view('annonces.index', compact('annonces'));
    }

    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('annonces.show', compact('annonce'));
    }

    public function edit($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('annonces.edit', compact('annonce'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'localisation' => 'required|string|max:255',
            'surface' => 'required|integer',
            'nombre_chambres' => 'required|integer',
            'nombre_salles_de_bain' => 'required|integer',
            'type' => 'required|string|max:255',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $annonce = Annonce::findOrFail($id);
        $annonce->titre = $request->titre;
        $annonce->description = $request->description;
        $annonce->prix = $request->prix;
        $annonce->localisation = $request->localisation;
        $annonce->surface = $request->surface;
        $annonce->nombre_chambres = $request->nombre_chambres;
        $annonce->nombre_salles_de_bain = $request->nombre_salles_de_bain;
        $annonce->type = $request->type;

        $data = [];
        if ($request->hasfile('photos')) {
            foreach ($request->file('photos') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('photos'), $name);
                $data[] = $name;
            }
            $annonce->photos = json_encode($data);
        }

        $annonce->save();

        return redirect()->route('admin.index')->with('success', 'Annonce mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();

        return redirect()->route('admin.index')->with('success', 'Annonce supprimée avec succès.');
    }

    public function search(Request $request)
    {
        Log::info('Request parameters:', $request->all());

        $query = Annonce::query();

        if ($request->filled('transaction')) {
            Log::info('Filtering by transaction:', [$request->transaction]);
            $query->where('type', $request->transaction);
        }

        if ($request->filled('location')) {
            Log::info('Filtering by location:', [$request->location]);
            $query->whereRaw('LOWER(localisation) LIKE ?', ['%' . strtolower($request->location) . '%']);
        }

        if ($request->filled('budget_min')) {
            Log::info('Filtering by budget_min:', [$request->budget_min]);
            $query->where('prix', '>=', $request->budget_min);
        }

        if ($request->filled('budget_max')) {
            Log::info('Filtering by budget_max:', [$request->budget_max]);
            $query->where('prix', '<=', $request->budget_max);
        }

        $annonces = $query->get();

        Log::info('Filtered annonces:', $annonces->toArray());

        return view('annonces.index', compact('annonces'));
    }
}
