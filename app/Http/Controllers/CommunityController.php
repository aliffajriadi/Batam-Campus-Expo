<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['user', 'comments.user', 'likes'])
            ->whereHas('user', function ($q) {
                $q->where('is_suspended', false);
            })
            ->withCount(['comments', 'likes']);

        $sort = $request->get('sort', 'latest');
        $author = $request->get('author');

        // Filter by Author
        if ($author === 'me' && Auth::check()) {
            $query->where('user_id', Auth::id());
        }

        if ($sort === 'popular') {
            $query->orderBy('likes_count', 'desc');
        } elseif ($sort === 'comments') {
            $query->orderBy('comments_count', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $posts = $query->paginate(10);

        if ($request->ajax()) {
            return view('pages.partials.post-card', compact('posts'))->render();
        }

        return view('pages.komunitas', compact('posts', 'sort', 'author'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Postingan berhasil dikirim!');
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:200',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $postId,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

    public function toggleLike($postId)
    {
        $userId = Auth::id();
        $like = Like::where('user_id', $userId)->where('post_id', $postId)->first();

        if ($like) {
            $like->delete();
            $status = 'unliked';
        } else {
            Like::create([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
            $status = 'liked';
        }

        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'action' => $status,
                'likes_count' => Like::where('post_id', $postId)->count()
            ]);
        }

        return redirect()->back();
    }

    public function destroyPost($postId)
    {
        $post = Post::findOrFail($postId);

        // Authorization: Owner or Admin
        $isOwner = Auth::check() && $post->user_id === Auth::id();
        $isAdmin = session()->has('admin_id');

        if (!$isOwner && !$isAdmin) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus postingan ini.');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus.');
    }
}
