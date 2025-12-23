<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVihiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vihicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vihicle_name');
            $table->string('vihicle_price');
            $table->string('vihicle_deposit');
            // $table->longText('image')->nullable();
            $table->json('vihicle_images');
            $table->string('license_plate')->nullable();
            $table->tinyInteger('number_chair');
            $table->string('size')->nullable();
            $table->string('engine')->nullable();
            $table->string('cylinder_capacity')->nullable();
            $table->string('maximum_power')->nullable();
            $table->string('maximum_torque')->nullable();
            $table->string('gearbox')->nullable();
            $table->string('color')->nullable();
            $table->string('weight')->nullable();
            $table->string('year_manufacture')->nullable();
            $table->string('register_time')->nullable();
            $table->enum('vihicle_status', ['Wait', 'Deposited', 'Delivered', 'Rentaled', 'Checking', 'Broken'])->default('Wait');

            $table->integer('company_id')->unsigned();
            // $table->integer('contract_id')->unsigned();
            $table->integer('brand_id')->unsigned();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

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
        Schema::dropIfExists('vihicles');
    }
}
