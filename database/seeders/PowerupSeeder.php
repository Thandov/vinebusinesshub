<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Powerup;


class PowerupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'powerid' => 'power1',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.487 1.746c0 4.192 3.592 1.66 4.592 5.754 0 .828 1 1.5 2 1.5s2-.672 2-1.5a1.5 1.5 0 0 1 1.5-1.5h1.5m-16.02.471c4.02 2.248 1.776 4.216 4.878 5.645C10.18 13.61 9 19 9 19m9.366-6h-2.287a3 3 0 0 0-3 3v2m6-8a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>',
                'name' => 'Website',
                'price' => 2,
            ],
            [
                'powerid' => 'power2',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 19h16m-8 0V5m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM4 8l-2.493 5.649A1 1 0 0 0 2.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L4 8Zm0 0V6m12 2-2.493 5.649A1 1 0 0 0 14.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L16 8Zm0 0V6m-4-2.8c3.073.661 3.467 2.8 6 2.8M2 6c3.359 0 3.192-2.115 6.012-2.793" />
                        </svg>',
                'name' => 'Accounting Services',
                'price' => 2,
            ],
            [
                'powerid' => 'power3',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h6m-6 4h6m-6 4h6M1 1v18l2-2 2 2 2-2 2 2 2-2 2 2V1l-2 2-2-2-2 2-2-2-2 2-2-2Z" />
                        </svg>',
                'name' => 'Tax Returns',
                'price' => 2,
            ],
            [
                'powerid' => 'power4',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 16.5c0-1-8-2.7-9-2V1.8c1-1 9 .707 9 1.706M10 16.5V3.506M10 16.5c0-1 8-2.7 9-2V1.8c-1-1-9 .707-9 1.706" />
                        </svg>',
                'name' => 'Business Plan',
                'price' => 2,
            ],
            [
                'powerid' => 'power5',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 17v-6m4 6v-6m4 6v-6m4 6v-6M4 18h16M3 21h18M4 9v1h16V9l-8-6-8 6Z" />
                        </svg>',
                'name' => 'Company Registration',
                'price' => 2,
            ],
            [
                'powerid' => 'power6',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 6.75c0-1.283-1.626-5.33-2.124-6.233A1 1 0 0 0 17 0H3a1 1 0 0 0-.871.508C1.63 1.393 0 5.385 0 6.75a3.236 3.236 0 0 0 1 2.336V19a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-6h2v6a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1V9.044a3.242 3.242 0 0 0 1-2.294ZM3.591 2H16.4A19.015 19.015 0 0 1 18 6.75 1.337 1.337 0 0 1 16.75 8a1.252 1.252 0 0 1-1.25-1.25 1 1 0 0 0-2 0 1.25 1.25 0 0 1-2.5 0 1 1 0 0 0-2 0 1.25 1.25 0 0 1-2.5 0 1 1 0 0 0-2 0A1.252 1.252 0 0 1 3.25 8 1.266 1.266 0 0 1 2 6.75C2.306 5.1 2.841 3.501 3.591 2ZM17 18h-7v-6a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v6H3V9.975c.084.006.164.025.25.025.84 0 1.646-.325 2.25-.907a3.244 3.244 0 0 0 4.5 0 3.244 3.244 0 0 0 4.5 0c.604.582 1.41.907 2.25.907.085 0 .166-.02.25-.027V18Z" />
                        </svg>',
                'name' => 'Marketplace',
                'price' => 2,
            ],
            [
                'powerid' => 'power7',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.539 17h12.476l4-9H5m-2.461 9a1 1 0 0 1-.914-1.406L5 8m-2.461 9H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.443a1 1 0 0 1 .8.4l2.7 3.6H16a1 1 0 0 1 1 1v2H5" />
                        </svg>',
                'name' => 'Branding & Graphics',
                'price' => 2,
            ],
            [
                'powerid' => 'power7',
                'user_id' => 1,
                'icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.539 17h12.476l4-9H5m-2.461 9a1 1 0 0 1-.914-1.406L5 8m-2.461 9H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.443a1 1 0 0 1 .8.4l2.7 3.6H16a1 1 0 0 1 1 1v2H5" />
                        </svg>',
                'name' => 'Queue 4 Me',
                'price' => 2,
            ],
        ];

        $sortedData = collect($data)->sortBy('name')->values()->all();

        foreach ($sortedData as $index => $powerData) {
            $powerData['powerid'] .= ($index + 1); // Appending incrementing number to powerid
            $powerData['user_id'] = 1; // Replace 1 with the desired user_id for each entry
            Powerup::create($powerData);
        }
    }
}