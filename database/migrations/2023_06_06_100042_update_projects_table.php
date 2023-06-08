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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('cover')->nullable();
            $table->string('link')->nullable();
            $table->string('code_link')->nullable();
            $table->text('trace')->nullable();     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('cover');
            $table->dropColumn('link');
            $table->dropColumn('code_link');
            $table->dropColumn('trace');
        });
    }
};