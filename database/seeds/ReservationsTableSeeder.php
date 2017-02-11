<?php

use App\Reservations;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Schema::disableForeignKeyConstraints();
        Reservations::truncate();
        Schema::enableForeignKeyConstraints();

        $reservations = [];

/*  $table->increments('id');
            $table->integer('resource_id')->unsigned();
            $table->foreign('resource_id')->references('id')->on('resources');
            $table->string('name');
						$table->string('address');
						$table->string('nic_number');
						$table->string('conact_number');
						$table->string('email_address');
						$table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps(); */				
				
        for ($i = 0; $i < 10; $i++) {
            array_push($reservations, [
              'resource_id' => $faker->numberBetween(1, 10), //ucfirst($faker->word),
              'user_id' => $faker->numberBetween(1, 10),
              'purpose' => $faker->sentence(2), //ucfirst($faker->word),
              'name' => ucfirst($faker->word),
              'address' => $faker->sentence(2),
              'nic_number' => $faker->word,
              'conact_number' => $faker->numberBetween(1, 1000),
              'email_address' => $faker->word,
              'start' => $faker->dateTimeBetween('now', '+3 hours'),
              'end' => $faker->dateTimeBetween('+3 hours', '+4 hours'),
              'created_at' => gmdate('Y-m-d H:i:s'),
              'updated_at' => gmdate('Y-m-d H:i:s')
            ]);
        }
        Reservations::insert($reservations);
    }
}
