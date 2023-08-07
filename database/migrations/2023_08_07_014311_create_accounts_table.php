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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('account_type');
            $table->string('currency');
            $table->decimal('balance', 10, 2)->default(0.00);
            $table->date('opening_date');
            $table->date('closing_date')->nullable();
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->decimal('credit_limit', 10, 2)->nullable();
            $table->string('account_holder');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
