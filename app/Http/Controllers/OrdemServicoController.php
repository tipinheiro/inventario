<?php

namespace inventario\Http\Controllers;

use Illuminate\Support\Facades\DB;
use inventario\OrdemServico;
use Illuminate\Http\Request;
use inventario\Equipamento;
use inventario\situacao;
use inventario\localizacao;
use inventario\tipo_item;
use inventario\acessorios;
use inventario\manutencao;
use inventario\Relatorios\MyReport;
use PDF;


class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function cadastroOrdem() {

       return view('cadastroOrdemServico');

     }


    public function lista()
    {
      $ordemServico = DB::table('ordem_servicos')
      ->join('situacao_ordems', 'situacao_ordems.id', '=', 'ordem_servicos.idsituacao')
      // ->join('localizacaos', 'manutencaos.idlocalizacao', '=', 'localizacaos.id')
      // ->join('tipo_items', 'manutencaos.idtipo_item', '=', 'tipo_items.id')
      // ->select('manutencaos.*', 'situacaos.situacao', 'tipo_items.descricao as tipoitem', 'localizacaos.localizacao')
      ->select('ordem_servicos.*', 'situacao_ordems.situacao')
      ->get();


      return view('listaOrdem')->with('ordem_servicos', $ordemServico);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {

    $equipamento = DB::select('SELECT equipamentos.id AS idequipamento, null AS idacessorio, tombamento, numero_serie, descricao, idlocalizacao, localizacao, idsituacao, situacaos.situacao  FROM equipamentos
    left join localizacaos on localizacaos.id = equipamentos.idlocalizacao
    left join situacaos on situacaos.id = equipamentos.idsituacao
    where idsituacao = 1
    union
    SELECT null AS idequipamento, acessorios.id AS idacessorio, null as tombamento, numero_serie, descricao, localizacaos_id, localizacaos.localizacao, situacaos_id, situacaos.situacao  FROM acessorios
    left join localizacaos on localizacaos.id = acessorios.localizacaos_id
    left join situacaos on situacaos.id = acessorios.situacaos_id
    where situacaos_id = 1');

      $ordemservico = new OrdemServico();
      $ordemservico->termo = $request->input('termo');
      $ordemservico->data_envio = $request->input('data_envio');
      $ordemservico->idsituacao = 1;
      $ordemservico->save();
      return redirect()->to('/ordem/' . $ordemservico->id . '/editar');
      // return view('editarOrdemServico')
      // ->with('situacao', situacao::All())
      // ->with('localizacoes', localizacao::All())
      // ->with('acessorios', acessorios::All())
      // ->with('equipamentos', $equipamento)
      // ->with('manutencaos', manutencao::All())
      // ->with('tipos', tipo_item::All());

    }

    /**
     * Display the specified resource.
     *
     * @param  \inventario\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function show(OrdemServico $ordemServico)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \inventario\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
      $equipamento = DB::select('SELECT equipamentos.id AS idequipamento, null AS idacessorio, tombamento, numero_serie, descricao, idlocalizacao, localizacao, idsituacao, situacaos.situacao  FROM equipamentos
      left join localizacaos on localizacaos.id = equipamentos.idlocalizacao
      left join situacaos on situacaos.id = equipamentos.idsituacao
      where idsituacao = 1
      union
      SELECT null AS idequipamento, acessorios.id AS idacessorio, null as tombamento, numero_serie, descricao, localizacaos_id, localizacaos.localizacao, situacaos_id, situacaos.situacao  FROM acessorios
      left join localizacaos on localizacaos.id = acessorios.localizacaos_id
      left join situacaos on situacaos.id = acessorios.situacaos_id
      where situacaos_id = 1');

      $manutencaos = DB::table('manutencaos')->where('idordemservico','=',$id)->get();

      return view('editarOrdemServico')
      //->with('ordem', $ordem->id)
      ->with('ordem', OrdemServico::find($id))
      ->with('situacao', situacao::All())
      ->with('localizacoes', localizacao::All())
      ->with('acessorios', acessorios::All())
      ->with('equipamentos', $equipamento)
      ->with('manutencaos', $manutencaos)
      ->with('tipos', tipo_item::All());
    }


    public function remover($id)
    {
      $manutencao = manutencao::find($id);
      $idordem = $manutencao->idordemservico;
      $idequipamento = $manutencao->idequipamento;
      $idacessorio = $manutencao->idacessorio;

      if (!empty($idequipamento)){
        $equipamento = Equipamento::find($idequipamento);
        $equipamento->idsituacao = 1;
        $equipamento->update();
      }
      if (!empty($idacessorio)){
        $acessorio = acessorios::find($idacessorio);
        $acessorio->situacaos_id = 1;
        $acessorio->update();
      }


      $manutencao->delete();
      return redirect()->to('/ordem/' . $idordem . '/editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \inventario\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdemServico $ordemServico)
    {
        //
    }

    public function enviar(Request $request, OrdemServico $ordemServico)
    {

      $ordemservico = OrdemServico::find($id);
      $ordemservico->idlocalizacao = $request->input('idlocalizacao');
      $ordemservico->data_envio = $request->input('data_envio');
      $ordemservico->idsituacao = 2;
      $ordemservico->update();
      return redirect()->to('/ordems');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \inventario\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdemServico $ordemServico)
    {
        //
    }

    public function imprimirOrdem(Request $request, $id) {
      $ordemservico = OrdemServico::find($id);
      $ordemservico->data_envio = $request->input('data_envio');
      $ordemservico->idsituacao = 2;
      $ordemservico->update();

      DB::table('manutencaos')->where('idordemservico','=',$id)
      ->update(['data_envio'=>$request->input('data_envio')]);


      $manutencaos = DB::table('manutencaos')->where('idordemservico','=',$id)
      ->whereNotNull('idequipamento')->get();
      foreach ($manutencaos as $manutencao) {
        DB::table('equipamentos')->where('id','=',$manutencao->idequipamento)
        ->update(['idlocalizacao'=>$request->input('idlocalizacao')]);
      }

      $manutencaos = DB::table('manutencaos')->where('idordemservico','=',$id)
      ->whereNotNull('idacessorio')->get();
      foreach ($manutencaos as $manutencao) {
        DB::table('acessorios')->where('id','=',$manutencao->idacessorio)
        ->update(['localizacaos_id'=>$request->input('idlocalizacao')]);
      }



      // $equipamentos = DB::table('equipamentos')->where('id', '=', $manutencao->idequipamento)->get();
      // $acessorios = DB::table('acessorios')->where('id', '=', $manutencao->idacessorio)->get();
      $manutencaos = DB::table('manutencaos')
      ->leftjoin('equipamentos', 'manutencaos.idequipamento', '=', 'equipamentos.id')
      ->leftjoin('acessorios', 'manutencaos.idacessorio', '=', 'acessorios.id')
      ->select('manutencaos.*','equipamentos.tombamento','acessorios.numero_serie')->where('idordemservico', '=', $id)->get();
      // return \PDF::loadView('site.certificate.certificate', compact('products'))
      //Inventario          // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
      //             ->download('nome-arquivo-pdf-gerado.pdf');

      // $pdf = PDF::loadView(view('imprimirManutencao'), $equipamentos);
      //$pdf->loadHTML($view);
      // return $pdf->stream('teste.pdf');

      // $a = view('imprimirManutencao');

      $pdf = PDF::loadView('imprimirOrdem', ['ordem' => $ordemservico, 'manutencaos' => $manutencaos]);
      return $pdf->stream();

      // return PDF::loadView('imprimirManutencao', $equipamentos)->stream('teste.pdf');
      // ->with('manutencao', $manutencao)
      // ->with('equipamentos', $equipamentos)
      // ->with('acessorios', $acessorios))->stream('teste.pdf');

      // return view('imprimirManutencao')
      // ->with('manutencao', $manutencao)
      // ->with('equipamentos', $equipamentos)
      // ->with('acessorios', $acessorios);
    }

}
