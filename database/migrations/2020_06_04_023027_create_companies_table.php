<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('company_name');
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->string('address_number');
            $table->string('address_ward');
            $table->string('address_district');
            $table->string('address_city')->default('Ho Chi Minh');
            $table->string('address_country')->default('Viet Nam');
            $table->string('tax_code')->nullable();
            $table->string('phone_number');
            $table->string('hotline')->nullable();
            $table->string('fax')->nullable();
            $table->string('email');
            $table->enum('company_status', ['Operating', 'Closed'])->default('Operating');

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
        Schema::dropIfExists('companies');
    }
}
