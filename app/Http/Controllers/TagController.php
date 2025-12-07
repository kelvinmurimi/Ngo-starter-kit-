<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Tags Management';
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'Create Tag';
        return view('admin.tags.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();
        //get slug from name
        $slug = Str::slug($request->name);

        $data['slug'] = $slug;

        Tag::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            //  'user_id' => Auth::id(),
        ]);
        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tag = Tag::findOrFail($id);
        $title = 'Edit Tag';
        return view('admin.tags.edit', compact('tag', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request,  $id)
    {
        //slug from name
        $slug = Str::slug($request->name);
        $data = $request->validated();

        $data['slug'] = $slug;

        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
            // 'user_id' => Auth::id(),
        ]);
        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('danger', 'Tag deleted successfully.');
    }
}
