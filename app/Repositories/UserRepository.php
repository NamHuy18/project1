<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Requests;
use App\User;
use App\Http\Requests\UserRequest;

class UserRepository
{
    public function all()
    {
        return User::paginate(config('pagination.user'));
    }

    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }

    public function add(UserRequest $request)
    {
        $user = new User;
        $validated = $request->validated();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . '_' . $name;
            while (file_exists("upload/user/" . $avatar)) 
            {
                $avatar = str_random(4) . '_' . $name;
            }
            $file->move(config('setting.avatar.user'), $avatar);
            $user->avatar = $avatar;
        }
        else
        {
            $user->avatar = '';
        }
        $user->save();
    }
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validated();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        if ($request->password != null)
        {
            $user->password = bcrypt($request->password);
        }
        $user->level = $request->level;
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . '_' . $name;
            while (file_exists("upload/user/" . $avatar)) 
            {
                $avatar = str_random(4) . '_' . $name;
            }
            unlink('upload/user/'.$user->avatar);
            $file->move(config('setting.avatar.user'), $avatar);          
            $user->avatar = $avatar;
        }
        $user->save();
    }
}

