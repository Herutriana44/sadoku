<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionTimeline extends Model
{
    protected $fillable = [
        'submission_id', 'tahap', 'tanggal_mulai', 'deadline', 'tanggal_selesai', 'status_sla',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
