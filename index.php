<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Lista TD</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <h2>Resultados obtidos em vistorias:</h2>
        <span id="conteudo"></span>
    </div> 
    <script>
        var qnt_result_pg = 10;
        var pagina = 1;

        $(document).ready(function(){
           listar_lista(pagina, qnt_result_pg);
        });

        function listar_lista(pagina, qnt_result_pg){

            var dados = {
                pagina : pagina,
                qnt_result_pg : qnt_result_pg
            }


            $.post('listar_lista.php', dados, function(retorna){
                $("#conteudo").html(retorna);
            });
        }

        
    </script>
</body>
</html>