<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
        
             [
                'name'=> 'Daniela',
                'lastname'=> 'Quirós',
                'email'=> 'danielaquiros84@gmail.com',
                'password'=> '$2y$12$lCg0mTwUhH9teGabhFjZv.YdjadkNW0ccyxlqe.aCW/GosmLoZ83q'
              ], 
              [
                'name'=> 'jenifer',
                'lastname'=> 'nuñez',
                'email'=> 'jenyangel765@gmail.com',
                'password'=> '$2y$12$NMwZqMYwZm98s102pqVVAO3662nokCWvUA9.zTr/ZaG2hNRHyvteO'
              ],
              [
                'name'=> 'Jammee',
                'lastname'=> 'Vásquez',
                'email'=> 'jammee.tvasquezn@gmail.com',
                'password'=> '$2y$12$LpZy39I2kjQBPcM5dJOV5OzfAotCb6FZ/8Hsqt01HE/L/tmntJ8e2'
              ],
              [
                'name'=> 'Sofia',
                'lastname'=> 'Marquez',
                'email'=> 'sofivalmar@yahoo.es',
                'password'=> '$2y$12$GqqeZjdf2nx2yJ3fdwM//OTyTNX0np7SDKUk69lcNcP5brPHa/GZC'
              ],
              [
                'name'=> 'Gabriela',
                'lastname'=> 'Valerin',
                'email'=> 'gabriela.valerin@sagradobilingualschool.com',
                'password'=> '$2y$12$jXDkwrjUVUsZmrq1o8Njeu2Li4jZgUaAFDnWAxWpGrLUWHuAajFGq'
              ],
              [
                'name'=> 'Alanis',
                'lastname'=> 'Laitano Romero',
                'email'=> 'nanilaitano@hotmail.es',
                'password'=> '$2y$12$Hm59IHGZZF3HcJHWJ3KW1eoyXNLWarzOjotFwx.B7hciIFYV6OOrO'
              ],
              [
                'name'=> 'Ismael',
                'lastname'=> 'Serrano',
                'email'=> 'ismaelserrano077@gmail.com',
                'password'=> '$2y$12$ewftDZMBUu2bfK/smH6v/u8UTSb7ZoJA8KVzZIjpwqXhMYu.dYkH.'
              ],
              [
                'name'=> 'Tatiana',
                'lastname'=> 'Picado',
                'email'=> 'tpicado16@gmail.com',
                'password'=> '$2y$12$lpDek9mvyZUtxEyG6jYEP.zR69RZTmkkgZQJj4fqjBhmeeO.ZER/2'
              ],
              [
                'name'=> 'Andrea',
                'lastname'=> 'Ocampo',
                'email'=> 'aocampos@hotmail.com',
                'password'=> '$2y$12$VKa1HXqDyQFBUO.7iIAlMOpnxRQvxjneOHUoTyFVzZoECcYTi/beG'
              ],
              [
                'name'=> 'Gerli',
                'lastname'=> 'Arroyo',
                'email'=> 'garroyo11@gmail.com',
                'password'=> '$2y$12$POCXEiXTaVRUHGQ3T7xQN.tcVjkuB6TsS07GZ9B48zO04/IcJ9m2y'
              ],
              [
                'name'=> 'Angelica',
                'lastname'=> 'Vasquez',
                'email'=> 'angelica.miangel@hotmail.com',
                'password'=> '$2y$12$lOzT6S.auft8MlJr.lFgaOT2nuNUH3L.JgotPytvabf/TcPIbmgZC'
              ],
              [
                'name'=> 'Andrea',
                'lastname'=> 'Solano',
                'email'=> 'andre94_sb@hotmail.com',
                'password'=> '$2y$12$83TGCWRnSXSrKk64v18qRueoY./rJ.G0W/hXGUl9Ip3nGMi2J8SSW'
              ],
              [
                'name'=> 'Celeste',
                'lastname'=> 'Bazán',
                'email'=> 'mc.peru.panama@gmail.com',
                'password'=> '$2y$12$wzJmFRjmoH2YcoQuLuTp2eMRc7.40bQ2qN5dYNFiaJ1JQK4Wmq5RS'
              ],
              [
                'name'=> 'Valery',
                'lastname'=> 'Solano',
                'email'=> 'valerysolanong@hotmail.com',
                'password'=> '$2y$12$VnZ8pE1AF3P7hJO6sdvp3e7gmuOeJxhtk1iQu9Xk0r46w/BvdL9su'
              ],
              [
                'name'=> 'Lisbeth',
                'lastname'=> 'Lao',
                'email'=> 'lislaoag01@gmail.com',
                'password'=> '$2y$12$JBNuO5jidFMuJ5C1F0jVCuXxL0matZGaakt/ri4wAfwf5WjQOix/i'
              ],
              [
                'name'=> 'Edwin',
                'lastname'=> 'Umaña Guevara',
                'email'=> 'edwinu050@gmail.com',
                'password'=> '$2y$12$MPAaoim3mi1IvhCGXZoNIOiXyqiSyCTKpGKlg650/lp7E1jS5gT8W'
              ],
              [
                'name'=> 'Tatiana',
                'lastname'=> 'Jimenez',
                'email'=> 'vanejimo@gmail.com',
                'password'=> '$2y$12$9sm7c84P2tdgN4jzYwsVhup/VESh3NVCG9y1sk/SNQSkt.00bqg5K'
              ],
              [
                'name'=> 'Natalia',
                'lastname'=> 'Munoz',
                'email'=> 'nataliam_00@hotmail.com',
                'password'=> '$2y$12$oP6aDJu1HeiXsRez1aEuyOZPHN9gwycYe8uIj4zqu6ViiwcZxqGVe'
              ],
              [
                'name'=> 'Maricela',
                'lastname'=> 'Duarte',
                'email'=> 'mariceladuarte343@gmail.com',
                'password'=> '$2y$12$V5oZAIGYjPmMHRiJwSx3TO8nvZzATHLe1KcuiwTHZCRrHwHcnglFW'
              ],
              [
                'name'=> 'Sara',
                'lastname'=> 'Hernández Farrier',
                'email'=> 'saritahernandez23@hotmail.com',
                'password'=> '$2y$12$RDbpk6b7hXHS/Y2AFuuU.eaTehwXzZ3ORyUT/L1lL5x4km2sNTDcm'
              ],
              [
                'name'=> 'Xinia luz',
                'lastname'=> 'Fernandez Hurtado',
                'email'=> 'xinfer@hotmail.com',
                'password'=> '$2y$12$yq/P7eaZ94kz7tHERW/ZtuMNQ1Vu1ZxoNC7d2UbfMioTkeSFP7BkC'
              ],
              [
                'name'=> 'Sofía',
                'lastname'=> 'Hernández Muñoz',
                'email'=> 'shernandezm1@hotmail.com',
                'password'=> '$2y$12$gFDOVdKurOvsRm.FbOrsm.xcIJ1FikyB7JtIpdQW4phLQgZ1E04g6'
              ],
              [
                'name'=> 'Valeria',
                'lastname'=> 'Núñez',
                'email'=> 'valenunez52@gmail.com',
                'password'=> '$2y$12$fjmvvr5eVMJJAfuAg1.L8eznq/4hrjM0BDyW1rsk2fBsJefdCGCuu'
              ],
              [
                'name'=> 'MaríaJosé',
                'lastname'=> 'MontesdeOca',
                'email'=> 'mjmdeo2305@gmail.com',
                'password'=> '$2y$12$WWXbkXeqHdKzqts7jnWl2u31/3YU/IIDJkxjjHZS6yP3GDQE7j88W'
              ],
              [
                'name'=> 'Arturo',
                'lastname'=> 'Murillo',
                'email'=> 'arturo.murillocr@gmail.com',
                'password'=> '$2y$12$u9jqJgFZehY.5B.h7iaF0.FiLoMKrMLS3ZXbh/Bpa4f.KOSOORpqO'
              ],
              [
                'name'=> 'Linsey',
                'lastname'=> 'Aguirre Arias',
                'email'=> 'linarias99@gmail.com',
                'password'=> '$2y$12$PokF9NnEJOjsCjeo9VF/9Oyf4QMJt8EssWQ57xkyrYwFM9ExwcWDK'
              ],
              [
                'name'=> 'Gianina',
                'lastname'=> 'Solis',
                'email'=> 'giasolist@gmail.com',
                'password'=> '$2y$12$jeGve676bjxJB3YLbRyD4.SM.dQCLubodYa8lG2Ot6qJCqi40I3M6'
              ],
              [
                'name'=> 'Disnelia',
                'lastname'=> 'Gonzalez',
                'email'=> 'disnelia06@gmail.com',
                'password'=> '$2y$12$ozwtIemSqKCjAi0RRlkrteBY0m1yTdnnWow98BA2bJAiDk2PaO5Fm'
              ],
              [
                'name'=> 'Michael',
                'lastname'=> 'Arias',
                'email'=> 'maicol4ac@gmail.com',
                'password'=> '$2y$12$4sJsDclxdjIwajTOmOfPy.hlrkWPCa3S0zzqvtku7OS0XJpBgQKR6'
              ],
              [
                'name'=> 'Halana',
                'lastname'=> 'Valverde',
                'email'=> 'halana507@gmail.com',
                'password'=> '$2y$12$AD5T3U6TDxoDDdEQ3S.baOgCwjWKj21gHjiC9bcIYgI5ZHaBbygB6'
              ],
              [
                'name'=> 'Carlos',
                'lastname'=> 'Jimenez',
                'email'=> 'cjimne@gmail.com',
                'password'=> '$2y$12$IWZFooJtudWncKGziQsCPevAOo9U357bIPPdYgrOuO7xN/tYryUAq'
              ],
              [
                'name'=> 'Wanda',
                'lastname'=> 'Chacón',
                'email'=> 'wandachacon74@gmail.com',
                'password'=> '$2y$12$iAW6u1zUV8sZusNOS3gXk.kgC6zyCpL50glzIJ6.83AUUTTlGRr3S'
              ],
              [
                'name'=> 'Valeria',
                'lastname'=> 'Chinchilla',
                'email'=> 'vachbl96@gmail.com',
                'password'=> '$2y$12$/J2aAMyBXRtxswUkNMfI5OuZiZrhxpVqTjcFzaY7ag9o07G2cLwPi'
              ],
              [
                'name'=> 'Hailander',
                'lastname'=> 'Valverde',
                'email'=> 'hailandervalverde@estudiantec.cr',
                'password'=> '$2y$12$iWcKJONqWbu7TsrsO.zabOKfo2u0TpYIaQhuwFgB/mxZr2z0Dtyzq'
              ],
              [
                'name'=> 'Elena',
                'lastname'=> 'Vargas Acuña',
                'email'=> 'eva071999@hotmail.com',
                'password'=> '$2y$12$pU1NoudbKSOO3IQV2KzMnumXEGzsp.BO2KNRFFWm8o8OT2XXCTk.u'
              ],
              [
                'name'=> 'Adriana',
                'lastname'=> 'Vargas',
                'email'=> 'adrivargas618@gmail.com',
                'password'=> '$2y$12$fyOhBrEXOzNnId7bS9rUDexN4wcQ/WgDPjgnkf11ZbC4jRcSWrRNW'
              ]
            

        ];

        foreach($usuarios as $key => $value) {
            User::create($value);
        }//
       }
    


    
}
