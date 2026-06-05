<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairAudit extends Model
{
    protected $fillable = ['repair_id', 'user_id', 'changes'];
    protected $casts = [
        'changes' => 'array',
    ];

    public function repair() { return $this->belongsTo(Repair::class); }
    public function user() { return $this->belongsTo(User::class); }
};