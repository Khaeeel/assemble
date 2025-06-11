<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SplitNameIntoFirstLastInHealthRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('health_records', function (Blueprint $table) {
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->dropColumn('name'); // Remove the old full name column
        });
    }

    public function down()
    {
        Schema::table('health_records', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->string('name')->nullable(); // Restore old name column
        });
    }
}
