<?php

namespace App\Policies;

use App\Models\EventBooking;
use App\Models\User;
use App\Models\EventModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventModelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_event::model');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventModel $eventModel): bool
    {
        return $user->can('view_event::model');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_event::model');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventModel $eventModel): bool
    {
        return $user->can('update_event::model');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventModel $eventModel): bool
    {
        return $user->can('delete_event::model');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_event::model');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, EventModel $eventModel): bool
    {
        return $user->can('force_delete_event::model');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_event::model');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, EventModel $eventModel): bool
    {
        return $user->can('restore_event::model');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_event::model');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, EventModel $eventModel): bool
    {
        return $user->can('replicate_event::model');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_event::model');
    }

    public function askQuestion(User $user, EventModel $eventModel)
    {
        return $user
            ->bookings
            ->filter(fn($b) => $b->isPaid())
            ->map(function (EventBooking $booking) {
                $booking->event;
            })
            ->keyBy('id')
            ->contains($eventModel->id);
    }
}
