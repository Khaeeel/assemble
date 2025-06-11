<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('health_records', function (Blueprint $table) {
        $table->string('other_purpose')->nullable();
    });
}

public function down()
{
    Schema::table('health_records', function (Blueprint $table) {
        $table->dropColumn('other_purpose');
    });
}

};
