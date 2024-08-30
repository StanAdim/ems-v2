<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $event_model_id
 * @property int $user_id
 * @property int|null $parent_conversation_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, EventConversation> $answers
 * @property-read int|null $answers_count
 * @property-read \App\Models\EventModel|null $event
 * @property-read EventConversation|null $parentConversation
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation whereEventModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation whereParentConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventConversation whereUserId($value)
 * @mixin \Eloquent
 */
class EventConversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_model_id',
        'user_id',
        'parent_conversation_id',
        'message',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(EventModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parentConversation(): BelongsTo
    {
        return $this->belongsTo(EventConversation::class, 'parent_conversation_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(EventConversation::class, 'parent_conversation_id');
    }
}
