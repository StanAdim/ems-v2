<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property int $event_model_id
 * @property int $rating
 * @property string $full_name
 * @property string $company_name
 * @property string $company_role
 * @property string $comment
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EventModel $event
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereCompanyRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereEventModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReview whereStatus($value)
 * @mixin \Eloquent
 */
class EventReview extends Model
{
    const STATUS_UNDER_REVIEW = 'under-review';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_model_id',
        'rating',
        'full_name',
        'company_name',
        'company_role',
        'comment',
        'status',
    ];

    /**
     * Get the user that owns the EventReview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the event that owns the EventReview
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(EventModel::class, 'event_model_id');
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_UNDER_REVIEW => 'Under Review',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
        ];
    }
}
