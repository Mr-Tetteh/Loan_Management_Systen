<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use App\Http\Resources\LoanResource;
use App\Http\Resources\PaymentsResource;
use App\Models\Loan;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $loan = Loan::where('user_id', $user->id)->first();
        return PaymentsResource::collection(Payments::where('loan_id', $request->payment)->get());

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
        $pay = Payments::find($request->id);
        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found'
            ], 400);
        }
        $loan = $loan->load('payments');
        $total_currently_pay = $loan->payments->sum('amount_to_pay');
        $total_pay = $total_currently_pay + $request['amount_to_pay'];

        $payment = Payments::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'amount_to_pay' => $request->amount_to_pay,
            'date' => $request->date,
            'amount_remaining' => $loan->amount - $total_pay,

        ]);
        $loan->isPaid = $loan->amount - $total_pay == 0;
        if ($loan->isPaid) {
            $loan->status = 'paid';
        }
        $loan->amount_paid = $total_pay;
        $loan->save();
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
