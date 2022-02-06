<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Global_;

class PacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){



        DB::table('pacientes')->insert([
            'nombres'=> 'Julio Mario',
            'apellidos'=>'Varillas Sosa',
            'dui'=>'05657318-9',
            'telefonoCasa'=>'2298-0134',
            'telefonoCelular'=>'6089-9878',
            'fechaDeNacimiento'=>'1974-01-01',
            'direccion'=>'4 AV. SUR, No. 14B, SAN JOSE ZACATECOLUCA, LA PAZ',
            'referenciaPersonal'=>'Jose Mario Leiva Celedon',
            'telReferenciaPersonal'=>'2222-4878',
            'ocupacion'=>'Ingeniero Civil',
            'correoElectronico'=>'JN@gmail.com',
            'sexo_id'=>'1'
            ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Julio Ernesto',
            'apellidos'=>'Cesar Ramirez',
            'dui'=>'05737318-9',
            'telefonoCasa'=>'2279-0134',
            'telefonoCelular'=>'7789-9878',
            'fechaDeNacimiento'=>'1984-06-21',
            'direccion'=>'3 AV. SUR, No. 12B, SAN JOSE ZACATECOLUCA, LA PAZ',
            'referenciaPersonal'=>'Jose Baudilio Perez Celedon',
            'telReferenciaPersonal'=>'2222-4878',
            'ocupacion'=>'Profesor',
            'correoElectronico'=>'JulioCesar@gmail.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Ernesto Jose',
            'apellidos'=>'Perez Castro',
            'dui'=>'05649872-4',
            'telefonoCasa'=>'2266-0271',
            'telefonoCelular'=>'7725-2324',
            'fechaDeNacimiento'=>'1995-07-12',
            'direccion'=>'CALLE OPONIENTE Bo. San Jose, MUNICIPIO DE SOYAPANGO, SAN SALVADOR',
            'referenciaPersonal'=>'',
            'telReferenciaPersonal'=>'',
            'ocupacion'=>'Estudiante Universitario',
            'correoElectronico'=>'ErnestoPerez1995@gmail.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Manuel Alfonso',
            'apellidos'=>'Martínez Peréz',
            'dui'=>'05646214-4',
            'telefonoCasa'=>'2293-1945',
            'telefonoCelular'=>'7718-4621',
            'fechaDeNacimiento'=>'1970-05-23',
            'direccion'=>'CALLE PPAL. Y 4 CALLE PONIENTE Bo. CONCEPCION, MUNICIPIO DE SAN JUAN NONUALCO, LA PAZ',
            'referenciaPersonal'=>'',
            'telReferenciaPersonal'=>'',
            'ocupacion'=>'Estudiante Universitario',
            'correoElectronico'=>'ManuelM70@gmail.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Maria Eugenia',
            'apellidos'=>'Leiva Peña',
            'dui'=>'05631247-4',
            'telefonoCasa'=>'2298-5647',
            'telefonoCelular'=>'7698-9874',
            'fechaDeNacimiento'=>'1950-05-05',
            'direccion'=>'KM. 46 1/2 C. ZACATECOLUCA , DESVIO ROSARIO DE LA PAZ',
            'referenciaPersonal'=>'Maria de los Angeles Leiva',
            'telReferenciaPersonal'=>'2278-6987',
            'ocupacion'=>'',
            'correoElectronico'=>'',
            'sexo_id'=>'2'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Mirna Leticia',
            'apellidos'=>'Rodriguez Sosa',
            'dui'=>'05632498-4',
            'telefonoCasa'=>'2245-5647',
            'telefonoCelular'=>'6098-9874',
            'fechaDeNacimiento'=>'1953-04-23',
            'direccion'=>'KM. 46 1/2 C. ZACATECOLUCA , DESVIO ROSARIO DE LA PAZ',
            'referenciaPersonal'=>'Maria Rodriguez Sosa',
            'telReferenciaPersonal'=>'2278-6998',
            'ocupacion'=>'Ama de Casa',
            'correoElectronico'=>'MirnaSosa@outlook.com',
            'sexo_id'=>'2'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Leonel Samuel',
            'apellidos'=>'Casas Sosa',
            'dui'=>'04963245-4',
            'telefonoCasa'=>'2245-9857',
            'telefonoCelular'=>'6098-4214',
            'fechaDeNacimiento'=>'1999-01-23',
            'direccion'=>'AV. NABLUES, No.66, COL.. VILLA PALESTINA, CTON. LAS FLORES, SAN PEDRO MASAHUAT, LA PAZ',
            'referenciaPersonal'=>'Diego Armando Casas',
            'telReferenciaPersonal'=>'',
            'ocupacion'=>'Estudiante',
            'correoElectronico'=>'LSCS@outlook.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Nelson Armando',
            'apellidos'=>'Campos Navarrete',
            'dui'=>'',
            'telefonoCasa'=>'2298-0945',
            'telefonoCelular'=>'7759-8522',
            'fechaDeNacimiento'=>'2005-12-05',
            'direccion'=>'CALLE PPAL. Y 4 CALLE PONIENTE Bo. CONCEPCION, MUNICIPIO DE SAN JUAN NONUALCO, LA PAZ',
            'referenciaPersonal'=>'Maria Julia Campos de Navarrete',
            'telReferenciaPersonal'=>'2278-6331',
            'ocupacion'=>'',
            'correoElectronico'=>'',
            'sexo_id'=>'1'
        ]);






    }
}
