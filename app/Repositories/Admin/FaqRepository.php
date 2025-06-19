<?php

namespace App\Repositories\Admin;

use App\Models\Faq;
use App\Repositories\Interface\Admin\FaqRepositoryInterface;

class FaqRepository implements FaqRepositoryInterface
{
    public function all()
    {
        return response()->json(Faq::latest()->get());
    }

    public function create(array $data)
    {
        $faq = Faq::create($data);

        return response()->json([
            'message' => 'FAQ berhasil ditambahkan.',
            'data' => $faq,
        ]);
    }

    public function find($id)
    {
        return response()->json(Faq::findOrFail($id));
    }

    public function update(array $data, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->update($data);

        return response()->json([
            'message' => 'FAQ berhasil diperbarui.',
            'data' => $faq,
        ]);
    }

    public function delete($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return response()->json([
            'message' => 'FAQ berhasil dihapus.',
        ]);
    }
}
