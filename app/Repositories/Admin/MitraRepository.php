<?php

namespace App\Repositories\Admin;

use App\Models\Mitra;
use App\Repositories\Interface\Admin\MitraRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class MitraRepository implements MitraRepositoryInterface
{
    public function all()
    {
        return response()->json(Mitra::all());
    }

    public function create(array $data)
    {
        if (request()->hasFile('mitra_logo')) {
            $data['mitra_logo'] = request()->file('mitra_logo')->store('mitra', 'public');
        }

        $mitra = Mitra::create($data);

        return response()->json([
            'message' => 'Mitra berhasil ditambahkan.',
            'data' => $mitra,
        ]);
    }

    public function find($id)
    {
        $mitra = Mitra::findOrFail($id);

        return response()->json($mitra);
    }

    public function update(array $data, $id)
    {
        $mitra = Mitra::findOrFail($id);

        if (request()->hasFile('mitra_logo')) {
            // hapus logo lama jika ada
            if ($mitra->mitra_logo && Storage::exists('public/'.$mitra->mitra_logo)) {
                Storage::delete('public/'.$mitra->mitra_logo);
            }

            $data['mitra_logo'] = request()->file('mitra_logo')->store('mitra', 'public');
        }

        $mitra->update($data);

        return response()->json([
            'message' => 'Mitra berhasil diperbarui.',
            'data' => $mitra,
        ]);
    }

    public function delete($id)
    {
        $mitra = Mitra::findOrFail($id);

        if ($mitra->mitra_logo && Storage::exists('public/'.$mitra->mitra_logo)) {
            Storage::delete('public/'.$mitra->mitra_logo);
        }

        $mitra->delete();

        return response()->json([
            'message' => 'Mitra berhasil dihapus.',
        ]);
    }
}
