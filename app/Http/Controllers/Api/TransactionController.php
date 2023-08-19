<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionStoreRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return Transaction::all();
        // return TransactionResource::collection(Transaction::all());
        // return TransactionResource::collection(Transaction::where('category', $request->category)->get()
        // );

        $query = Transaction::query();

        if ($request->type) {
            $query->where('type', $request->type);
        } 

        if ($request->category) {
            $query->where('category', $request->category);
        } 

        return TransactionResource::collection($query->get());
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionStoreRequest $request)
    {
        return TransactionResource::make(
            Transaction::create([
                'type' => $request->type,
                'category' => $request->category,
                'amount' => $request->amount,
                'date' => Carbon::parse(strtotime($request->date)),
                'note' => $request->note,
                'user_id' => $request->userId
            ])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return TransactionResource::make($transaction);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction)
    {
        if (isset($request->type)) {
            $transaction->type = $request->type;
        }

        if (isset($request->category)) {
            $transaction->category = $request->category; 
        }

        if (isset($request->amount)) {
            $transaction->amount = $request->amount; 
        }

        if (isset($request->date)) {
            $transaction->date = $request->date; 
        }

        if (isset($request->note)) {
            $transaction->note = $request->note; 
        }

        $transaction->save();

        return TransactionResource::make($transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // return $transaction;
         $transaction->delete();
         return response()->json([
             'success' => true,
             'message' => 'Successfully deleted'
         ]);
    }
}
