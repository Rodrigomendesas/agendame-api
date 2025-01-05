<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Auth\LoginRequest;
use App\Exceptions\InvalidAuthenticationException;

/**
 * Login Controller responsible for authenticating users
 *
 * This controller handles user authentication via credentials and returns
 * a UserResource upon successful login.
 *
 * @package App\Http\Controllers\Auth
 */

class LoginController extends Controller{

    /**
     * Authenticate a user and generate a session
     *
     * This method validates login credentials, attempts authentication,
     * and returns the authenticated user's resource. If authentication fails,
     * it throws an InvalidAuthenticationException.
     *
     * @param LoginRequest $request Validated login request containing credentials
     * @return UserResource The authenticated user's resource
     * @throws InvalidAuthenticationException If credentials are invalid
     */

    public function __invoke(LoginRequest $request): UserResource
    {
        $input = $request->validated();

        if (!auth()->attempt($input)) {
            throw new InvalidAuthenticationException();
        }
        // request()->session()->regenerate();

        $user = auth()->user();

        return new UserResource($user);
    }
}
