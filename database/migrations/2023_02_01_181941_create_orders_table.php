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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('u_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('adress')->nullable();
            $table->string('u_id')->nullable();
            $table->string('postal_code')->nullable();

            $table->string('paymet_status')->nullable();
            $table->string('deliver_status')->nullable();




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
        Schema::dropIfExists('orders');
    }
};
