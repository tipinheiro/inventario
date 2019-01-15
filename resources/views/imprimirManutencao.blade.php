<html>
    <head>
        <title>Relatório</title>
    </head>

      {{ $manutencao->id }}

    @foreach($equipamentos as $equipamento)
    {{ $equipamento->id }}
    @endforeach

</html>
