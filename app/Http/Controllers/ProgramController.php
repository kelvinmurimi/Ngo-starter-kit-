<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title='Programs Management';
        $programs=Program::all();
        return view('admin.programmes.index',compact('programs','title'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title='Create Program';

        $tags= Tag::latest()->get();

        return view('admin.programmes.create',compact('title','tags'));    
    }
//0768453697
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        //
          // dd($request->all());
        //generate slug from title
        $slug = Str::slug($request->title, '-');
        //user_id
        $userId = Auth::id();
        //upload featured image if exists
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('uploads/programs', 'public');
        }
        Program::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt, 
            'contents' => $request->contents,
            'slug' => $slug,
            'featured_image' => $path,
            'user_id' => $userId,
            'tag_id' => $request->tag_id,
            'status' => $request->status
        ]);
        return redirect()->route('programs.index')->with('success', 'Program created successfully.');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $program=Program::findOrFail($id);
        $title='Edit Program';  
            $tags= Tag::latest()->get();
        return view('admin.programmes.edit',compact('program','title','tags'));     

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, $id)
    {
        //
        $program = Program::findOrFail($id);
        //user_id
        $slug = Str::slug($request->title, '-');
        //user_id
        $userId = Auth::id();
        //upload featured image if exists
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('uploads/programs', 'public');
        }
         $program->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt, 
            'contents' => $request->contents,
            'slug' => $slug,
            'featured_image' => $path,
            'user_id' => $userId,
            'tag_id' => $request->tag_id,
            'status' => $request->status
        ]);
        return redirect()->route('programs.index')->with('success', 'Program created successfully.');    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $program=Program::findOrFail($id);
        //dd($program);
        //delete featured image if exists
        $current_cover_image=$program->featured_image;
        //dd($current_cover_image);
        if(File::exists($current_cover_image))
        {
           Storage::disk('public')->delete('path-of-file');
        }
        $program->delete();
        return redirect()->route('programs.index')->with('danger', 'Program deleted successfully.');

    }
}
