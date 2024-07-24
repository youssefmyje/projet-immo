<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return redirect()->back()->with('success', 'Votre témoignage a été ajouté avec succès.');
    }
}
