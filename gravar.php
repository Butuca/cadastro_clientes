<?php
    include 'conexao.php';

    $registro = $_POST["txt_registro"];
    $nome_func = $_POST["txt_nome_func"];
    $dt_admissao = $_POST['txt_dt_admissao'];
    $cargo = $_POST['txt_cargo'];
    $salarios= $_POST['txt_salarios'];
    $salario_bruto;
    $inss;
    $salario_liquido;
    
    $sql = mysqli_query($con, "select * from tb_funcionarios where n_registro ='$registro'");
    
    $salario_bruto = $salarios * 1039;
    if ($salario_bruto > 1350) {
        $inss = $salario_bruto * 0.11;
        $salario_liquido = $salario_bruto - $inss;
    }   

    if (mysqli_num_rows($sql) > 0){
        echo "<center>";
        echo "<hr>";
        echo "Funcionario ja existente";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"home_funcionarios.html\">Retornar ao cadastro </a>";
    }else{
        $sql = mysqli_query($con, "insert into tb_funcionarios (n_registro, nome_func, data_admissao,cargo, qtd_salarios, salario_bruto, inss, salario_liquido) values ('$registro', '$nome_func','$dt_admissao', '$cargo', '$salarios','$salario_bruto','$inss','$salario_liquido')");
        echo "<center>";
        echo "<hr>";
        echo "Funcionario cadastrado com sucesso!";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"home_funcionarios.html\">Retornar ao cadastro </a>";
    }
?>