<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Exceptions\InvalidTokenException;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Exceptions\UserAlreadyVerifiedException;

class VerifyEmailController extends Controller
{
    public function __invoke(VerifyEmailRequest $request)
    {
        $input = $request->validated();
        $user = User::query()->whereToken($input['token'])->first();

        if (!$user) {
            throw new InvalidTokenException();
        }

        if ($user->email_verified_at) {
            throw new UserAlreadyVerifiedException();
        }

        $user->email_verified_at = now();
        $user->save();

        return new UserResource($user);
    }
}
