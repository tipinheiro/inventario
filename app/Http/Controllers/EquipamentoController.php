<?php
namespace inventario\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use inventario\Equipamento;
use inventario\situacao;
use inventario\localizacao;
use inventario\tipo_item;

class EquipamentoController extends Controller {

  public function cadastroEquipamento() {
    return view('cadastroEquipamento')
    ->with('situacao', situacao::All())
    ->with('localizacoes', localizacao::All())
    ->with('tipos', tipo_item::All());
  }

  public function lista() {
    //return '<h1>listagem de equipamentos</h1>';
    $equipamentos = DB::select('select * from equipamentos');

    //return view('user.index', ['users' => $users]);
    return view('listaEquipamento')->with('equipamentos', $equipamentos);
    //return view('listaEquipamento', ['equipamentos' => equipamentos]);
  }

  public function mostra() {
    //return '<h1>listagem de equipamentos</h1>';
    $id = Request::route('id', '0');
    $equipamento = DB::select('select * from equipamentos where id = ?', [$id]);

    if (empty($equipamento))
      return 'Equipamento inexistente.';

    //return view('user.index', ['users' => $users]);
    return view('mostraEquipamento')->with('equipamento', $equipamento[0]);
    //return view('listaEquipamento', ['equipamentos' => equipamentos]);
  }

  public function salvar(Request $request) {
    $equipamento = new Equipamento();
    $equipamento->tombamento = $request->input('tombamento');
    $equipamento->ano = $request->input('ano');
    $equipamento->numero_serie = $request->input('numero_serie');
    $equipamento->descricao = $request->input('descricao');
    $equipamento->idtipo_item = $request->input('idtipo');
    $equipamento->idlocalizacao = $request->input('idlocalizacao');
    $equipamento->idsituacao = $request->input('idsituacao');
    $equipamento->save();
    return redirect()->to('/admin/cadastro');
  }

}
