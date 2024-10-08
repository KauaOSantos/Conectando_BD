<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Formulário de Cadastro</title>
    </head>
    <body>
        <section id="id_form">
            <h1>Cadastro de Novo funcionário</h1>
            <form method="get">
                <p>Nome: <input type="text" name="nome" required /></p>
                <p>Salário: <input type="text" name="salario" required /></p>
                <p>Cargo: <input type="text" name="cargo" required /></p>
                <p>Idade: <input type="number" name="idade" required /></p>
                <p>Telefone: <input type="tel" name="telefone" required /></p>
                <input type="submit" name="submit" value="Enviar" />
            </form>

        </section>
        <section id = "funcionarios">
        <?php
        //função para renderizar o template
        function renderTemplate($funcionario){
        //
        include 'template.php';
        }
        
        //verifica se o usuário inseriu os campos
        if(isset($_GET['nome'], $_GET['salario'], $_GET['cargo'], $_GET['idade'], $_GET['telefone'])) {
            //echo "<script>alert('Enviado com Sucesso!');</script>";
        }

        //setando as informações do Banco de Dados
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';
        $banco_de_dados = 'empresa';

        //criando um objeto dessa conexão
        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);

        //$consulta = $conexao->query('insert into funcionario (nome, cargo, idade, salario, telefone)
        //values ("Caique", "Gari", 40, 5.000, 190)');

        //criando objeto de mysqli_result da query mysql
        // $selectFuncionarios = $conexao-> query ('select * from funcionario');
        
        //insere os dados na tabela
        $selectFuncionarios = $conexao->query("insert into funcionario(nome, salario, cargo, idade, telefone) values ('" . $_GET['nome'] . "', '" . $_GET['salario'] . "', '" . $_GET['cargo'] . "', " . $_GET['idade'] . ", '" . $_GET['telefone'] . "')");


        //criando um objetode resposta do mysqli_result para todos os itens (fetch_all)
        //$rowsFuncionarios = $selectFuncionarios->fetch_all(MYSQLI_ASSOC);
        $rowsFuncionarios = []; 
        var_dump($rowsFuncionarios);

        //fechando a conexão
        $conexao ->close();

        //sempre que passar em um item de rowFuncionário, esse item é guardado em uma nova variável $funcionario
        //foreach($rowsFuncionarios as $funcionario){

        //sempre que passar um funcionário, vai chamar o template colocando as informações da linha (funcionário)
        //renderTemplate($funcionario);
        //}
        ?>
    </section>

</body>
</html>