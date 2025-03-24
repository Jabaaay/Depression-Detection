<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;

class ResponseController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sadness' => 'required|integer|min:0|max:3',
        ]);

        // Convert sadness level to description
        $descriptions = [
            0 => "I do not feel sad.",
            1 => "I feel sad much of the time.",
            2 => "I am sad all the time.",
            3 => "I am so sad or unhappy that I can't stand it."
        ];

        // Determine result
        $score = $validatedData['sadness'];
        $result = ($score <= 1) ? "Normal" : "Not Normal"; // Store result in database

        // Save to database
        Response::create([
            'sadness' => $score,
            'description' => $descriptions[$score],
            'result' => $result, // Store result
        ]);

        return redirect()->back()->with('result', "Your response is: $result");
    }
}


