<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the users.
     *
     * Retrieves all users along with their associated parking lot.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return response()->json($users);
    }

    /**
     * Store a newly created user in storage.
     *
     * Validates the request data and creates a new user record.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => ['required', Rule::unique('users', 'user_name')],
            'name' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'id_number' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'id_role' => 'required',
            'id_parking_lot' => 'required',
        ]);

        $this->userRepository->createUser($request->all());
    }

    /**
     * Display the specified user.
     *
     * Retrieves a user by their ID along with their associated parking lot.
     *
     * @param int $id The ID of the user to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $user = $this->userRepository->getUserById($id);
        return response()->json($user);
    }

    /**
     * Update the specified user in storage.
     *
     * Validates the request data and updates the user record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to update.
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'user_name' => ['required', Rule::unique('users')->ignore($id)],
            'name' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'id_number' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($id)],
        ]);

        $this->userRepository->updateUser($request->all(), $id);
    }

    /**
     * Remove the specified user from storage.
     *
     * Deletes the user by their ID.
     *
     * @param string $id The ID of the user to delete.
     * @return void
     */
    public function destroy(string $id)
    {
        $this->userRepository->deleteUser($id);
    }
}
