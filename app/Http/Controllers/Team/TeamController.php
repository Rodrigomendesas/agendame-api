<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Http\Requests\Team\TeamStoreRequest;
use App\Http\Requests\Team\TeamUpdateRequest;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index(){
        $user = auth()->user();
        return TeamResource::collection($user->teams);
    }

    public function store(TeamStoreRequest $request){
        $input = $request->validated();
        $input['token'] = Str::uuid();

        $team = Team::query()->create($input);

        $user = auth()->user();
        setPermissionsTeamId($team->id);

        // $user->assignRole('admin');

        return new TeamResource($team);
    }

    public function update(Team $team, TeamUpdateRequest $request){
        $this->authorize('update', $team);

        $input = $request->validated();

        $team->fill($input);
        $team->save();

        return new TeamResource($team);

    }

    public function destroy(Team $team){
        $this->authorize('destroy', $team);

        DB::table('model_has_roles')
            ->where('team_id', $team->id)
            ->delete();

        $team->delete();
    }
}
