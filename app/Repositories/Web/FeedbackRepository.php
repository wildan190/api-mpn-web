<?php

namespace App\Repositories\Web;

use App\Models\Feedback;
use App\Repositories\Interface\Web\FeedbackRepositoryInterface;

class FeedbackRepository implements FeedbackRepositoryInterface
{
    public function create(array $data)
    {
        $feedback = Feedback::create($data);

        return response()->json([
            'message' => 'Feedback berhasil dikirim.',
            'data' => $feedback,
        ], 201);
    }

    public function all()
    {
        return response()->json(Feedback::latest()->get());
    }
}
