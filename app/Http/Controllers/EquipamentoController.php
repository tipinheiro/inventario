<?php
namespace inventario\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use inventario\Equipamento;
use inventario\situacao;
use inventario\localizacao;
use inventario\tipo_item;
use inventario\acessorios;
use inventario\manutencao;
use inventario\Relatorios\MyReport;

class EquipamentoController extends Controller {

  public function cadastroEquipamento() {
      $acessorios = DB::table('acessorios')->whereNull('equipamentos_id')->get();

    return view('cadastroEquipamento')
    ->with('situacao', situacao::All())
    ->with('localizacoes', localizacao::All())
    ->with('acessorios', $acessorios)
    ->with('tipos', tipo_item::All());
  }

  public function editar($id) {
    $equipamento = Equipamento::find($id);
    // $associados = DB::table('acessorios')->where('equipamentos_id', '=' $id);
    $associados = DB::table('acessorios')->where('equipamentos_id', '=', $id)->get();
    $manutencaos = DB::table('manutencaos')->where('idequipamento', '=', $id)
    ->join('situacaos', 'manutencaos.idsituacao', '=', 'situacaos.id')->get();

    //$acessorios = DB::table('acessorios')->whereNull('equipamentos_id')->get();
    $acessorios = DB::table('acessorios')
    ->join('situacaos', 'acessorios.situacaos_id', '=', 'situacaos.id')
    ->join('localizacaos', 'acessorios.localizacaos_id', '=', 'localizacaos.id')
    ->join('tipo_items', 'acessorios.tipo_items_id', '=', 'tipo_items.id')

    ->select('acessorios.*', 'situacaos.situacao', 'tipo_items.descricao as tipoitem', 'localizacaos.localizacao')
    ->whereNull('equipamentos_id')->get();

    return view('editarEquipamento')
    ->with('equipamento', $equipamento)
    ->with('situacao', situacao::All())
    ->with('localizacoes', localizacao::All())
    ->with('acessorios',  $acessorios)
    ->with('manutencaos', $manutencaos)
    ->with('associados', $associados)
    ->with('tipos', tipo_item::All());
  }

  public function lista() {
    //return '<h1>listagem de equipamentos</h1>';
    // $equipamentos = DB::select('select * from equipamentos')
    $equipamentos = DB::table('equipamentos')
    ->join('situacaos', 'equipamentos.idsituacao', '=', 'situacaos.id')
    ->join('localizacaos', 'equipamentos.idlocalizacao', '=', 'localizacaos.id')
    ->join('tipo_items', 'equipamentos.idtipo_item', '=', 'tipo_items.id')
    ->select('equipamentos.*', 'situacaos.situacao', 'tipo_items.descricao as tipoitem', 'localizacaos.localizacao')
    ->get();

    // dd($equipamentos);

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

  public function relatorio() {
    // return '<h1>Relatório de equipamentos</h1>';
    $report = new MyReport;
    $report->run();
    return view("report",["report"=>$report]);
    /*
    $id = Request::route('id', '0');
    $equipamento = DB::select('select * from equipamentos where id = ?', [$id]);

    if (empty($equipamento))
      return 'Equipamento inexistente.';

    //return view('user.index', ['users' => $users]);
    return view('mostraEquipamento')->with('equipamento', $equipamento[0]);
    //return view('listaEquipamento', ['equipamentos' => equipamentos]);
    */
  }

  public function salvar(Request $request) {
    $equipamento = new Equipamento();
    $equipamento->tombamento = $request->input('tombamento');
    $equipamento->ano = $request->input('ano');
    $equipamento->numero_serie = $request->input('numero_serie');
    $equipamento->descricao = $request->input('descricao');
    $equipamento->idtipo_item = $request->input('idtipo');
    $equipamento->idlocalizacao = $request->input('idlocalizacao');
    $equipamento->idsituacao = 1;
    $equipamento->save();
    return redirect()->to('/equipamentos');
  }

  public function atualizar(Request $request, $id) {
    $equipamento = Equipamento::find($id);
    $equipamento->tombamento = $request->input('tombamento');
    $equipamento->ano = $request->input('ano');
    $equipamento->numero_serie = $request->input('numero_serie');
    $equipamento->descricao = $request->input('descricao');
    $equipamento->idtipo_item = $request->input('idtipo');
    $equipamento->idlocalizacao = $request->input('idlocalizacao');
    $equipamento->update();
    return redirect()->to('/equipamentos');
  }

}
