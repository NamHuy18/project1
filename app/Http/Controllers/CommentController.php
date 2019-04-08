<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Food; 
use App\User;
use App\News;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{   
    protected $comment, $food, $news;

    public function __construct(CommentRepository $comment, CommentRepository $food, CommentRepository $news)
    {
        $this->comment = $comment;
        $this->food = $food;
        $this->news = $news;
    }

    public function getListFood($id)
    {   
        try
        {
            $food = $this->food->findFood($id);
            $comment = $this->comment->all();

            return view('admin.commentFood', compact('food', 'comment'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }    	
    }

    public function getListNews($id)
    {   
        try
        {
            $news = $this->news->findNews($id);
            $comment = $this->comment->all();

            return view('admin.commentNews', compact('news', 'comment'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }    	
    }

    public function postCommentFood(Request $request, $id)
    {   
        try
        {
            $food = $this->food->commentFood($request, $id);

            return redirect('food/' . $id)->with('message', trans('setting.comment_success'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postCommentNews(Request $request, $id)
    {   
        try
        {
            $news = $this->news->commentNews($request, $id);

            return redirect('news-detail/' . $id)->with('message', trans('setting.comment_success'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}
