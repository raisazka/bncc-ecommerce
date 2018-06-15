<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
           ['name'=>'Celana', 'slug'=>'celana', 'created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'Baju', 'slug'=>'baju', 'created_at'=>$now, 'updated_at'=>$now],
            ['name'=>'Kutang', 'slug'=>'kutang', 'created_at'=>$now, 'updated_at'=>$now],
        ]);
    }
}
