<?php

namespace App\Repositories;

use App\Comment;
use App\Food;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRepository
{
    public function all()
    {
        return Comment::paginate(config('pagination.comment'));
    }

    public function findFood($id)
    {
        return Food::findOrFail($id);
    }

    public function findNews($id)
    {
        return News::findOrFail($id);
    }


    public function findComment($id)
    {
        return Comment::findOrFail($id);
    }

    public function commentFood(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $food->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $request->get('content'),
        ]);
    }

    public function commentNews(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $request->get('content'),
        ]);
    }
}
