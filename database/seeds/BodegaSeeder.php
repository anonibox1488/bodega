<?php

use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
			['nombre'=>'Centro'],
			['nombre'=>'Oriente'],
			['nombre'=>'Occidente'],
			['nombre'=>'Sur']
        ];
        DB::table('bodegas')->insert($data);
    }
}
