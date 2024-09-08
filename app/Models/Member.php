<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $registered_on
 * @property string $registration_number
 * @property string $name
 * @property string|null $employer
 * @property string $professional_category
 * @property string|null $area_of_specialization
 * @property \Illuminate\Support\Collection $email (DC2Type:json)
 * @property \Illuminate\Support\Collection $phone_number (DC2Type:json)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereAreaOfSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmployer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereProfessionalCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereRegisteredOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Member extends Model
{
    use HasFactory;

    protected $casts = [
        'email' => AsCollection::class,
        'phone_number' => AsCollection::class,
    ];

    protected $fillable = [
        'registered_on',
        'registration_number',
        'name',
        'employer',
        'professional_category',
        'area_of_specialization',
        'email',
        'phone_number',
    ];
}
