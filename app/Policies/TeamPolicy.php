<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Team;

class TeamPolicy
{
    public function update(User $user, Team $team)
    {
        setPermissionsTeamId($team->id);
        return $user->hasRole('admin');
    }

    public function destroy(User $user, Team $team)
    {
        setPermissionsTeamId($team->id);
        return $user->hasRole('admin');
    }
}
