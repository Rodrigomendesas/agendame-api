<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Exceptions\InvalidPasswordResetTokenException;

class ResetPasswordController extends Controller
{
    public function __invoke(ResetPasswordRequest $request)
    {
        $input = $request->validated();

        $token = PasswordResetToken::query()
            ->whereToken($input['token'])
            ->where('created_at', '>', now()->subMinutes(60)->toDateTimeString())
            ->first();

        if (!$token) {
            throw new InvalidPasswordResetTokenException();
        }
        $user = $token->user;

        $user->password = bcrypt($input['password']);
        $user->save();

        $user->passwordResetTokens()->delete();
    }
}
