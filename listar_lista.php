<?php
include_once "conexao.php";


$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);


$inicio = ($pagina * $qnt_result_pg - $qnt_result_pg);

$result_lista = "SELECT * FROM lista ORDER BY id ASC LIMIT $inicio, $qnt_result_pg";
$resultado_lista = mysqli_query ($conn, $result_lista);

    
if(($resultado_lista) AND ($resultado_lista->num_rows != 0)){?>
    
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th> ID </th>
                <th> NOME </th>
                <th> TELEFONE </th>
                <th> OBSERVAÇÃO </th>
                <th> ENDEREÇO </th>
                <th> BAIRRO </th>
                <th> NUMERO </th>
                <th> CIDADE </th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row_lista = mysqli_fetch_assoc($resultado_lista)){
            ?>
            <tr>
                <th><?php echo $row_lista ['id']; ?></th>
                <td><?php echo $row_lista ['nome']; ?></td>
                <td><?php echo $row_lista ['telefone']; ?></td>
                <td><?php echo $row_lista ['observacao']; ?></td>
                <td><?php echo $row_lista ['endereco']; ?></td>
                <td><?php echo $row_lista ['bairro']; ?></td>
                <td><?php echo $row_lista ['numero']; ?></td>
                <td><?php echo $row_lista ['cidade']; ?></td>
            </tr>
                <?php
                }?>
        </tbody>
    </table>
<?php


    $result_pg = "SELECT COUNT(id) AS num_result FROM lista";
    $resultado_pg = mysqli_query ($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $max_links = 2;


    echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_lista(1, $qnt_result_pg)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_lista($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pagina";
	echo '</span>';
	echo '</li>';

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if($pag_dep <= $quantidade_pg){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_lista($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_lista($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';


        }else{
            echo "<div class='alert alert-danger' role='alert'>
                     Nenhum dado encontrado!
                 <div>";
    }