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
        // $this->call(UsersTableSeeder::class);
        $this->call([
          UserTableSeeder::class,
          EquipamentoTableSeeder::class,
          situacaosTableSeeder::class,
          localizacaosTableSeeder::class,
          tipo_itemTableSeeder::class,
        ]);
        //$this->call('EquipamentoTableSeeder', 'situacaosTableSeeders');
    }
}

class UserTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->insert([
        'name' => 'kerneldark',
        'email' => 'kerneldark@gmail.com',
        'password' => bcrypt('sudev2014'),
    ]);

    DB::table('users')->insert([
        'name' => 'edilson',
        'email' => 'edilson.lj@ufma.br',
        'password' => bcrypt('sudev2014'),
    ]);
  }
}

class EquipamentoTableSeeder extends Seeder
{
  public function run()
  {
    /*
    DB::insert('insert into equipamentos(tombamento, numero_serie, descricao, status)
    values(?,?,?,?)',
    array(123,'123as','Impressora HP 2100','ativa'));

    DB::insert('insert into equipamentos(tombamento, numero_serie, descricao, status)
    values(?,?,?,?)',
    array(123,'123as','Impressora Samsung x330','ativa'));

    DB::insert('insert into equipamentos(tombamento, numero_serie, descricao, status)
    values(?,?,?,?)',
    array(123,'123as','Impressora L200','ativa'));
    */
  }
}

class situacaosTableSeeder extends Seeder
{
  public function run()
  {
    DB::insert('insert into situacaos(situacao)
    values(?)',
    array('Ativo'));

    DB::insert('insert into situacaos(situacao)
    values(?)',
    array('Com defeito'));
  }
}

class localizacaosTableSeeder extends Seeder
{
  public function run()
  {
    DB::insert('insert into localizacaos(localizacao)
    values(?)',
    array('NTI - UFMA - Pinheiro'));

    DB::insert('insert into localizacaos(localizacao)
    values(?)',
    array('Secretaria - UFMA - Pinheiro'));
  }
}

class tipo_itemTableSeeder extends Seeder
{
  public function run()
  {
    DB::insert('insert into tipo_items(descricao)
    values(?)',
    array('Computador'));

    DB::insert('insert into tipo_items(descricao)
    values(?)',
    array('Notebook'));

    DB::insert('insert into tipo_items(descricao)
    values(?)',
    array('Datashow'));
  }
}
