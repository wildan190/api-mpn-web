<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Repositories\Interface\Admin\AssignUserInterRepositoryInterface;
use Illuminate\Http\Response;

class AssignUserRepository implements AssignUserInterRepositoryInterface
{
    public function assignRolesAndPermissions(array $data)
    {
        $user = User::findOrFail($data['user_id']);

        // Sinkronisasi roles dan permissions
        if (isset($data['roles'])) {
            $user->syncRoles($data['roles']);
        }

        if (isset($data['permissions'])) {
            $user->syncPermissions($data['permissions']);
        }

        return response()->json([
            'message' => 'Role dan permission berhasil ditetapkan.',
            'data' => [
                'user' => $user->load('roles', 'permissions'),
            ],
        ], Response::HTTP_OK);
    }
}
