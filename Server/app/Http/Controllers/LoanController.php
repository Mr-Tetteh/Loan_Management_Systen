<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    public function allloans()
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

//        $loan = Loan::create([
//            'user_id' => Auth::id(),
//            'amount' => $request->amount,
//            'purpose' => $request->purpose,
//        ]);
//        return new LoanResource($loan);


        $loan = Auth::user()->loans()->create($request->validated());
        return new LoanResource($loan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
