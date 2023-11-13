<?php

namespace Database\Seeders;

use App\Models\UsersAdmin;
use Illuminate\Database\Seeder;

class UsersAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administradores = [
            [
                'email' => 'leonel@handsonlesco.com',
                'estado' => 'A',
                
            ],
            [
                'email' => 'nina@handsonlesco.com',
                'estado' => 'A',
            ],
            [
                'email' => 'luisdiego@handsonlesco.com',
                'estado' => 'A',
            ],
            [
                'email' => 'marialaura@handsonlesco.com',
                'estado' => 'A',
            ],
            [
                'email' => 'carlos@handsonlesco.com',
                'estado' => 'A',
            ],
          
        ];
    
        foreach($administradores as $key => $value) {
            UsersAdmin::create($value);
        }//
    }
}
