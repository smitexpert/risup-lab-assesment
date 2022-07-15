<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\AttendanceService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request, UserService $userService)
    {
        $user = $userService->store($request);
        $userService->uploadIcon($request, $user);

        return redirect()->route('users.index')->with('success', 'Users created successfully!');
    }

    public function show(Request $request, $id, AttendanceService $attendanceService)
    {
        $user = User::findOrFail($id);
        $data = $attendanceService->show($request);
        $present = $data['present'];
        $total_days = $data['total_days'];
        return view('users.show', compact('user', 'present', 'total_days'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    function update(UserUpdateRequest $request, $id, UserService $userService)
    {

        $user = User::findOrFail($id);
        $userService->update($request, $user);

        if($request->hasFile('icon')) {
            $userService->uploadIcon($request, $user);
        }

        return back()->with('success', 'Users updated successfully!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Users delete successfully!');
    }
}
