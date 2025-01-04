<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

if (!function_exists('setPermissionTeamId')) {
    function setPermissionTeamId($teamId = null) {
        // If no team ID is provided, try to get the current user's team
        if ($teamId === null) {
            $user = Auth::user();
            $teamId = $user ? $user->team_id : null;
        }

        // Set the team ID in the session
        if ($teamId) {
            Session::put('current_team_id', $teamId);
        }
    }
}
