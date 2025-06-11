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
        Schema::create('health_records', function (Blueprint $table) {
        $table->id();                          // Auto-increment primary key
        $table->string('name');               // Patient name
        $table->integer('age');               // Patient age
        $table->string('address');            // Patient address
        $table->string('visit_purpose');      // Reason for visit
        $table->string('given_medicine')->nullable(); // Optional field
        $table->timestamps();                 // created_at and updated_at
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
