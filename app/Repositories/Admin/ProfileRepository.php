<?php

namespace App\Repositories\Admin;

use App\Repositories\Interface\Admin\ProfileRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function update($user, array $data)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];

        if (! empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return response()->json([
            'message' => 'Profil berhasil diperbarui.',
            'user' => $user,
        ]);
    }
}
