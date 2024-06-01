<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display the list of users.
     */
    public function index()
    {
        $users = User::all();
        return view('user-list', compact('users'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index')->with('success', 'User deleted successfully');
    }
}
