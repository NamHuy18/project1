<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Requests;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;

class userController extends Controller
{   
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function getList()
    {
        $user = $this->user->all();

    	return view('admin.user.list', compact('user'));
    }

    public function getAdd()
    {
    	return view('admin.user.add');
    }

    public function postAdd(UserRequest $request)
    {
        $user = $this->user->add($request);

        return redirect(route('addUser'))->with('message', trans('setting.add_success'));
    }

    public function getEdit($id)
    {
        try 
        {
            $user = $this->user->findOrFail($id);

            return view('admin.user.edit', compact('user'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function postEdit(UserRequest $request, $id)
    {   
        try
        {
            $user = $this->user->update($request, $id);

            return redirect('admin/user/edit/' . $id)->with('message', trans('setting.edit_success'));
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
            $user = User::findOrFail($id);
            unlink('upload/user/'.$user->avatar);
            $user->delete();

            return redirect(route('listUser'))->with('message', trans('setting.delete_success'));
        } 
        catch (ModelNotFoundException $e) 
        {
            echo $e->getMessage();
        }
    }
}
