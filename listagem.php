<?php

include 'conexao.php';

if(isset($_POST["txt_busca"]) != '') {
    $sql = mysqli_query($con, "select * from tb_funcionarios where nome_func like '{$_POST['txt_busca']}%' order by n_registro asc");
}else{
    $sql = mysqli_query($con, "select * from tb_funcionarios order by nome_func asc");
}

if(isset($_GET['apagar'])){
    $sql = mysqli_query($con, "delete from tb_funcionarios where n_registro=". $_GET['apagar']);
    echo "<br>";
    echo "<center>";
    echo "<hr>";
    echo "Funcionario Excluido";
    echo "<br>";
    echo "<a href=\"listagem.php\">Voltar</a>";        
    return false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem Funcionarios</title>
</head>
<body>
    <form name="frm_listagem" method="POST" action="listagem.php">
    	Digite o nome do funcionario: <br>
        <input type="text" name="txt_busca"> <br>
        <input type="submit" value="Pesquisar">
    </form>
<hr><center> Demonstrativos de Pagamentos - ADSVA4 - Nome do aluno: Lucas Santana Saturnino</center><hr><br>
    <table border="1" align="center">
        <tr> 
            <th colspan="8" bgcolor="orange">Listagem de Funcionarios</th>
        </tr>
        <tr>
            <th bgcolor="yellow">N° REGISTRO</th>
            <th bgcolor="yellow">NOME FUNCIONARIO</th>
            <th bgcolor="yellow">DATA ADMISSÃO</th>
            <th bgcolor="yellow">CARGO</th>
            <th bgcolor="yellow">SALÁRIO BRUTO</th>
            <th bgcolor="yellow">INSS</th>
            <th bgcolor="yellow">SALÁRIO LIQUIDO</th>
            <th bgcolor="yellow">APAGAR</th>
        </tr>
        <tr>
            <?php
                while($linha = mysqli_fetch_assoc($sql)) {
            ?>
                <td align="left"><?php echo $linha['n_registro']; ?></td>
                <td align="left"><?php echo $linha['nome_func']; ?></td>
                <td align="left"><?php echo $linha['data_admissao']; ?></td>
                <td align="left"><?php echo $linha['cargo']; ?></td>
                <td align="left"><?php echo $linha['qtd_salarios']; ?></td>
                <td align="left"><?php echo $linha['inss']; ?></td>
                <td align="left"><?php echo $linha['salario_liquido']; ?></td>
                <th align="center"><a href="listagem.php?apagar='<?php echo $linha['n_registro']; ?>'"><img src="close-icon.png"></a></th>
        </tr>
               <?php }
               echo "<br>";
               echo "<center>";
               echo "<hr>";
               echo "<a href=\"home_funcionarios.html\">Retornar ao Cadastro</a>";
               echo "<hr>";
               ?>
    </table>
</body>
</html>
