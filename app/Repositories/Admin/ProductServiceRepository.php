<?php

namespace App\Repositories\Admin;

use App\Models\ProductService;
use App\Repositories\Interface\Admin\ProductServiceRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ProductServiceRepository implements ProductServiceRepositoryInterface
{
    public function all()
    {
        return response()->json(ProductService::latest()->get());
    }

    public function create(array $data)
    {
        if (request()->hasFile('upload_picture')) {
            $data['upload_picture'] = request()->file('upload_picture')->store('product-services', 'public');
        }

        $product = ProductService::create($data);

        return response()->json([
            'message' => 'Produk/Layanan berhasil ditambahkan.',
            'data' => $product,
        ]);
    }

    public function find($id)
    {
        return response()->json(ProductService::findOrFail($id));
    }

    public function update(array $data, $id)
    {
        $product = ProductService::findOrFail($id);

        if (request()->hasFile('upload_picture')) {
            if ($product->upload_picture && Storage::exists('public/'.$product->upload_picture)) {
                Storage::delete('public/'.$product->upload_picture);
            }

            $data['upload_picture'] = request()->file('upload_picture')->store('product-services', 'public');
        }

        $product->update($data);

        return response()->json([
            'message' => 'Produk/Layanan berhasil diperbarui.',
            'data' => $product,
        ]);
    }

    public function delete($id)
    {
        $product = ProductService::findOrFail($id);

        if ($product->upload_picture) {
            Storage::delete('public/'.$product->upload_picture);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produk/Layanan berhasil dihapus.',
        ]);
    }
}
