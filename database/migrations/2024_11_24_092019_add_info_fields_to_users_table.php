<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->default('');
            $table->string('city')->default('');
            $table->string('country')->default('');
            $table->string('bio')->default('');
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
            $table->dropColumn([
                'phone',
                'city',
                'country',
                'bio',
            ]);
        });
    }
};
