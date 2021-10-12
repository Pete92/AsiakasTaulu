<?php

namespace Database\Seeders;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();
        $faker = \Faker\Factory::create();


        for($i = 0; $i < 10; $i++)  //looppi joka tekee 10 kertaa uuden talennuksen tietokantaan, syöttäen random dataa.
        {
            Client::Create([
                'class' => $faker->regexify('[A-D]{1}'),
                'fName' => $faker->firstName,
                'lName' => $faker->lastName,
                'email' => $faker->email,
                'address' => $faker->address,
                'city' => $faker->city,
                'zipCode' => $faker->postcode,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
