<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UploadBook;
use Illuminate\Auth\Access\HandlesAuthorization;

class UploadBookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_upload::book');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UploadBook $uploadBook): bool
    {
        return $user->can('view_upload::book');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_upload::book');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UploadBook $uploadBook): bool
    {
        return $user->can('update_upload::book');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UploadBook $uploadBook): bool
    {
        return $user->can('delete_upload::book');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_upload::book');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, UploadBook $uploadBook): bool
    {
        return $user->can('force_delete_upload::book');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_upload::book');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, UploadBook $uploadBook): bool
    {
        return $user->can('restore_upload::book');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_upload::book');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, UploadBook $uploadBook): bool
    {
        return $user->can('replicate_upload::book');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_upload::book');
    }
}
