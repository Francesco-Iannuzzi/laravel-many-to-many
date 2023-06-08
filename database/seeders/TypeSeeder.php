<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('db_types');

        foreach ($types as $type) {
            
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->slug = Str::slug($newType->name, '-');
            $newType->save();
        }
    }
}