<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        return view('test.index'); // Make sure this file exists
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('test.create'); // Optional, for manual form entry
    }

    public function start()
    {
        return view('test.start'); // Optional, for manual form entry
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'age' => 'required|integer',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|unique:tests,email',
            'accepted_terms' => 'required|boolean',
        ]);

        Test::create([
            'full_name' => $request->full_name,
            'college' => $request->college,
            'course' => $request->course,
            'age' => $request->age,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'accepted_terms' => $request->accepted_terms,
            'status' => 'On Going' // Once the form is submitted, the test is ongoing
        ]);

        return redirect()->route('test.start')->with('success', 'Form submitted successfully!');
    }

    // Display the specified resource
    public function show($id)
    {
        $test = Test::findOrFail($id);
        return view('test.show', compact('test'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('test.edit', compact('test'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'age' => 'required|integer',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|unique:tests,email,' . $id,
            'accepted_terms' => 'required|boolean',
        ]);

        $test = Test::findOrFail($id);
        $test->update($request->all());

        return redirect()->route('test.index')->with('success', 'Test updated successfully!');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('test.index')->with('success', 'Test deleted successfully!');
    }
}

