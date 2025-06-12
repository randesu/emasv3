<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddEnumValuesToTransactionsV2Status extends Migration
{
    public function up()
    {
        // Tambahkan nilai enum baru ke tipe enum status
        DB::statement("ALTER TYPE status ADD VALUE IF NOT EXISTS 'sedang dibungkus'");
        DB::statement("ALTER TYPE status ADD VALUE IF NOT EXISTS 'sedang dikirim'");
    }

    public function down()
    {
        // PostgreSQL tidak mendukung menghapus nilai enum, jadi bagian ini kosong
    }
}
