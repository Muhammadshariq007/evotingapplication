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
        Schema::create('table_admin_ballotpaper', function (Blueprint $table) {
            $table->id();
            $table->integer('nomineeId');
            $table->string('candidateId',255)->nullable();
            $table->integer('memberId');
            $table->string('status',100)->default('active');
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
         Schema::dropIfExists('table_admin_ballotpaper');
    }
};