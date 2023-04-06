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
        Schema::create('stocks', function (Blueprint $table) {
          
            $table->id();
            $table->string('productName');
            $table->string('barcodeNo')->unique();
            $table->integer('stocksQuantity');
            $table->float('purchasePrice');
            $table->float('salePrice');
            $table->timestamp('invoiceDate');
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
