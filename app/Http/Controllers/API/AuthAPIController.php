<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthAPIController extends Controller
{


    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function redirectToProvider($provider)
    {
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }

        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function handleProviderCallback($provider)
    {
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }

        $userCreated = User::firstOrCreate(
            [
                'email' => $user->getEmail()
            ],
            [
                'email_verified_at' => now(),
                'name' => $user->getName(),
                'status' => true,
                'activated' => true,
                'google_id' => $user->getId(),
            ]
        );
        // dd($userCreated);
        $userCreated->userInformation()->updateOrCreate(
            [
                'user_id' => $userCreated->id
            ],
            [
                'first_name' => $user->offsetGet('given_name'),
                'last_name' => $user->offsetGet('family_name'),
                'avatar_path' => getSocialAvatar(
                    str_replace('-w=s96', '-w=s500', $user->getAvatar()), $user),
                'position_id' => 1,
                'google_id' => $user->getId(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $userCreated->providers()->updateOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ],
            [
                'avatar' => getSocialAvatar(
                    str_replace('-w=s96', '-w=s500', $user->getAvatar()), $user),
            ]
        );
        dd($user->token);
        $token = $userCreated->createToken('token-name')->plainTextToken;

        return response()->json($userCreated, 200, ['Access-Token' => $token]);
    }

    /**
     * @param $provider
     * @return JsonResponse
     */
    protected function validateProvider($provider)
    {
        if (!in_array($provider, ['facebook', 'github', 'google'])) {
            return response()->json(['error' => 'Please login using facebook, github or google'], 422);
        }
    }

       // login not using a provider
       protected function requestToken(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        // getting user
        $user = User::where('email', $request->email)->first();

        // checking credentials
        if( !$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessage([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Returning response
        return response()->json($this->getUserAndToken($user, $request->device_name));

    }

    protected function requestTokenGoogle(Request $request){
        // Getting the user from socialite using token from google
        // dd($request);
        $user = Socialite::driver('google')->stateless()->userFromToken($request->token);
        // Getting or creating user from db
        $userCreated = User::firstOrCreate(
            [
                'email' => $user->getEmail()
            ],
            [
                'email_verified_at' => now(),
                'name' => $user->getName(),
                'status' => true,
                'activated' => true,
                'google_id' => $user->getId(),
            ]
        );
        // dd($userCreated);
        $userCreated->userInformation()->updateOrCreate(
            [
                'user_id' => $userCreated->id
            ],
            [
                'first_name' => $user->offsetGet('given_name'),
                'last_name' => $user->offsetGet('family_name'),
                'avatar_path' => getSocialAvatar(str_replace('-w=s96', '-w=s500', $user->getAvatar()), $user),
                'position_id' => 1,
                'google_id' => $user->getId(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Returning response
        return response()->json($this->getUserAndToken($userCreated));
    }

    //region Helpers

    private function getUserAndToken(User $user, $device_name){
        return [
            'User' => $user,
            'Access-Token' => $user->createToken($device_name)->plainTextToken,
        ];
    }

}
