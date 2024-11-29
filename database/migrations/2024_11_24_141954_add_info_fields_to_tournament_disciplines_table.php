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
        Schema::table('tournament_disciplines', function (Blueprint $table) {
            $table->string('hex_color');
            $table->string('icon_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournament_disciplines', function (Blueprint $table) {
            $table->dropColumn([
                'hex_color',
                'icon_path',
            ]);
        });
    }
};
