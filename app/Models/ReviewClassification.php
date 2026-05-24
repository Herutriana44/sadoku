<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewClassification extends Model
{
    protected $fillable = [
        'submission_id', 'sekretariat_id', 'jenis_telaah',
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
