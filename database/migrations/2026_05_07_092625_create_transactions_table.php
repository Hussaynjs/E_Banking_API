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
            $table->string('reference')->index('transaction_reference_index');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('account_id')->nullable()->constrained('accounts');
            $table->foreignId('transfer_id')->nullable()->constrained('transfers');
            $table->string('balance');
            $table->string('category');
            $table->boolean('comfirmed')->default(false);
            $table->decimal('amount', 16, 4);
            $table->dateTime('date');
            $table->text('meta')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
