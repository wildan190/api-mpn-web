<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Repositories\Interface\Auth\AuthRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(AuthRequest $request)
    {
        return $this->authRepository->register($request->validated());
    }

    public function login(AuthRequest $request)
    {
        return $this->authRepository->login($request->validated());
    }

    public function logout(Request $request)
    {
        return $this->authRepository->logout($request->user());
    }

    public function user(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }
}
