<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Galleries Management';
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'Create Gallery';
        $tags = Tag::all();
        return view('admin.galleries.create', compact('title', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {

        //add featured image upload logic here
        $slug = Str::slug($request->title, '-');
        //user_id
        $userId = Auth::id();
        //upload featured image if exists
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('uploads/gallery', 'public');
        }
        Gallery::create([
            'caption'=>$request->caption,
            'featured_image'=>$path,
            'user_id'=>$userId,
            'tag_id'=>$request->tag_id,
            'description'=>$request->caption
        ]);
        return redirect()->route('gallery.index')->with('success', 'Gallery created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
        $title = 'Edit Gallery';
        $tags = Tag::all();
        return view('admin.galleries.edit', compact('gallery', 'title', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $id)
    {
        //
        $gallery = Gallery::findOrFail($id);
        //user_id
        $request->merge(['user_id' => Auth::id()]);
        //add featured image upload logic here
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galleries'), $filename);
            $request->merge(['featured_image' => 'uploads/galleries/' . $filename]);
        }
        $gallery->update($request->validated());
        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $gallery = Gallery::findOrFail($id);
        //delete featured image if exists
        if ($gallery->featured_image && file_exists(public_path($gallery->featured_image))) {
            unlink(public_path($gallery->featured_image));
        }
        $gallery->delete();
        return redirect()->route('gallery.index')->with('danger', 'Gallery deleted successfully.');
    }
}
