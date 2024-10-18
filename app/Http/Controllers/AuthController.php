<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepository;

    /**
     * Dependency injection for the repository.
     *
     * @param AuthRepositoryInterface $authRepository
     */
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * User login
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $loginResponse = $this->authRepository->login($credentials);

        if ($loginResponse['status']) {
            return response()->json(['message' => $loginResponse['message']], 200);
        }

        return response()->json(['message' => $loginResponse['message']], 401);
    }
}
