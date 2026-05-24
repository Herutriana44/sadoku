<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AdministrativeVerificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FinalDecisionController;
use App\Http\Controllers\SubmissionRevisionController;
use App\Http\Controllers\ReviewAssignmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'submissions' => SubmissionController::class,
    'administrative-verifications' => AdministrativeVerificationController::class,
    'reviews' => ReviewController::class,
    'final-decisions' => FinalDecisionController::class,
    'submission-revisions' => SubmissionRevisionController::class,
    'review-assignments' => ReviewAssignmentController::class,
]);
