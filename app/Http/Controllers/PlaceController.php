<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Place::query();

        // Filter logic
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('price')) {
            $query->where('price', 'like', '%' . $request->price . '%');
        }

        if ($request->filled('rating')) {
            $query->where('rating', 'like', '%' . $request->rating . '%');
        }

        if ($request->filled('status')) {
            if ($request->status === 'deleted') {
                $query->onlyTrashed();
            }
        }

        $places = $query->paginate(10);
        return view('places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'rating' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $fileId = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public'); // stored in storage/app/public/uploads
            $savedFile = \App\Models\File::create([
                'place_id' => null,
                'file_path' => 'storage/'.$path,
                'file_type' => 'image',
            ]);

    
            $fileId = $savedFile->id;
        }
    
        $place = Place::create([
            'name' => $request->name,
            'description' => $request->description,
            'file_id' => $fileId,
            'price' => $request->price,
            'rating' => $request->rating,
        ]);
    
        if ($fileId) {
            $savedFile->update(['place_id' => $place->id]);
        }
    
        return redirect()->route('places.index')->with('success', 'Place created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Inside PlaceController
    public function uploadImage(Request $request, Place $place)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('uploads');
        // $relativePath = str_replace('public/', 'storage/', $path);

        \App\Models\File::create([
            'place_id' => $place->id,
            'file_path' => $path,
            'file_type' => 'image',
        ]);

        return back()->with('success', 'Image uploaded successfully.');
    }

    public function edit(Place $place)
    {
        return view('places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'file_id' => 'nullable|exists:files,id',
            'price' => 'required|string',
            'rating' => 'nullable|string',
        ]);

        $place->update($request->all());

        return redirect()->route('places.index')->with('success', 'Place updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('places.index')->with('success', 'Place deleted successfully.');
    }
}
