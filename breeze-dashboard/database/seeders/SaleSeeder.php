<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $months = [
            '2024-01-15',
            '2024-02-15',
            '2024-03-15',
            '2024-04-15',
            '2024-05-15',
            '2024-06-15',
            '2024-07-15',
            '2024-08-15',
            '2024-09-15',
            '2024-10-15',
            '2024-11-15',
            '2024-12-15',
        ];

        foreach ($months as $date) {
            Sale::create([
                'amount'    => rand(200, 1500),
                'sale_date' => $date,
            ]);
        }
    }
}