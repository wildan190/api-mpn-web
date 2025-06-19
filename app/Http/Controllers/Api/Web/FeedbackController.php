<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\FeedbackRequest;
use App\Repositories\Interface\Web\FeedbackRepositoryInterface;

class FeedbackController extends Controller
{
    protected $feedbackRepository;

    public function __construct(FeedbackRepositoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function store(FeedbackRequest $request)
    {
        return $this->feedbackRepository->create($request->validated());
    }

    public function index()
    {
        return $this->feedbackRepository->all();
    }
}
