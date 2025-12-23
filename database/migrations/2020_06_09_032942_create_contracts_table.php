<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vihicle_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('company_id')->unsigned();

            $table->string('pickup_location');
            $table->string('location_togo');
            $table->string('location_dropoff_vihicle')->default('Drop-off pick-up location');

            // $table->date('pickup_time');
            // $table->date('dropoff_time');
            // $table->timestamp('pickup_time')->default('current_timestamp()');
            // $table->timestamp('dropoff_time')->default('current_timestamp()');
            $table->dateTime('pickup_time');
            $table->dateTime('dropoff_time');

            $table->string('driver_status')->nullable()->default('NULL');

            $table->enum('contract_status', ['Verifying', 'Deposit', 'Rejected', 'Deposited', 'Delivery', 'Rentaling', 'Return', 'Cancel', 'Finish'])->default('Verifying');

            $table->foreign('vihicle_id')->references('id')->on('vihicles')->onDelete('cascade');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

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
        Schema::dropIfExists('contracts');
    }
}
