<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('health_records', function (Blueprint $table) {
            // Make visit_purpose column nullable
            $table->string('visit_purpose')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('health_records', function (Blueprint $table) {
            // Revert visit_purpose column to NOT nullable (if you want)
            $table->string('visit_purpose')->nullable(false)->change();
        });
    }
};
