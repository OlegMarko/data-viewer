<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Customer;
use Carbon\Carbon;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Customer::truncate();

        $customers = [];
        foreach (range(1, 100) as $i) {
            $customers[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'phome' => $faker->phoneNumber,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        if (count($customers))
            Customer::insert($customers);
    }
}
