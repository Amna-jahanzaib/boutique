<?php

use App\Models\Customer;
use App\Models\Order;
use App\Models\Vendor;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class);
            $table->foreignIdFor(Vendor::class);
            $table->foreignIdFor(Customer::class);
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
