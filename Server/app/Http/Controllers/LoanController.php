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


    public function pendingLoans()
    {
        $totalPendingLoans = Loan::where('status', 'pending')->count();
        return response()->json(['total' => $totalPendingLoans]);
    }

    public function approvedLoans()
    {
        $totalApprovedLoans = Loan::where('status', 'approved')->count();
        return response()->json(['total' => $totalApprovedLoans]);
    }

    public function rejectedLoans()
    {
        $totalRejectedLoans = Loan::where('status', 'rejected')->count();
        return response()->json(['total' => $totalRejectedLoans]);

    }

    public function loanss(Loan $loan)
    {
        return LoanResource::collection(Loan::with('user')->latest()->get());
    }

    public function activeLoans(Loan $loan)
    {
        $active = Loan::with('user')->where('isPaid', false)->where('status', 'approved')->latest()->get();
        return LoanResource::collection($active);
    }

    public function completeLoans(Loan $loan)
    {
        $compeleted = Loan::with('user')->where('isPaid', true)->where('status', 'paid')->latest()->get();
        return LoanResource::collection($compeleted);
    }

    public function LoansPending(Loan $loan)
    {
        $pending = Loan::with('user')->where('isPaid', false)->where('status', 'pending')->latest()->get();
        return LoanResource::collection($pending);
    }



    public function all_loans()
    {
        return LoanResource::collection(Loan::with('user')->latest()->get());

//        return LoanResource::collection(Loan::all());

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
        $user = Auth::user();
//        $loan_pay = Loan::find($request->$user->id)->where('isPaid', false)->first();
        if (Loan::where('user_id', $user->id)->where('isPaid', false )->first()) {
//        if (Loan::where('user_id', $user->id)->first()) {
            return response()->json(['message' => 'Please Pay your previous Loan to make you eligible for a new loan.'], 400);
        } else if ($request->monthly_payment < 500) {
            return response()->json(['message' => 'Minimum payment for a month is GHC 500.'], 400);
        } elseif ($request->monthly_payment > $request->amount) {
            return response()->json(['message' => 'Monthly payment can not be greater than loan amount'], 400);
        } elseif ($request->amount > $user->salary) {
            return response()->json(['message' => 'You can not request a loan greater than your Gross salary'], 400);
        }
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
