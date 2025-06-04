<?php
namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $users = $this->userService->all();
        return UserResource::collection($users);
    }
    public function store(UserRequest $request)
    {
        $user = $this->userService->create($request->validated());
        return new UserResource($user);
    }
    public function show($id)
    {
        $user = $this->userService->find($id);
        return new UserResource($user);
    }
    public function update(UserRequest $request, $id)
    {
        $user = $this->userService->update($id, $request->validated());
        return new UserResource($user);
    }
    public function destroy($id)
    {
        $this->userService->delete($id);
        return response()->noContent();
    }
    public function getUserReviews($userId)
    {
        $user = $this->userService->getUserReviews($userId);
        return new UserResource($user);
    }
}