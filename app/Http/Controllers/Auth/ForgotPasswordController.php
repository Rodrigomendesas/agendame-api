<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Exceptions\UserNotFoundException;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function __invoke(ForgotPasswordRequest $request)
    {
        $input = $request->validated();

        $user = User::query()->whereEmail($input['email'])->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        $user->resetPasswordTokens()
            ->create(['token' => Str::upper(Str::random(6))]);
        $user->save();
    }
}
