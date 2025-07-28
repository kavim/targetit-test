<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPermissionRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Eloquent\PermissionService;
use App\Services\Eloquent\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $service, private PermissionService $permissionService)
    {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->service->create($request->validated());
        return response()->json($user, 201);
    }

    public function show(int $id)
    {
        return response()->json($this->service->find($id));
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());
        return response()->noContent();
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }

    public function assignPermission(AssignPermissionRequest $req, $id)
    {
        $this->permissionService->assignRoles($id, $req->roles);
        return response()->noContent();
    }
}

