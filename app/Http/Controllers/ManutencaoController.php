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
use Illuminate\Support\Facades\Auth;

class ManutencaoController extends Controller {



  public function cadastroManutencao() {
    $equipamento = DB::select('SELECT equipamentos.id AS idequipamento, null AS idacessorio, tombamento, numero_serie, descricao, idlocalizacao, localizacao, idsituacao, situacaos.situacao  FROM equipamentos
left join localizacaos on localizacaos.id = equipamentos.idlocalizacao
left join situacaos on situacaos.id = equipamentos.idsituacao
where idsituacao = 1
union
SELECT null AS idequipamento, acessorios.id AS idacessorio, null as tombamento, numero_serie, descricao, localizacaos_id, localizacaos.localizacao, situacaos_id, situacaos.situacao  FROM acessorios
left join localizacaos on localizacaos.id = acessorios.localizacaos_id
left join situacaos on situacaos.id = acessorios.situacaos_id
where situacaos_id = 1');

    return view('cadastroManutencao')
    ->with('situacao', situacao::All())
    ->with('localizacoes', localizacao::All())
    ->with('acessorios', acessorios::All())
    ->with('equipamentos', $equipamento)
    ->with('manutencaos', manutencao::All())
    ->with('tipos', tipo_item::All());
  }



  public function editar($id) {
    $manutencao = Equipamento::find($id);
    // $associados = DB::table('acessorios')->where('manutencaos_id', '=' $id);
    $associados = DB::table('acessorios')->where('manutencaos_id', '=', $id)->get();
    return view('editarEquipamento')
    ->with('manutencao', $manutencao)
    ->with('situacao', situacao::All())
    ->with('localizacoes', localizacao::All())
    ->with('acessorios', acessorios::All())
    ->with('associados', $associados)
    ->with('tipos', tipo_item::All());
  }

  public function lista() {
    //return '<h1>listagem de manutencaos</h1>';
    // $manutencaos = DB::select('select * from manutencaos')
    $manutencaos = DB::table('manutencaos')
    ->join('situacaos', 'manutencaos.idsituacao', '=', 'situacaos.id')
    ->select('manutencaos.*')
    ->get();

    // dd($manutencaos);

    //return view('user.index', ['users' => $users]);
    return view('listaManutencao')->with('manutencaos', $manutencaos);
    //return view('listaEquipamento', ['manutencaos' => manutencaos]);
  }







  public function mostra() {
    //return '<h1>listagem de manutencaos</h1>';
    $id = Request::route('id', '0');
    $manutencao = DB::select('select * from manutencaos where id = ?', [$id]);

    if (empty($manutencao))
      return 'Equipamento inexistente.';

    //return view('user.index', ['users' => $users]);
    return view('mostraEquipamento')->with('manutencao', $manutencao[0]);
    //return view('listaEquipamento', ['manutencaos' => manutencaos]);
  }


  public function salvar(Request $request) {
    $manutencao = new manutencao();
    $manutencao->idequipamento = $request->input('idequipamento');
    $manutencao->idacessorio = $request->input('idacessorio');
    $manutencao->problema = $request->input('problema');
    $manutencao->solucao = $request->input('solucao');
    $manutencao->data_envio = $request->input('data_envio');
    $manutencao->idsituacao = 3;
    $manutencao->idordemservico = $request->input('idordem');
    if (!empty($request->input('idequipamento'))){
    $equipamento = Equipamento::find($request->input('idequipamento'));
    $equipamento->idsituacao = 3;
    $equipamento->update();
    }
    if (!empty($request->input('idacessorio'))){
    $acessorio = acessorios::find($request->input('idacessorio'));
    $acessorio->situacaos_id = 3;
    $acessorio->update();
    }
    $manutencao->idusuario = Auth::user()->id;
    $manutencao->save();
    return redirect()->to('/ordem/' . $request->input('idordem') . '/editar');
  }

  public function atualizar(Request $request, $id) {
    $manutencao = manutencao::find($id);
    $manutencao->tombamento = $request->input('tombamento');
    $manutencao->descricao = $request->input('descricao');
    $manutencao->idlocalizacao = $request->input('idlocalizacao');
    $manutencao->idtipo_item = $request->input('idtipo');
    $manutencao->idsituacao = $request->input('idsituacao');
    $manutencao->motivo = $request->input('motivo');
    $manutencao->idusuario = Auth::user()->id;
    $manutencao->update();
    return redirect()->to('/manutencao');
  }

}
