<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'user_id', 'judul_penelitian', 'abstrak', 'berkas_path', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function administrativeVerification()
    {
        return $this->hasOne(AdministrativeVerification::class);
    }

    public function reviewClassification()
    {
        return $this->hasOne(ReviewClassification::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function finalDecision()
    {
        return $this->hasOne(FinalDecision::class);
    }

    public function revisions()
    {
        return $this->hasMany(SubmissionRevision::class);
    }

    public function reviewAssignments()
    {
        return $this->hasMany(ReviewAssignment::class);
    }

    public function timelines()
    {
        return $this->hasMany(SubmissionTimeline::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
