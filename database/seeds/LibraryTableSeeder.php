<?php

use Illuminate\Database\Seeder;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // check if table users is empty
        if(DB::table('library')->get()->count() == 0){

            DB::table('library')->insert([

                [
                    'name' => 'Partnership rationale',
                    'file_name' => 'image-1.jpg',
                    'active' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Partnership rationale',
                    'file_name' => 'image-2.jpg',
                    'active' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Who we are',
                    'file_name' => 'image-3.jpg',
                    'active' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'name' => 'Our clubs',
                    'file_name' => 'image-4.jpg',
                    'active' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ],
                [
                    'name' => 'The opportunity',
                    'file_name' => 'image-5.jpg',
                    'active' => 1,
                    'created_at' => date("Y-m-d H:i:s")
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }

}
