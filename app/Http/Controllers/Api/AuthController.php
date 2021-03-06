<?php

namespace App\Http\Controllers\Api;

use App\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class AuthController extends Controller
{
    public $successStatus = 200;
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'role' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        unset($input['role']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        if ($request->role) {
            $user->assignRole($request->role);
        }
        //dd($user->getRoleNames());



        return response()->json(['success' => $success, 'role' => $user->getRoleNames()], $this->successStatus);
    }
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->getRoleNames(),
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function change_password(Request $request, $id)
    {

      $user = User::where('id',$id)-> first();
      //$request->old_password = bcrypt($request->old_password);
      if($user)
      {
          if(\Hash::check($request->old_password, $user->password))
          {
                  $user->password = bcrypt($request->new_password);
                  $user->save();
                  return response()->json(['message'=>'Password changed successfully','status' => 'true'], 201);
          }
          else
          {
              return response()->json(['message'=>'Incorrect old password','status'=>'false'], 400);
          }

    }

    }
    
    public function forgot_password()
    {
        $credentials = request()->validate(['email' => 'required|email']);
        $password = Password::sendResetLink($credentials);
        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }
}
