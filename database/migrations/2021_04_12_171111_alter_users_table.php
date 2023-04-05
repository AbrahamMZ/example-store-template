<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_number')->nullable();
            $table->foreignId('agency_id')->index();
            $table->foreignId('dapartment_id')->index();
            $table->string('job')->nullable();
            $table->text('phones')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->dateTime('birth')->nullable();
            $table->dateTime('employment_start_date')->nullable();
            $table->dateTime('employment_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
