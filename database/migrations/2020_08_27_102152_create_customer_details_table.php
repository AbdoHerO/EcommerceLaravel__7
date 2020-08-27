<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('company_name')->nullable();
            $table->string('phone');
            $table->text('email');
            $table->text('country')->nullable();
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->text('town')->nullable();
            $table->text('district')->nullable();;
            $table->text('post_code');
            $table->text('other_notes')->nullable();
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
        Schema::dropIfExists('customer_details');
    }
}
