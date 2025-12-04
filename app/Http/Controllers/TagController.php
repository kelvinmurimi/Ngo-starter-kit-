<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

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
        //
        Tag::create($request->validated());
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
    public function edit(Tag $id)
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
        //
        $tag = Tag::findOrFail($id);
        $tag->update($request->validated());
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
