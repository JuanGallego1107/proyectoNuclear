<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the roles.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $roles = $this->roleRepository->getAllRoles();
        return response()->json($roles);
    }

    /**
     * Store a newly created role in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $this->roleRepository->createRole($request->all());
    }

    /**
     * Remove the specified role from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        $this->roleRepository->deleteRole($id);
    }
}
