
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_reference')->nullable()->unique();
            $table->string('payment_transaction_id')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('stock_released_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropUnique(['payment_reference']);

            $table->dropColumn([
                'payment_reference',
                'payment_transaction_id',
                'paid_at',
                'stock_released_at',
            ]);
        });
    }
};
