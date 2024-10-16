<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
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
      return response()->json(['message' => 'Reset password link sent on your email.']);
    }
}
