<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PagosAbonosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::today('America/El_Salvador')->format('Y-m-d');

        DB::table('pagos')->insert([
            'descripcion'=> 'Limpieza de diente',
            'costo'=>'10',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'1',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'5',
            'fecha'=>$fecha,
            'pago_id'=>'1'
        ]);

        DB::table('pagos')->insert([
            'descripcion'=> 'Limpieza de carie',
            'costo'=>'15',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'2',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'8',
            'fecha'=>$fecha,
            'pago_id'=>'2'
        ]);

        DB::table('pagos')->insert([
            'descripcion'=> 'Limpieza de diente',
            'costo'=>'12',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'3',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'4',
            'fecha'=>$fecha,
            'pago_id'=>'3'
        ]);

        DB::table('pagos')->insert([
            'descripcion'=> 'Mantenimiento de molares',
            'costo'=>'45',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'4',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'20',
            'fecha'=>$fecha,
            'pago_id'=>'4'
        ]);
        
        DB::table('pagos')->insert([
            'descripcion'=> 'Limpieza de caries',
            'costo'=>'15',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'5',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'5',
            'fecha'=>$fecha,
            'pago_id'=>'5'
        ]);

        DB::table('pagos')->insert([
            'descripcion'=> 'Limpieza de diente',
            'costo'=>'20',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'6',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'12',
            'fecha'=>$fecha,
            'pago_id'=>'6'
        ]);

        DB::table('pagos')->insert([
            'descripcion'=> 'Mantenimiento de molares',
            'costo'=>'40',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'7',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'30',
            'fecha'=>$fecha,
            'pago_id'=>'7'
        ]);

        DB::table('pagos')->insert([
            'descripcion'=> 'Extraccion de molares',
            'costo'=>'70',
            'fecha'=>$fecha,
            'estado_pago_id'=>'2',
            'expediente_doctora_dental_id'=>'8',
        ]);

        DB::table('abonos')->insert([
            'monto'=>'40',
            'fecha'=>$fecha,
            'pago_id'=>'8'
        ]);

    }
}
