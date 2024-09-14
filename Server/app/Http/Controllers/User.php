<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
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
        return \App\Models\User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'other_names' => $request->input('other_names'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'DOB' => $request->input('DOB'),
            'salary' => $request->input('salary'),
            'national_id' => $request->input('national_id'),
            'user_type' => UserTypeEnum::USER,
            'nationality' => $request->input('nationality')
        ]);

    }

    public function userRepository()
    {
//        return Auth::user();

    }

    public function login(array $credentials)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->getByEmailOrPhone($credentials['identifier']);

            if (!$user || Hash::check($credentials['password'], $user->password)) {
                return ApiResponse::unauthorizedError('Invalid credentials');
            }

            DB::commit();
            return ApiResponse::success('Login Successful', [
                'user' => new AuthUserResource($user),
                'authorisation' => [
                    'type' => 'Bearer',
                    'token' => $user->createToken($user->email ?? $user->phone)->plainTextToken,
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            GeneralHelpers::errorLogger($th, 'Login failed');
            return ApiResponse::serverError('Login failed');
        }
    }

//        if (!Auth::attempt($request->only('email', 'password'))) {
//            return response([
//                "message" => 'Invalid Credentials'
//            ], Response::HTTP_UNAUTHORIZED);
//        } else {
//            $user = Auth::user();
//            $token = Auth()->user()->createToken('token')->plainTextToken;
//            $cookie = cookie('jwt', $token, 60 * 24);
//            return response([
//                'message' => 'Success',
//            ]);
//        }
//    }


//    public function logout()
//    {
//        $cookie = \Illuminate\Support\Facades\Cookie::forget('jwt');
//        return response([
//            'message' => 'Success'
//        ])->withCookie($cookie);
//    }


}


