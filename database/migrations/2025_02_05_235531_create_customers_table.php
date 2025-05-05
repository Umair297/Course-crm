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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('gdc_number')->nullable();
            $table->text('contact')->nullable();
            $table->text('course_date')->nullable();
            $table->text('email_address')->nullable();
            $table->text('on_portal')->nullable();
            $table->text('design')->nullable();
            $table->text('refine')->nullable();
            $table->text('direct')->nullable();
            $table->text('inDirect')->nullable();
            $table->text('styloso')->nullable();
            $table->text('flo')->nullable();
            $table->text('solo')->nullable();
            $table->text('align')->nullable();
            $table->text('follow_up')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
