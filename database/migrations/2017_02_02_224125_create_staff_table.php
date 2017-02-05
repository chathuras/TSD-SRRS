<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
						$table->string('reg_id')->unique();
						$table->integer('pin')->unsigned();
            $table->string('name');
            $table->dateTime('date_of_birth');
						$table->string('address');
						$table->string('email_address');
						$table->string('contact_number');
						$table->string('post');
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
        Schema::drop('staff');
    }
}
