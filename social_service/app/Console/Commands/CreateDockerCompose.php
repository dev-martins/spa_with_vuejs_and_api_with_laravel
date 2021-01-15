<?php

namespace App\Console\Commands;

use DateTimeZone;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Http\Controllers\Console\FilesReadyForLaravel;

class CreateDockerCompose extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file-create:docker-compose';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Criar arquivo docker-compose.yml com configurações padrão';

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
     * @param  \App\Http\Controllers\Console\FilesReadyForLaravel  $file
     * @return int
     */
    public function handle(FilesReadyForLaravel  $file)
    {
        try {
            $carbon = new Carbon(); 
            $carbon = Carbon::now(new DateTimeZone('America/Sao_Paulo'));

            $this->info($carbon . " - executando...");
            $arquivo = fopen('docker-compose.yml', 'w');
            $texto = $file->dockerCompose();
            fwrite($arquivo, $texto);
            fclose($arquivo);
            $this->info($carbon . " - finalisado com sucesso!");
        } catch (\Throwable $th) {
            echo " - Message - ".$th->getMessage(). "\n - Line: " . $th->getLine(). "\n - Class: ". $th->getFile();
        }
    }
}
