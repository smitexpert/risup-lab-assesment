<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {

    public function store($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->type
        ]);

        return $user;
    }


    public function update($request, $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if($request->has('type')) {
            $data['role'] = $request->type;
        }

        $user->update($data);
    }


    public function uploadIcon($request, $user)
    {
        $file = $request->file('icon');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move('uploads', $name);

        $user->update([
            'avatar' => 'uploads/'.$name
        ]);
    }
}
