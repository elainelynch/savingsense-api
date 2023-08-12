<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return Transaction::all();
        // return TransactionResource::collection(Transaction::all());
        // return TransactionResource::collection(Transaction::where('type', $request->type)->get()
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
