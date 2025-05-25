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
        Schema::create('table_admin_candidate', function (Blueprint $table) {
            $table->id();
            $table->integer('nomineeId')->nullable();
            $table->string('candidateName',255)->nullable();
            $table->string('candidatePhone',255)->nullable();
            $table->string('candidateCity',255)->nullable();
            $table->string('candidateChaptername',255)->nullable();
            $table->string('candidatePicture',255)->nullable();
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
        Schema::dropIfExists('table_admin_candidate');
    }
};