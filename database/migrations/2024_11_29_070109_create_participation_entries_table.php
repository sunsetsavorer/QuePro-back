<?php

use App\Models\Tournament;
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
        Schema::create('participation_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tournament::class);
            $table->string('team_name');
            $table->string('captain_fullname');
            $table->string('captain_phone');
            $table->string('captain_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participation_entries');
    }
};
