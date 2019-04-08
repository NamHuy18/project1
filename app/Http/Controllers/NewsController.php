<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Requests;
use App\Http\Requests\NewsRequest;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{   
    protected $news;

    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

    public function getList()
    {
        $news = $this->news->all();

    	return view('admin.news.list', compact('news'));
    }

    public function getAdd()
    {
    	return view('admin.news.add');
    }

    public function postAdd(NewsRequest $request)
    {
        $news = $this->news->add($request);

        return redirect(route('addNews'))->with('message', trans('setting.add_success'));
    }

    public function getEdit($id)
    {
        try 
        {
            $news = $this->news->findOrFail($id);

            return view('admin.news.edit', compact('news'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postEdit(NewsRequest $request, $id)
    {   
        try
        {
            $news = $this->news->update($request, $id);

            return redirect('admin/news/edit/' . $id)->with('message', trans('setting.edit_success'));
        }
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function getDelete($id)
    {
        try 
        {
            $news = News::findOrFail($id);
            // unlink('upload/news/'.$news->image);
            $news->delete();

            return redirect(route('listNews'))->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}

