<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
// use App\Http\Resources\UserWithTaskResource;
// use App\Repositories\UserRepositoryInterface;


class UserController extends Controller
{
    // protected $repository;

    // public function __construct(UserRepositoryInterface $repository)
    // {
    //     $this->repository = $repository;
    // }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        // $users = $this->repository->gelAllUser();
        return new UserResource($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // $validated = $request->validated();
        // $request->safe()->only(['name']);
        $input = $request->all();
        $user = User::create($input);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                "success" => false,
            ]);
        } else {
            $tasks = Tasks::where('assignee',$id)->get();
            // $userT =  $user->join($tasks);
            return response()->json([
                    "user" => $user,
                    "tasks" => $tasks
                ]);
            // return new UserResource($user);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);
        $user->update($request->all());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->delete();
        if ($user) {
            return new UserResource($user);
        } else {
            return response()->json([
                "success" => false,
                "message" => "",
            ]);
        }
    }
}
