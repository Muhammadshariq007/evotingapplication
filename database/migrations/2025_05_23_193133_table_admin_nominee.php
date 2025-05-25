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
        Schema::create('table_admin_nominee', function (Blueprint $table) {
            $table->id();
            $table->string('nomineeName',255)->nullable();
             $table->string('status',100)->default('inactive');
             $table->string('sorting',40)->nullable();
             $table->string('selectionStatus',100)->nullable();
             $table->string('selectionLimit',100)->nullable();
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
        Schema::dropIfExists('table_admin_nominee');
    }
};