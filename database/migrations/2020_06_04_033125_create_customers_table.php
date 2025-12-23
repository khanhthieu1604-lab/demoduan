<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('phone_number');
            $table->string('images')->nullable();
            $table->string('id_image_f')->nullable();
            $table->string('id_image_b')->nullable();
            $table->string('driver_license');
            $table->string('id_card');
            $table->string('passport')->nullable();
            $table->enum('customer_status', ['Verifying', 'Accepted', 'Rejected'])->default('Verifying');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->integer('company_id')->unsigned()->nullable();
            // $table->foreign('vihicle_id')->references('id')->on('vihicles')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
