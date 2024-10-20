<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use App\Http\Resources\LoanResource;
use App\Http\Resources\PaymentsResource;
use App\Mail\PaymentReceiptMail;
use App\Models\Loan;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $loan = Loan::where('user_id', $user->id)->first();
        return PaymentsResource::collection(Payments::where('loan_id', $request->payment)->latest()->get());

    }
public function payment_history(Request $request)
{
    return PaymentsResource::collection(Payments::where('loan_id', $request->payment)->latest()->get());
}
    public function History()
    {
        return PaymentsResource::collection(Payments::where('user_id', auth()->id())->where('amount_remaining', 0)->latest()->get());
//        return LoanResource::collection(Loan::where('user_id', auth()->id())->where('status', 'paid' 'rejected')->latest()->get());
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

    public function store(StorePaymentsRequest $request)
    {
        $loan = Loan::find($request->loan_id);
        if (!$loan) {
            return response()->json(['message' => 'Loan not found'], 400);
        }elseif ($loan->amount_paid + $request->amount_to_pay <= 0){
             return response()->json(['message' => 'Monthly Amount can not be greater than Amount Remaining'], 400);
         }
        $loan->load('payments');
        $total_currently_pay = $loan->payments->sum('amount_to_pay');
        $total_pay = $total_currently_pay + $request->amount_to_pay;

        $payment = Payments::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'amount_to_pay' => $request->amount_to_pay,
            'salary_for_the_month' => $request->salary_for_the_month,
            'date' => $request->date,
            'amount_remaining' => $loan->amount - $total_pay,
        ]);

        $loan->isPaid = $loan->amount - $total_pay == 0;
        $loan->status = $loan->isPaid ? 'paid' : $loan->status;
        $loan->amount_paid = $total_pay;
        $loan->save();

        Mail::to($loan->user->email)->send(new PaymentReceiptMail($payment, $loan));

        return new PaymentsResource($payment->load(['user', 'loan']));
    }



    /**
     * Display the specified resource.
     */
    public function show(Payments $payment)
    {
        return new PaymentsResource($payment);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentsRequest $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
