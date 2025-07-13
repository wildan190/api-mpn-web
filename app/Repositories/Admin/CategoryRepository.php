<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Repositories\Interface\Admin\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return response()->json(Category::latest()->paginate(10));
    }

    public function create(array $data)
    {
        $category = Category::create($data);

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan.',
            'data' => $category,
        ]);
    }

    public function find($id)
    {
        return response()->json(Category::findOrFail($id));
    }

    public function update(array $data, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($data);

        return response()->json([
            'message' => 'Kategori berhasil diperbarui.',
            'data' => $category,
        ]);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus.',
        ]);
    }
}
