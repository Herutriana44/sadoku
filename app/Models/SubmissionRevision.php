<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionRevision extends Model
{
    protected $fillable = [
        'submission_id', 'berkas_revisi_path', 'catatan_peneliti', 'tipe_perbaikan', 'versi',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
