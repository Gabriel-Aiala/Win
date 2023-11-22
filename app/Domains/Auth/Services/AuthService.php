<?php

namespace App\Domains\Auth\Services;

use Exception;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;
use App\Domains\Users\Models\User;
use App\Domains\Users\Resources\UserResource;

class AuthService
{

    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('login_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => config('sanctum.expiration') * 60,
                'users' => new UserResource($user)
            ]);
        }

        throw new Exception(trans('auth.failed'), Response::HTTP_UNAUTHORIZED);
    }

    public function forgot(string $email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            $token = Password::createToken($user);

            $data =
                [
                    'token' => $token,
                    'email' => $email,
                    'user' => $user
                ];

            SendResetPasswordNotificationJob::dispatch($data);
        }
    }

    public function resetPassword(array $data)
    {
        $response = Password::reset($data, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });
        
        return $response;
    }

    public function changePassword( $data)
    {
        
        if(!Hash::check($data->old_password, auth()->user()->password)){
            return false;
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($data->new_password)
        ]);
        return true;

    }
}