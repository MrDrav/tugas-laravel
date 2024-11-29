<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTypeToUsersTable extends Migration // Changed class name
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) { // Changed create to table
            if (!Schema::hasColumn('users', 'user_type')) {
                $table->string('user_type')->default('user');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) { // Changed dropIfExists to table
            if (Schema::hasColumn('users', 'user_type')) {
                $table->dropColumn('user_type');
            }
        });
    }
}
