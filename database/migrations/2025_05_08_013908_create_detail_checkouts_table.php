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
        Schema::create('detail_checkouts', function (Blueprint $table) {
                $table->id(id_detail);
                $table->integer('id_produk');
                $table->integer('total_beli');
                $table->integer('harga_produk');
                $table->integer('id_pembeli');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_checkouts');
    }
};
