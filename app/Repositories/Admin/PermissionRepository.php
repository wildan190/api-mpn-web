<?php

namespace App\Repositories\Admin;

use App\Repositories\Interface\Admin\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function all()
    {
        return response()->json(Permission::latest()->paginate(10));
    }

    public function create(array $data)
    {
        $permission = Permission::create(['name' => $data['name']]);

        return response()->json([
            'message' => 'Permission berhasil dibuat.',
            'data' => $permission,
        ]);
    }

    public function find($id)
    {
        return response()->json(Permission::findOrFail($id));
    }

    public function update(array $data, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $data['name']]);

        return response()->json([
            'message' => 'Permission berhasil diperbarui.',
            'data' => $permission,
        ]);
    }

    public function delete($id)
    {
        Permission::findOrFail($id)->delete();

        return response()->json(['message' => 'Permission berhasil dihapus.']);
    }
}
