<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $categories = [
            ['name' => 'Online',                    'slug' => 'online',                     'sort_order' => 1],
            ['name' => 'Offline',                   'slug' => 'offline',                    'sort_order' => 2],
            ['name' => 'Bundling Reguler',          'slug' => 'bundling-reguler',           'sort_order' => 3],
            ['name' => 'Flexilearn A1',             'slug' => 'flexilearn-a1',              'sort_order' => 4],
            ['name' => 'Flexilearn A2',             'slug' => 'flexilearn-a2',              'sort_order' => 5],
            ['name' => 'Flexilearn B1',             'slug' => 'flexilearn-b1',              'sort_order' => 6],
            ['name' => 'Bundling Flexilearn A1-A2', 'slug' => 'bundling-flexilearn-a1-a2',  'sort_order' => 7],
            ['name' => 'Bundling Flexilearn A2-B1', 'slug' => 'bundling-flexilearn-a2-b1',  'sort_order' => 8],
            ['name' => 'Bundling Flexilearn A1-B1', 'slug' => 'bundling-flexilearn-a1-b1',  'sort_order' => 9],
            ['name' => 'DeutschKit',                'slug' => 'deutschkit',                 'sort_order' => 10],
        ];

        foreach ($categories as $cat) {
            ProductCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                array_merge($cat, ['is_active' => true])
            );
        }

        $this->command->info('✅ Product Categories seeded: ' . count($categories) . ' kategori.');
    }
}
