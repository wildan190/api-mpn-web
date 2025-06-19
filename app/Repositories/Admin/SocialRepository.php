<?php

namespace App\Repositories\Admin;

use App\Models\Social;
use App\Repositories\Interface\Admin\SocialRepositoryInterface;

class SocialRepository implements SocialRepositoryInterface
{
    public function get()
    {
        $social = Social::first();

        return response()->json($social);
    }

    public function update(array $data)
    {
        $social = Social::first() ?? new Social;
        $social->fill($data)->save();

        return response()->json([
            'message' => 'Sosial media berhasil diperbarui.',
            'data' => $social,
        ]);
    }
}
