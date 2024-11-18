<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::latest()->get());
    }

    public function total_number_of_users()
    {
        return response()->json(['total' => User::count()]);
    }

    public function deleted_users()
    {
        return UserResource::collection(User::onlyTrashed()->latest()->get());
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return response()->json(['message' => 'User restored successfully.']);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_names' => $request->other_names,
            'email' => $request->email,
            'salary' => $request->salary,
            'phone' => $request->phone,
            'country' => $request->country,
            'date_of_birth' => $request->date_of_birth,
            'nationality' => $request->nationality,
            'national_id' => $request->national_id,
            'user_type' => $request->user_type,
        ]);

        return new UserResource($user);
    }

    public function update_password(Request $request, User $user)
    {
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Old Password does not match'], 422);
        }
        $user->update([
            'password' => Hash::make($request->new_password)

        ]);

    }
     public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    public function register(Request $request)
    {
        return $request->all();
        if (User::all()->where('email', $request->email)->first()
        ) {
            return response()->json([
                "message" => "User already exists!",
            ], 422);
        }

        $user = \App\Models\User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'other_names' => $request->input('other_names'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'date_of_birth' => $request->input('date_of_birth'),
            'salary' => $request->input('salary'),
            'national_id' => $request->input('national_id'),
            'user_type' => UserTypeEnum::USER,
            'nationality' => $request->input('nationality')
        ]);
        return new UserResource($user);

    }

    public function admin_register(Request $request)
    {
        if (User::all()->where('email', $request->email)->first()
        ) {
            return response()->json([
                "message" => "User already exists!",
            ], 422);
        }

        $user = \App\Models\User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'other_names' => $request->input('other_names'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'date_of_birth' => $request->input('date_of_birth'),
            'salary' => $request->input('salary'),
            'national_id' => $request->input('national_id'),
            'user_type' => $request->input('user_type'),
            'nationality' => $request->input('nationality')
        ]);
        return new UserResource($user);
    }


    public function login(Request $request)
    {
//        DB::beginTransaction();
        try {
//            $user = $this->userRepository->getByEmailOrPhone($credentials['identifier']);
            $user = \App\Models\User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request['password'], $user->password)) {
//                return ApiResponse::unauthorizedError('Invalid credentials');
                return response()->json([
                    'message' => 'Sorry, Invalid Credentials.'
                ], 401);
            }

//            DB::commit();
//            return ApiResponse::success('Login Successful', [
//                'user' => new AuthUserResource($user),
//                'authorisation' => [
//                    'type' => 'Bearer',
//                    'token' => $user->createToken($user->email ?? $user->phone)->plainTextToken,
//                ]
//            ]);



            return response()->json([
                'message' => 'Success',
                'user' => $user,
                'authorisation' => [
                    'type' => 'Bearer',
                    'token' => $user->createToken($user->email ?? $user->phone)->plainTextToken,
                ]

            ]);


        } catch (\Throwable $th) {
//           DB::rollBack();
//         GeneralHelpers::errorLogger($th, 'Login failed');
//         return ApiResponse::serverError('Login failed');
            return \response()->json([
                'error' => "Something went wrong"
            ], 500);
        }

    }


    public function user()
    {
        return Auth::user();

    }


    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout'
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

    }


}


