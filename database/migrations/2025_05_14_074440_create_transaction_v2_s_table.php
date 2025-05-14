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
        Schema::create('transactionsV2', function (Blueprint $table) {
        $table->id();
        $table->string('invoice');
        $table->unsignedBigInteger('pembeli_id');
        $table->integer('weight');
        $table->text('address');
        $table->decimal('total', 8, 2);
        $table->enum('status', ['pending', 'success', 'expired', 'failed'])->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_v2_s');
    }
};
