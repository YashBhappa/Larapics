<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::published()->latest()->paginate(10);
        // $images = Image::latest()->paginate(10);
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $image = Image::create($request->getData());

        return to_route('images.index', $image)->with('message', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {

        return view('images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageRequest $request, Image $image)
    {
        // dd($request->getData());
        $image->update($request->getData());

        return to_route('images.index', $image)->with('message', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return to_route('images.index')->with('message', 'Image deleted successfully');
    }
}
