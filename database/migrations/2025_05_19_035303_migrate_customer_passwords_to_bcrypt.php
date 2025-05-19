<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // Ambil semua customer
        $customers = DB::table('customers')->select('id', 'password')->get();

        foreach ($customers as $customer) {
            $password = $customer->password;

            // Cek apakah password sudah menggunakan Bcrypt (biasanya 60 karakter dan diawali dengan $2y$)
            if (strlen($password) !== 60 || !str_starts_with($password, '$2y$')) {
                // Update password ke versi Bcrypt
                DB::table('customers')
                    ->where('id', $customer->id)
                    ->update([
                        'password' => Hash::make($password)
                    ]);
            }
        }
    }

    public function down(): void
    {
        // Tidak bisa rollback ke password sebelumnya karena sudah di-hash ulang
    }
};
