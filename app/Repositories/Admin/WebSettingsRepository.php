<?php

namespace App\Repositories\Admin;

use App\Models\WebSettings;
use App\Repositories\Interface\Admin\WebSettingsRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class WebSettingsRepository implements WebSettingsRepositoryInterface
{
    public function get()
    {
        $settings = WebSettings::first();

        return response()->json($settings);
    }

    public function update(array $data)
    {
        $settings = WebSettings::first() ?? new WebSettings;

        if (request()->hasFile('upload_logo')) {
            if ($settings->upload_logo && Storage::exists(str_replace('/storage/', 'public/', $settings->upload_logo))) {
                Storage::delete(str_replace('/storage/', 'public/', $settings->upload_logo));
            }

            $path = request()->file('upload_logo')->store('websettings', 'public');
            $data['upload_logo'] = Storage::url($path);
        }

        $settings->fill($data)->save();

        return response()->json([
            'message' => 'Pengaturan berhasil diperbarui.',
            'data' => $settings,
        ]);
    }
}
