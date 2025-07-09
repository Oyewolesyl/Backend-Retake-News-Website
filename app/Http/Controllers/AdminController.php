<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    private function checkAdmin()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'Access denied');
        }
    }

    public function dashboard()
    {
        $this->checkAdmin();
        return view('admin.dashboard');
    }

    public function articles()
    {
        $this->checkAdmin();
        $articles = Article::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.articles', compact('articles'));
    }

    public function createArticle()
    {
        $this->checkAdmin();
        return view('admin.create-article');
    }

    public function storeArticle(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published' => $request->has('published'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.articles')->with('success', 'Article created successfully!');
    }

    public function editArticle($id)
    {
        $this->checkAdmin();
        $article = Article::findOrFail($id);
        return view('admin.edit-article', compact('article'));
    }

    public function updateArticle(Request $request, $id)
    {
        $this->checkAdmin();
        $article = Article::findOrFail($id);
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'published' => $request->has('published'),
        ]);

        return redirect()->route('admin.articles')->with('success', 'Article updated successfully!');
    }

    public function deleteArticle($id)
    {
        $this->checkAdmin();
        $article = Article::findOrFail($id);
        
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully!');
    }

    public function users()
    {
        $this->checkAdmin();
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $this->checkAdmin();
        $user = User::where('role', 'user')->findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }

    public function admins()
    {
        $this->checkAdmin();
        $admins = User::where('role', 'admin')->get();
        return view('admin.admins', compact('admins'));
    }
}