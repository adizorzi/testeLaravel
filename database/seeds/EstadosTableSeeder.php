<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['descricao' => 'Acre',
            'prefixo' => 'AC'],
            ['descricao' => 'Alagoas',
            'prefixo' => 'AL'],
            ['descricao' => 'Amapá',
            'prefixo' => 'AP'],
            ['descricao' => 'Amazonas',
            'prefixo' => 'AM'],
            ['descricao' => 'Bahia',
            'prefixo' => 'BA'],
            ['descricao' => 'Ceará',
            'prefixo' => 'CE'],
            ['descricao' => 'Distrito Federal',
            'prefixo' => 'DF'],
            ['descricao' => 'Espírito Santo',
            'prefixo' => 'ES'],
            ['descricao' => 'Goiás',
            'prefixo' => 'GO'],
            ['descricao' => 'Maranhão',
            'prefixo' => 'MA'],
            ['descricao' => 'Mato Grosso',
            'prefixo' => 'MT'],
            ['descricao' => 'Mato Grosso do Sul',
            'prefixo' => 'MS'],
            ['descricao' => 'Minas Gerais',
            'prefixo' => 'MG'],
            ['descricao' => 'Pará',
            'prefixo' => 'PA'],
            ['descricao' => 'Paraíba',
            'prefixo' => 'PB'],
            ['descricao' => 'Paraná',
            'prefixo' => 'PR'],
            ['descricao' => 'Pernambuco',
            'prefixo' => 'PE'],
            ['descricao' => 'Piauí',
            'prefixo' => 'PI'],
            ['descricao' => 'Rio de Janeiro',
            'prefixo' => 'RJ'],
            ['descricao' => 'Rio Grande do Norte',
            'prefixo' => 'RN'],
            ['descricao' => 'Rio Grande do Sul',
            'prefixo' => 'RS'],
            ['descricao' => 'Rondônia',
            'prefixo' => 'RO'],
            ['descricao' => 'Roraima',
            'prefixo' => 'RR'],
            ['descricao' => 'Santa Catarina',
            'prefixo' => 'SC'],
            ['descricao' => 'São Paulo',
            'prefixo' => 'SP'],
            ['descricao' => 'Sergipe',
            'prefixo' => 'SE'],
            ['descricao' => 'Tocantins ',
            'prefixo' => 'TO']
        ];
        DB::table('estados')->insert($estados);
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

    }
}
