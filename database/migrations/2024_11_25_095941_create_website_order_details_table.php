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
        Schema::create('website_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('order_id')->nullable();
            $table->biginteger('product_id')->nullable();
            $table->biginteger('quantity')->nullable();
           
            $table->enum('status',['Pending','Seen','Cancelled','Completed'])->default('Pending');
            $table->enum('deleted',['Yes','No'])->nullable();
            $table->datetime('order_datetime')->nullable();
            $table->biginteger('updated_by')->nullable();
            $table->datetime('updated_date')->nullable();
            $table->biginteger('deleted_by')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_order_details');
    }
};
