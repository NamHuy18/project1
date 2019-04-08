<?php

namespace App\Repositories;

use App\News;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Auth;

class NewsRepository
{
    public function all()
    {
        return News::paginate(config('pagination.news'));
    }

    public function findOrFail($id)
    {
        return News::findOrFail($id);
    }

    public function add(NewsRequest $request)
    {   
        $user = Auth::user();
        $news = new News;
        $validated = $request->validated();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->description = $request->description;
        $news->user_id = $user->id;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . '_' . $name;
            while (file_exists("upload/news/" . $image)) 
            {
                $image = str_random(4) . '_' . $name;
            }
            $file->move(config('setting.avatar.news'), $image);
            $news->image = $image;
        }
        else
        {
            $news->image = '';
        }
        $news->save();
    }

    public function update(NewsRequest $request, $id)
    {   
        $user = Auth::user();
        $news = News::findOrFail($id);
        $validated = $request->validated();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->description = $request->description;
        $news->user_id = $user->id;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4) . '_' . $name;
            while (file_exists("upload/news/" . $image)) 
            {
                $image = str_random(4) . '_' . $name;
            }
            // unlink('upload/news/'.$news->image);
            $file->move(config('setting.avatar.news'), $image);
            $news->image = $image;
        }
        $news->save();
    }

    public function delete($id)
    {
        $this->findOrFail($id)->delete();

        return true;
    }
}
