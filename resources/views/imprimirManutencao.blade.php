<html>
<head>
</head>
<body>
<h1>Manutençao {{ $manutencao->id }}</h1>
<ul>
  @foreach ($equipamentos as $equipamento)
  <ui>{{ $equipamento->id }} {{ $equipamento->tombamento }} {{ $equipamento->descricao }}</ui>
  @endforeach
</ul>
</body>
