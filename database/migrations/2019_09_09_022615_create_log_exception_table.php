<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogExceptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_exception', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('site', ['frontend', 'backend']);
            $table->integer('status_code');
            $table->integer('code');
            $table->string('class_name')->nullable();
            $table->string('file')->nullable();
            $table->integer('line');
            $table->string('url');
            $table->string('message');
            $table->json('traces');
            $table->string('ip', 50);
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
        Schema::dropIfExists('log_exception');
    }
}
