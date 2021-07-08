<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BonoMotorBike extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bono:motorbike';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Escanea todos los usuarios en busca de quien cumplió las condiciones para el BonoMotorBike';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /******************************************************************
         •Al sumar 100 referidos el usuario recibirá una moto 0 kilómetros.
         ******************************************************************/
        $alluser = count(User::all());
        try {
            for($i = 1; $i <= $alluser; $i++){
                if(User::find($i)->status == 1){
                    $referidos = User::find($i)->children;
                    if(count($referidos) >= 100){
                        Storage::append("BonoMotorBike.txt", $i . " si cumple");
                    }else{
                        Storage::append("BonoMotorBike.txt", $i . " No cumple");
                    }
                }
            }
        } catch (\Throwable $th) {
            Storage::append("BonoMotorBike.txt", 'LOG | Error: '. $th .' Fecha: '. Carbon::now());
        }
    }
}