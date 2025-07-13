<?php

namespace App\Repositories\Admin;

use App\Repositories\Interface\Admin\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return response()->json(Role::latest()->paginate(10));
    }

    public function create(array $data)
    {
        $role = Role::create(['name' => $data['name']]);
        $role->syncPermissions($data['permissions'] ?? []);

        return response()->json([
            'message' => 'Role berhasil dibuat.',
            'data' => $role->load('permissions'),
        ]);
    }

    public function find($id)
    {
        return response()->json(Role::with('permissions')->findOrFail($id));
    }

    public function update(array $data, $id)
    {
        $role = Role::findOrFail($id);
        $role->update(['name' => $data['name']]);
        $role->syncPermissions($data['permissions'] ?? []);

        return response()->json([
            'message' => 'Role berhasil diperbarui.',
            'data' => $role->load('permissions'),
        ]);
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();

        return response()->json(['message' => 'Role berhasil dihapus.']);
    }
}
