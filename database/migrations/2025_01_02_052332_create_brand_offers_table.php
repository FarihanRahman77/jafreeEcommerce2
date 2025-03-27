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
        Schema::create('brand_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('brand_id');
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->string('image')->nullable();
            
           
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->enum('deleted',['Yes','No'])->nullable();
            $table->datetime('created_date')->nullable();
            $table->biginteger('created_by')->nullable();
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
        Schema::dropIfExists('brand_offers');
    }
};
