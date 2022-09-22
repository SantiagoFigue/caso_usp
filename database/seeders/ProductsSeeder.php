<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'Azucar',
                'description' => 'Bolsa de azucar',
                'unit_measurement' => 'Kg',
                'tax' => '5',
                'cost'=> '30',
                'existence' => '50',
                'image'=>'storage/2hjc9pQCjjQVELydVp3AwrhYaMXXAo3AucvVA0fk.pdf'
            ],
            [
                'name' => 'Agua',
                'description' => 'Botella de agua',
                'unit_measurement' => 'Lt',
                'tax' => '3',
                'cost'=> '10',
                'existence' => '50',
                'image'=>'storage/2hjc9pQCjjQVELydVp3AwrhYaMXXAo3AucvVA0fk.pdf'
            ]
        ]);
    }
}
