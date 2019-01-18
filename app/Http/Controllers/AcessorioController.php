<?php
namespace inventario\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use inventario\situacao;
use inventario\localizacao;
use inventario\tipo_item;
use inventario\acessorios;
// use inventario\Http\Controllers\Response;
use Response;

class AcessorioController extends Controller {

  public function cadastroAcessorio() {
    return view('cadastroAcessorio')
    ->with('situacao', situacao::All())
    ->with('localizacoes', localizacao::All())
    ->with('tipos', tipo_item::All());
      }

  public function editar($id) {
    $acessorio = acessorios::find($id);
    return view('editarAcessorio')

    ->with('acessorio', $acessorio)
    ->with('situacao', situacao::All())
    ->with('localizacoes', localizacao::All())
    ->with('tipos', tipo_item::All());
  }

  public function lista() {
    //return '<h1>listagem de equipamentos</h1>';
    // $equipamentos = DB::select('select * from equipamentos')
    $acessorio = DB::table('acessorios')
    ->join('situacaos', 'acessorios.situacaos_id', '=', 'situacaos.id')
    ->join('localizacaos', 'acessorios.localizacaos_id', '=', 'localizacaos.id')
    ->join('tipo_items', 'acessorios.tipo_items_id', '=', 'tipo_items.id')
    ->select('acessorios.*', 'situacaos.situacao', 'tipo_items.descricao as tipoitem', 'localizacaos.localizacao')
    ->get();

    // dd($equipamentos);

    //return view('user.index', ['users' => $users]);
    return view('listaAcessorio')->with('acessorios', $acessorio);
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
    $acessorio = new acessorios();
    $acessorio->numero_serie = $request->input('numero_serie');
    $acessorio->descricao = $request->input('descricao');
    $acessorio->tipo_items_id = $request->input('idtipo');
    $acessorio->localizacaos_id = $request->input('idlocalizacao');
    $acessorio->situacaos_id = $request->input('idsituacao');
    $acessorio->save();
    return redirect()->to('/acessorios');
  }

  public function atualizar(Request $request, $id) {
    $acessorio = acessorios::find($id);
    $acessorio->numero_serie = $request->input('numero_serie');
    $acessorio->descricao = $request->input('descricao');
    $acessorio->tipo_items_id = $request->input('idtipo');
    $acessorio->localizacaos_id = $request->input('idlocalizacao');
    $acessorio->update();
    return redirect()->to('/acessorios');
  }

  public function associar(Request $request) {
    $data = $request->json()->all();
    // $acessorio = acessorios::find($data['id']);
    // $acessorio->equipamentos_id = $data['equipamentos_id'];
    $acessorio = acessorios::find($request->input('id'));
    $acessorio->equipamentos_id = $request->input('equipamentos_id');
    $acessorio->update();
    //return Response::json('ok');
    return 'ok';
  }

  public function desassociar($id) {
    $acessorio = acessorios::find($request->input('id'));
    $acessorio->equipamentos_id = nullable();
    $acessorio->update();
    //return Response::json('ok');
    return 'ok';
  }

  public function associados($id) {
    // $associados = DB::table('acessorios')->where('equipamentos_id', '=', $id)->get();

    $associados = DB::table('acessorios')
    ->join('situacaos', 'acessorios.situacaos_id', '=', 'situacaos.id')
    ->join('localizacaos', 'acessorios.localizacaos_id', '=', 'localizacaos.id')
    ->join('tipo_items', 'acessorios.tipo_items_id', '=', 'tipo_items.id')
    ->select('acessorios.id as idacessorio', 'acessorios.*', 'situacaos.situacao', 'tipo_items.descricao as tipoitem', 'localizacaos.localizacao')
    ->where('equipamentos_id', '=', $id)->get();

    return Response::json(['data'=>$associados],200);
  }

}
