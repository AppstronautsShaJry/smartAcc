<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->nullable()->constrained('parties')->onDelete('set null');
            $table->decimal('amount', 10, 2);
            $table->string('trans_type', 20)->default('Pay');
            $table->string('payment_method');
            $table->string('bill_no');
            $table->text('desc');
            $table->dateTime('date')->useCurrent();
            $table->longText('image')->nullable();
            $table->string('active_id', 20)->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
