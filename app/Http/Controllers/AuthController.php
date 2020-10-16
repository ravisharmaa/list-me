<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup()
    {

        $validator = Validator::make(\request()->all(),[
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
           return response($validator->messages()->email, 200);
        }

        $role = Role::whereName(\request('role'))->first();

        try {
            $user =  User::create([
                'name' => \request('name'),
                'email' => \request('email'),
                'role_id' => $role->id,
                'password' => bcrypt(\request('password'))
            ]);

            // if the role is employee there is no need to create store just attach the store_id to employee

            $user->stores()->create([
                'name' => \request('businessName'),
                'street' => \request('street'),
                'zip_code' => \request('zip'),
                'latitude' => 123123,
                'longitude' => 1232,
                'state' => \request('state'),
                'phone_number' => \request('telephone')
            ]);

            return response([
                'success' => true,
            ], 200);
        } catch (\Exception $e) {
            return response([
               'success' => false
            ], 200);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        
        if(!auth()->attempt($credentials)) {
        	 return response()->json([
                'access_token' => '',
            	'token_type' => 'Bearer',
            	'user' => null,
            	'role' => null,
            	'expires_at' => null,
            	'success' => false
            ], 200);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
    	}

        // fetch role, this might not be efficient I might want to refactor.
        $role = Role::select('name')->where('id', $user->role_id)->first();


        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'user' => $user,
            'role' => $role->name,
            'success' => true,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
}
