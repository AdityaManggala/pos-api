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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('SupplierId');
            $table->string('SupplierName', 100);
            $table->string('ContactName', 100);
            $table->string('AddressName');
            $table->string('City', 100);
            $table->string('PostalCode', 10);
            $table->string('Country', 50);
            $table->string('Phone', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};