<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('last_name');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->string('username')->unique();
            $table->boolean('admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn([
                'last_name','address','city','country','phone','username','admin'
            ]);
        });
    }
}
