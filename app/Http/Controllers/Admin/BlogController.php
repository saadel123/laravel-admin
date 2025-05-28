<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|array',
            'content' => 'required|array',
        ]);

        $data['slug'] = Str::slug($data['title']['en']); // or use fr/ar if preferred

        Blog::create($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Article ajouté avec succès.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|array',
            'content' => 'required|array',
        ]);

        $data['slug'] = Str::slug($data['title']['en']);

        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Article modifié avec succès.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('error', 'Article supprimé avec succès.');
    }
}
