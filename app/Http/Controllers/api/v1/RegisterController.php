<?php

namespace App\Http\Controllers\api\v1;

use App\Address;
use App\Events\UserConfigurationEvent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Traits\Generic;
use App\Http\Traits\RespondsWithHttpStatus;
use App\Http\Traits\ValidationTraits;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RegisterController extends Controller
{

    use Generic, RespondsWithHttpStatus;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'profile' => 'required',
            'phone_number' => 'required|min:13|max:13|unique:users',
            'city' => 'required',
            'zipcode' => 'required|min:5|max:5',
            'street_address' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $image_64 = $request->profile;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
            if ($extension != "jpeg" || $extension != "jpg" || $extension != "png") {
                $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                $image = str_replace($replace, '', $image_64);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10) . '.' . $extension;
                Storage::disk('public')->put($imageName, base64_decode($image));
                $user = new User();
                $user->email = $request->email;
                $user->name = $request->name;
                $user->password = Hash::make($request['password']);
                $user->phone_number = $request->phone_number;
                $user->city = $request->city;
                $user->zipcode = $request->zipcode;
                $user->street_address = $request->street_address;
                $user->profile = $imageName;
                $user->remember_token = Str::random(10);
                $user->save();
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];

                $address = new Address();
                $address->city = $request->city ?? "";
                $address->zip_code = $request->zipcode ?? "";
                $address->street_address = $request->street_address ?? "";
                $address->user_id = $user->id;
                $address->save();


                event(new UserConfigurationEvent($user));

                return $this->success("Registration successful", $response);
            } else {
                return $this->failure('Only jpeg, jpg, png file required', 404);
            }
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return $this->success('User Profile', new UserResource($user));
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            if (RecordExistsController::isUserEmailCellExists($request->user)) {
                $user = User::where('email', $request->user)->orWhere('phone_number', $request->user)->get()->first();
                $user->password = Hash::make($request->password);
                $user->save();
                return $this->success('Password has been successfully changed');
            } else {
                return $this->failure('Sorry, This user is not exist in our system', 404);
            }
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return $this->success('You have been successfully logged out!');
    }

    public function users()
    {
        $users = User::all();
        return $this->success('You have been successfully logged out!', $users);
    }

    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:6',
            'phone_number' => 'required|min:13|max:13|unique:users,phone_number,' . Auth::id(),
            'city' => 'required',
            'zipcode' => 'min:5|max:5',
            'street_address' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {

            $user = Auth::user();

            $user->name = $request->name;
            $user->email = $request->email;
            if (!empty($request->password)) {
                $user->password = $request->password;
            }
            if (!empty($request->profile)) {
                if (Auth::user()->profile != $request->file) {

                    $image_64 = $request->profile;
                    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
                    if ($extension != "jpeg" || $extension != "jpg" || $extension != "png") {
                        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                        $image = str_replace($replace, '', $image_64);
                        $image = str_replace(' ', '+', $image);
                        $imageName = Str::random(10) . '.' . $extension;
                        Storage::disk('public')->put($imageName, base64_decode($image));
                        $user->profile = $imageName;

                    } else {
                        return $this->failure('Only jpeg, jpg, png file required', 404);
                    }
                }
            }
            $user->phone_number = $request->phone_number;
            $user->city = $request->city;
            $user->zipcode = $request->zipcode;
            $user->street_address = $request->street_address;
            $user->social_account_profile_image_url = null;
            $user->save();

            return $this->success('User Profile Updated', new UserResource($user));
        }
    }

    public function verifyToken(Request $request)
    {
        if (Auth::guard('api')->check()) {
            return response([
                'status' => true,
                'message' => "Token valid"
            ]);
        }
        return response([
            'status' => false,
            'message' => "Token in-valid"
        ]);
    }
}

