<?php

namespace App\Policies;

use App\GoalSetting;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GoalSettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any goal settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the goal setting.
     *
     * @param  \App\User  $user
     * @param  \App\GoalSetting  $goalSetting
     * @return mixed
     */
    public function view(User $user, GoalSetting $goalSetting)
    {
        //ユーザーが目標設定を更新できるか確認
        return $user->id === $goalSetting->user_id;
    }

    /**
     * Determine whether the user can create goal settings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the goal setting.
     *
     * @param  \App\User  $user
     * @param  \App\GoalSetting  $goalSetting
     * @return mixed
     */
    public function update(User $user, GoalSetting $goalSetting)
    {
        //
    }

    /**
     * Determine whether the user can delete the goal setting.
     *
     * @param  \App\User  $user
     * @param  \App\GoalSetting  $goalSetting
     * @return mixed
     */
    public function delete(User $user, GoalSetting $goalSetting)
    {
        //
    }

    /**
     * Determine whether the user can restore the goal setting.
     *
     * @param  \App\User  $user
     * @param  \App\GoalSetting  $goalSetting
     * @return mixed
     */
    public function restore(User $user, GoalSetting $goalSetting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the goal setting.
     *
     * @param  \App\User  $user
     * @param  \App\GoalSetting  $goalSetting
     * @return mixed
     */
    public function forceDelete(User $user, GoalSetting $goalSetting)
    {
        //
    }
}
