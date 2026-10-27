<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('phone');
            $table->string('governorate');
            $table->string('city');
            $table->text('address');
            $table->string('address_details')->nullable();
            $table->text('notes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'phone',
                'governorate',
                'city',
                'address',
                'address_details',
                'notes',
            ]);
        });
    }
};
