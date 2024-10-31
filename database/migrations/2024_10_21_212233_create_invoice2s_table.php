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
        Schema::create('invoice2s', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('invoice_num');
            $table->string('rte_vat');
            $table->string('status');
            $table->string('section');
            $table->integer('value_status');//for search
            $table->decimal('amount_collection');
            $table->decimal('amount_commission');
            $table->decimal('discount');
            $table->decimal('value_vat');
            $table->decimal('total');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->text('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice2s');
    }
};
