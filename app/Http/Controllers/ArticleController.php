<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Articles Management';
        $articles = Article::all();
        return view('admin.articles.index', compact('articles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $title = 'Create Article';
        return view('admin.articles.create', compact('title', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        // dd($request->all());
        //generate slug from title
        $slug = Str::slug($request->title, '-');
        //user_id
        $userId = Auth::id();
        //upload featured image if exists
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('uploads/articles', 'public');
        }
        //dd($featured_image);
        Article::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => $slug,
            'featured_image' => $path,
            'user_id' => $userId,
            'tag_id' => $request->tag_id,
        ]);
        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $id)
    {
        //
        $article = Article::findOrFail($id);
        $title = 'Edit Article';
        return view('admin.articles.edit', compact('article', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request,  $id)
    {
        //
        $article = Article::findOrFail($id);
        //user_id
        $request->merge(['user_id' => Auth::id()]);
        //upload featured image if exists deleting old one
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/articles'), $filename);
            $request->merge(['featured_image' => 'uploads/articles/' . $filename]);
        }
        //delete old featured image if exists
        if ($article->featured_image && file_exists(public_path($article->featured_image))) {
            unlink(public_path($article->featured_image));
        }
        $article->update($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $article = Article::findOrFail($id);
        //delete featured image if exists
        if ($article->featured_image && file_exists(public_path($article->featured_image))) {
            unlink(public_path($article->featured_image));
        }
        $article->delete();
        return redirect()->route('articles.index')->with('danger', 'Article deleted successfully.');
    }
}
