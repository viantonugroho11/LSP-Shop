<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranscationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcations', function (Blueprint $table) {
            $table->string('id');
            $table->string('va_number')->default('null');
            $table->string('status');
            $table->integer('quantity');
            $table->string('transcation_id')->nullable();
            $table->string('user_id');
            $table->string('address')->nullable();
            $table->integer('total_price')->default(0);
            $table->string('pdf')->default('null');
            $table->string('courier')->nullable();
            $table->string('courier_service')->nullable();
            $table->string('courier_tracking_number')->nullable();
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
        Schema::dropIfExists('transcations');
    }
}
