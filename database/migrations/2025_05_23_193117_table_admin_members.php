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
        Schema::create('table_admin_members', function (Blueprint $table) {
            $table->id();
            $table->string('memberName',255)->nullable();
            $table->string('memberEmail',255)->nullable();
            $table->string('memberMobile',255)->nullable();
            $table->string('memberCity',255)->nullable();
            $table->integer('memberChapter');
             $table->string('status',100)->default('inactive');
             $table->string('progressStatus',100)->default('pending');
             $table->string('otpCode',255)->nullable();
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
        Schema::dropIfExists('table_admin_members');
    }
};