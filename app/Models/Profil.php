<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profil extends Model
{
    /** @use HasFactory<\Database\Factories\ProfilFactory> */
    use HasFactory, HasUlids;

    protected $fillable = ['avatar', 'bio', 'user_id'];
    public function user() : BelongsTo
    {
    return $this->belongsTo(User::class);
    }

}
