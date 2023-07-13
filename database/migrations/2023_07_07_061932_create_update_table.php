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
          Schema::create('update', function (Blueprint $table) {
               $table->id();
               $table->string('fullname');
               $table->string('contact_number');
               $table->string('email_address')->unique();
               $table->string('address')->nullable();
               $table->string('name_of_document');
               $table->text('short_description');
               $table->text('purpose');
               $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update');
    }
};
