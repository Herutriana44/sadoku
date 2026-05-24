<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalDecision extends Model
{
    protected $fillable = [
        'submission_id', 'ketua_id', 'hasil_keputusan', 'catatan', 'no_sertifikat_etik',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'ketua_id');
    }
}
