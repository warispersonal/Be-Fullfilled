<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Storage;
use Str;
use Validator;

class RegisterController extends Controller
{

    public function register(UserRequest $request)
    {
        $image_64 = $request->profile; //your base64 encoded data

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',')+1);

        $image = str_replace($replace, '', $image_64);

        $image = str_replace(' ', '+', $image);

        $imageName = Str::random(10).'.'.$extension;

        Storage::disk('public')->put($imageName, base64_decode($image));
        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $request['profile'] = $imageName;
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return $this->success("Registration successfull" , $response);
    }

    public function profile()
    {
        $user = Auth::user();
        return $this->success('User Profile',new UserResource($user));
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return $this->success('You have been successfully logged out!');
    }

    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);
        Password::sendResetLink($credentials);
        return $this->success('Reset password link sent on your email id.');
    }

    public function reset(ResetPasswordRequest $request)
    {
        $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->failure('Token invalid');
        }
        return $this->success('Password has been successfully changed');
    }


    public function resetPassword(ResetPasswordRequest $request)
    {
        if(RecordExistsController::isUserEmailCellExists($request->user)){
            $user = User::where('email', $request->user)->orWhere('phone_number', $request->user)->get()->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return $this->success('Password has been successfully changed');
        }
        else{
            return $this->failure('Sorry, This user is not exist in our system', 404);
        }
    }
}