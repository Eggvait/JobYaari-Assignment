<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // --- FRONTEND METHODS ---
    public function index()
    {
        $blogs = Blog::orderBy('date', 'desc')->get();
        return view('frontend.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.show', compact('blog'));
    }

    public function filter(Request $request)
    {
    $query = Blog::query();

    if ($request->filled('category')) {
        // Using trim() removes hidden spaces, and LIKE prevents strict typo failures
        $category = trim($request->category);
        $query->where('category', 'LIKE', '%' . $category . '%');
    }
    
    if ($request->filled('date')) {
        $query->whereDate('date', $request->date);
    }

    $blogs = $query->orderBy('date', 'desc')->get();
    return view('frontend.partials.blog_list', compact('blogs'))->render();
    }

    // --- ADMIN METHODS ---
    public function adminIndex()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('admin.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'required',
            'category' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);
        return redirect()->route('admin.index')->with('success', 'Blog added successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'required',
            'category' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);
        return redirect()->route('admin.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return redirect()->route('admin.index')->with('success', 'Blog deleted successfully!');
    }
}