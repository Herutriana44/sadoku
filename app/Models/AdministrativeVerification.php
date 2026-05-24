<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdministrativeVerification extends Model
{
    protected $fillable = [
        'submission_id', 'sekretariat_id', 'is_lengkap', 'catatan',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function sekretariat()
    {
        return $this->belongsTo(User::class, 'sekretariat_id');
    }
}
