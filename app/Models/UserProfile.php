<?php

namespace App\Models;

use App\Enums\ProfileType;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $registration_status
 * @property string|null $registration_number
 * @property string|null $phone_number
 * @property string|null $institution_name
 * @property string|null $position
 * @property string $nationality
 * @property array $address
 * @property string|null $company_service_category
 * @property string|null $company_registration_number
 * @property string|null $vat_number
 * @property int $can_receive_notification
 * @property ProfileType $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $gender
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCanReceiveNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCompanyRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCompanyServiceCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereInstitutionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereRegistrationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereVatNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
class UserProfile extends Model
{
    use HasFactory, HasRoles, HasPanelShield;

    public const STATUS_NOT_REGISTERED = 'not-registered';
    public const STATUS_REGISTERED = 'registered';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'gender',
        'registration_status',
        'registration_number',
        'phone_number',
        'institution_name',
        'position',
        'nationality',
        'address',
        'can_receive_notification',
        'type',
    ];

    /**
     * Get the user associated with the UserProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guardName()
    {
        return ['web'];
    }

    protected $casts = [
        'type' => ProfileType::class,
        'address' => 'json',
    ];

    public static function getRegistrationStatuses()
    {
        return [
            self::STATUS_NOT_REGISTERED => 'Not Registered',
            self::STATUS_REGISTERED => 'Registered',
        ];
    }

}
