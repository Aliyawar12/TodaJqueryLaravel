<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:user,admin', 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        if ($user) {
            return response()->json(['status' => 'success', 'message' => 'User registered successfully', 'user' => $user]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Unable to register user']);
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        if ($user) {
            return response()->json(['status' => 'success', 'user' => $user]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! User not found']);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password); 
            $user->role = $request->role;
            $user->save();
            return response()->json(['status' => 'success', 'message' => 'User updated successfully', 'user' => $user]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Unable to update user']);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Unable to delete user']);
    }
}
