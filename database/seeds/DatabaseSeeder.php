<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TablaRolSeeder::class);
        $this->call(TablaCargosSeeder::class);
        $this->call(TablaEstadosSolicitudTransferencia::class);
        $this->call(TablaMargenesDeGananciaSeeder::class);
        $this->call(TablaMonedasSeeder::class);
        $this->call(TablaPaisesSeeder::class);
        $this->call(TablaTipoSolicitudTransferencia::class);
        $this->call(TablaTipoUsuariosSeeder::class);
    }



    protected function truncateTablas(array $tablas){
        // NO APLICA
    }
}
