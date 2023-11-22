<?php

namespace App\Domains\Users\Services;

use App\Domains\Users\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function get(int $id): User
    {
        return User::findOrFail($id);
    }

    public function getByEmail(string $email): User
    {
        return User::where('email', $email)
            ->firstOrFail();
    }

    public function list():LengthAwarePaginator
    {
        return User::query()->paginate();
    }
    
    public function register( array $request):User{
        
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['whatsapp'] = $request['whatsapp'];
        $data['avatar'] = $request['avatar'];
        $data['investidor_type_id'] = $request['investidor_type_id'];
        $data['sport_id'] = $request['sport_id'];
        $data['password'] = Hash::make($request['password']);

        $user = User::create($data);
        $user->save();

        return $user;

    }
}