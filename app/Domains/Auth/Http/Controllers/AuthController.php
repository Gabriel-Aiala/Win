<?php

namespace App\Domains\Auth\Http\Controllers;

use App\Domains\Auth\Services\AuthService;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    private AuthService $service;

    /**
     * @param AuthService $service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request): JsonResponse
    {
        
        return $this->service->login($request->all());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

    public function forgotPassword(Request $request): JsonResponse
    {

        $this->service->forgot($request->email);

        return response()->json(['message' => 'email enviado com sucesso']);

    }

    public function resetPassword(Request $request): JsonResponse
    {
        $data = $request->all();
        $response = $this->service->resetPassword($data);

        if ($response === Password::PASSWORD_RESET) {
            return response()->json(null, 204);// Redefinição de senha bem-sucedida
        }

        return response()->json(['message' => 'nao foi possivel atualizar a senha'], 422);
    }

    function changePassword(Request $request)
    {
        $response = $this->service->changePassword($request);

        if ($response == false) {
            return response()->json(['message' => 'Senha atual incorreta'], 400);
        }

        return response()->json(null, 204);
    }
}