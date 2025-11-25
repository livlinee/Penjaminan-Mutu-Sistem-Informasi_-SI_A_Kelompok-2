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
        Schema::table('admin', function (Blueprint $table) {
            // Kita ubah kolom password agar bisa menyimpan hash bcrypt
            $table->string('password', 255)->change();

            // Kita tambahkan kolom-kolom yang wajib ada
            $table->string('email')->unique()->nullable()->after('nama_lengkap');
            $table->timestamp('email_verified_at')->nullable()->after('email');
            $table->rememberToken()->after('password');
            $table->timestamps(); // Menambah created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
