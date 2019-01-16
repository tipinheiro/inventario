<html>
<head>
  <title>Relatório de Atendimento Técnico</title>
  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
    text-align: center;
  }
  p, h2, h3{
    text-align: center;
  }
  footer {
	position:absolute;
	bottom:0;
	width:100%;
}
  </style>
</head>

<h2><b>UFMA</b> - Campus Pinheiro</h2>
<h3>Lista de Equipamentos com Defeito</h3>


<table style="width:100%">
  <thead>
  <tr>
    <th>#</th>
    <th>Tombamento</th>
    <th>Número de serie</th>
    <th>Descrição</th>
    <th>Problema Apresentado</th>
    <th>Data Envio</th>
    <th>Data Recebimento</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td> {{$manutencao->id}}</td>
      @foreach($equipamentos as $equipamento)

      <td> {{$equipamento->tombamento}}</td>
      <td> {{$equipamento->numero_serie}}</td>
      <td> {{$equipamento->descricao}}</td>
      @endforeach
      @foreach($acessorios as $acessorio)
      <td>Não Possui</td>
      <td> {{$acessorio->numero_serie}}</td>
      <td> {{$acessorio->descricao}}</td>
      @endforeach
      <td>{{$manutencao->problema}}</td>
      <td>{{$manutencao->data_envio}}</td>
      <td>{{$manutencao->data_retorno}}</td>
    </tr>

  </tbody>
</table>
<footer>
  <p>_______________________________________________</p>
  <p>Assinatura do Responsável</p>
</footer>

</html>
