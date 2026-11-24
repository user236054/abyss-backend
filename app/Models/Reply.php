<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reply extends Model
{
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory, HasUlids;

    public function user() : BelongsTo
    {

    return $this->belongsTo(User::class);
    }

    public function topic() : BelongsTo
    {
    return $this->belongsTo(Topic::class);
    
    }
    public function replies() : HasMany
    {
    return $this->hasMany(Reply::class, 'parent_reply_id');
    }

    public function parentReply(): BelongsTo
{
    return $this->belongsTo(Reply::class, 'parent_reply_id');
}
    
}
