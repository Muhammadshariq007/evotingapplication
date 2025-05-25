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
        Schema::create('table_admin_setup', function (Blueprint $table) {
            $table->id();
            $table->string('companyName',255)->nullable();
            $table->string('companyLogo',255)->nullable();
             $table->dateTime('votingstart')->nullable();
             $table->dateTime('votingend')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_admin_setup');
    }
};