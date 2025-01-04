<?php

namespace App\Http\Controllers\Auth;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Auth\RegisterRequest;
use App\Exceptions\UserHasBeenTakenException;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     * @throws \App\Exceptions\UserHasBeenTakenException
     */

    public function __invoke(RegisterRequest $request)
    {
        $input = $request->validated();

        if (User::query()->whereEmail($input['email'])->exists()) {
            throw new UserHasBeenTakenException('Email already registered');
        }

        $input['password'] = bcrypt($input['password']);
        $input['token'] = Str::uuid();
        $user = User::query()->create($input);

        $team =Team::query()->create([
            'token' => Str::uuid(),
            'name' => $input['first_name'] . ' Team',
        ]);

        setPermissionsTeamId($team->id);

        $user->assignRole('admin');

        UserRegistered::dispatch($user);

        return new UserResource($user);
    }
}
