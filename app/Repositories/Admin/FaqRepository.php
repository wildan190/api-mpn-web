<?php

namespace App\Repositories\Admin;

use App\Models\Faq;
use App\Repositories\Interface\Admin\FaqRepositoryInterface;

class FaqRepository implements FaqRepositoryInterface
{
    public function all()
    {
        return response()->json(Faq::paginate(10));
    }

    public function create(array $data)
    {
        if (array_is_list($data)) {
            $faqs = Faq::insert($data);

            return response()->json([
                'message' => 'Beberapa FAQ berhasil ditambahkan.',
                'data' => $data,
            ]);
        } else {
            $faq = Faq::create($data);

            return response()->json([
                'message' => 'FAQ berhasil ditambahkan.',
                'data' => $faq,
            ]);
        }
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
