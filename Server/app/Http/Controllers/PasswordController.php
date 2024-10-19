<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $email = $request->input('email');
        $token = Str::random(20);

        DB::table('password_reset')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('Rest', ['token' => $token], function (Message $message) use ($email) {
            $message->subject('Reset your Password');
            $message->to($email);
        });
        return response()->json(['message' => 'A Reset password link sent on your email. Please check your inbox to update your password.']);
    }


    public function resetPassword(Request $request)
    {
        if ($request->input('password') !== $request->input('confirm_password')) {
            return response()->json(['message' => 'Passwords not match.'], 400);
        }

        $passwordReset = DB::table('password_reset')
            ->where('token', $request->input('token'))
            ->first();

        if (!$passwordReset) {
            return response()->json([
                'message' => 'Invalid token.'
            ], 404);
        }


        if (Carbon::parse($passwordReset->created_at)->addHour()->isPast()) {
            DB::table('password_reset')->where('token', $request->input('token'))->delete();

            return response()->json([
                'message' => 'Token has expired.'
            ], 400);
        }



        $passwordReset = DB::table('password_reset')->where('token', $request->input('token'))->first();

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Sorry User not found'
            ], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response()->json([
            'message' => 'Password reset successfully.'
        ]);
    }
}
