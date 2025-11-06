<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function followUnfollow(User $user)
    {
        $user->followers()->toggle(auth()->user());
        $response = [
            'followersCount' => $user->followers()->count(),
        ];
        return response()->json($response);
    }
}
