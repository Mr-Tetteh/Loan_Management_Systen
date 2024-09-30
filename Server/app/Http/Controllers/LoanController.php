<?php

namespace App\Http\Controllers;

use App\Enums\LoanStatusEnum;
use App\Enums\UserTypeEnum;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $loans = Loan::where('user_id', auth()->id())->get();
//        return response()->json([
//            'loans' => $loans
//        ]);
        return LoanResource::collection(Loan::where('user_id', auth()->id())->get());
    }

    public function all_loans()
    {
        return LoanResource::collection(Loan::all());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function loan(Request $request)
    {
//        Loan::create([
//            'purpose' => $request->input('purpose'),
//            'amount' => $request->input('amount')
//        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {

        $user = Auth::user()->id;
        if (Loan::all()->where('user_id', $user)->first()) {
            return response()->json(['message' => 'Please Pay your previous Loan to make you eligible for a new loan.'], 400);
        }elseif ($request->monthly_payment < 500){
            return response()->json(['message' => 'Minimum payment for a month is GHC 500.'], 400);
        }elseif ($request->monthly_payment > $request->amount){
            return response()->json(['message' => 'Monthly payment can not be greater than loan amount'], 400);
        }
//        elseif ($request->amount > $user->salary){
//            return response()->json(['message' => 'You can not request a loan greater than your Gross salary'], 400);
//        }

        $loan = Loan::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'monthly_payment' => $request->monthly_payment,
            'purpose' => $request->purpose,
        ]);

        return new LoanResource($loan);


//        $loan = Auth::user()->loans()->create($request->validated());
//        return new LoanResource($loan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return new LoanResource($loan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanRequest $request, Loan $loan)
    {
//        $loan = Loan::update([
//           "status" => $request->status,
//        ]);
//        $loan->update($request->validated());
        $loan->update([
           'status' => $request->status,
            'amount_remaining' => $request->amount_remaining
        ]);
        return new LoanResource($loan);
    }
    public function payment(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update([
           'amount_remaining' => $request->amount_remaining
        ]);
        return new LoanResource($loan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
    }
}
