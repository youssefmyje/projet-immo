<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
            'name' => 'required|string|max:50',
        ]);

        $testimonial = Testimonial::create([
            'comment' => $request->comment,
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'testimonial' => $testimonial
        ]);
    }
}
