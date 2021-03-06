<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Exceptions\ValidationException;
use App\GraphQL\Exceptions\AuthenticationException;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AuthMutation
{
    /**
     * Return a value for the field.
     *
     * @param  @param  null  $root Always null, since this field has no parent.
     * @param  array<string, mixed>  $args The field arguments passed by the client.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Shared between all fields.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Metadata for advanced query resolution.
     * @return mixed
     */
    public function register($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $isuser = User::where('email', $args['email'])->first();
    
        if ($isuser) {
            throw new ValidationException('Validation exception', 'A User with this email already exists');
        }

        $user = User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => Hash::make($args['password']),
        ]);

        $user->tokens()->delete();

        $request = $user->createToken('access_token')->plainTextToken;

        return [
            'message' => 'User Registered Successfully',
            'access_token' => $request,
            'user' => $user,
        ];
    }

    public function login($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::where('email', $args['email'])->first();
    
        if (! $user || ! Hash::check($args['password'], $user->password)) {
            throw new AuthenticationException('Authentication exception', 'Incorrect username or password');
        }

        $user->tokens()->delete();

        $request = $user->createToken('access_token')->plainTextToken;

        return [
            'message' => 'User Logged In Successfully',
            'access_token' => $request,
            'user' => $user,
        ];
    }

    public function logout($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::where('email', $args['email'])->first();

        if ($user->tokens()->count() == 0) {
            throw new AuthenticationException('Authentication exception', 'User has no active access tokens');
        }
        
        $user->tokens()->delete();

        return [
            'message' => 'User Logged Out Successfully',
            'user' => $user,
        ];
    }
}
