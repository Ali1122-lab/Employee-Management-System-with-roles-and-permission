<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Resources\Http\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $authUser */
        $authUser = Auth::user();

        $employees = User::role('Employee')
            ->where('department_id', $authUser->department_id)
            ->with('department')
            ->get();

        return UserResource::collection($employees);
    }

    public function show(User $user)
    {
        /** @var \App\Models\User $authUser */
        $authUser = Auth::user();

        if ($user->department_id !== $authUser->department_id || !$user->hasRole('Employee')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return new UserResource($user->load('department'));
    }
}
