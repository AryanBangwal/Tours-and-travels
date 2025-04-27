<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::with('place')->paginate(10);
        return view('files.index', compact('files'));
    }

    public function create()
    {
        $places = Place::all();
        return view('files.create', compact('places'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'place_id' => 'nullable|exists:places,id',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,pdf,docx,mp4',
            'file_type' => 'required|string',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            File::create([
                'place_id' => $request->place_id,
                'file_path' => $path,
                'file_type' => $request->file_type,
            ]);
        }

        return redirect()->route('files.index')->with('success', 'File uploaded.');
    }

    public function edit(File $file)
    {
        $places = Place::all();
        return view('files.edit', compact('file', 'places'));
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'place_id' => 'nullable|exists:places,id',
            'file_type' => 'required|string',
        ]);

        $data = [
            'place_id' => $request->place_id,
            'file_type' => $request->file_type,
        ];

        if ($request->hasFile('file')) {
            $request->validate(['file' => 'file|mimes:jpg,jpeg,png,gif,pdf,docx,mp4']);
            $path = $request->file('file')->store('uploads', 'public');
            $data['file_path'] = $path;
        }

        $file->update($data);

        return redirect()->route('files.index')->with('success', 'File updated.');
    }

    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('files.index')->with('success', 'File deleted.');
    }
}