<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['income', 'expense']);
            $table->enum('category',['income', 'food and drink', 'electric bill', 'water bill', 'rent', 'transportation', 'study', 'beauty', 'health', 'entertainment', 'debt payments', 'personal care', 'gifts and donations', 'insurance', 'miscellaneous', 'utilities', 'pets', 'subscriptions', 'home improvement', 'vacation and travel', 'clothing', 'electronic and gadgets'  ]);
            $table->integer('amount');
            $table->timestamp('date')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
