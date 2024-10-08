<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Funcionários</title>
    </head>
    <body>
        <section id = "funcionarios">
        <?php
        //função para renderizar o template
        
        function renderTemplate($funcionario){
        //
        include 'template.php';
        }
        
        //setando as informações do Banco de Dados
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';
        $banco_de_dados = 'empresa';

        //teste

        //criando um objeto dessa conexão
        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco_de_dados);

        //$consulta = $conexao->query('insert into funcionario (nome, cargo, idade, salario, telefone)
        //values ("Caique", "Gari", 40, 5.000, 190)');

        //criando objeto de mysqli_result da query mysql
        $selectFuncionarios = $conexao-> query ('select * from funcionario');

        //criando um objetode resposta do mysqli_result para todos os itens (fetch_all)
        $rowsFuncionarios = $selectFuncionarios->fetch_all(MYSQLI_ASSOC);

        //fechando a conexão
        $conexao ->close();

        //sempre que passar em um item de rowFuncionário, esse item é guardado em uma nova variável $funcionario
        foreach($rowsFuncionarios as $funcionario){
            //sempre que passar um funcionário, vai chamar o template colocando as informações da linha (funcionário)
            renderTemplate($funcionario);
            }
        ?>
    </section>

</body>
</html>