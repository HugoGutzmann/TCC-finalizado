<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>

    </style>
</head>
<body style = 'background-color: #7EE8FA'>
<!--ADMIN CARAIO-->
<!---->
<!--uma tabela com os generos pré definidos e uma forma de serem adicionados novos generos-->
<!--uma tabela com todos os livros para serem editados / excluidos-->
<!--uma tabela com todas as sinopses para serem editados / excluidos-->
<!--uma tabela com todos os usuarios para serem editados (admin =2 ou não =1)-->
<br><br>
<div class="tables">
 <div id="divusuarios">
    <table class="ui collapsing table center" style="margin: 5px">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Senha</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>Tipo Usuario</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr class="ui centered">
                <td data-label="Id"><?= $usuario->us_id?> </td>
                <td data-label="Nome"><?= $usuario->us_nome ?> </td>
                <td data-label="Email"><?= $usuario->us_email?> </td>
                <td data-label="Senha"><?= $usuario->us_senha ?> </td>
                <td data-label="Data de Nascimento"><?= $usuario->us_datanascimento ?> </td>
                <td data-label="Sexo"><?= $usuario->us_sexo ?> </td>
                <td data-label="Tipo Usuario"><?= $usuario->tip_usuario ?> </td>
                <td data-label ="Ação">
                    <a href="ControlerAdmin.php?acao=editar&iduser=<?=$usuario->us_id?>&idusuario=1">Editar</a> |
                    <a href="ControlerAdmin.php?acao=excluir&iduser=<?=$usuario->us_id?>&idusuario=1">Remover</a>
                </td>
            </tr>


        <?php endforeach; ?>

        </tbody>
    </table>
 </div>
<hr>
 <div id="divgeneros">
    <table class="ui collapsing table centered" >
        <thead>
        <tr>
            <th>Id</th>
            <th>Descrição</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($generos as $genero):
            $generodesc = $genero->ge_descricao;
            ?>
            <tr>
                <th data-label ='id'><?= $genero->ge_id?> </th>
                <th data-label ='Descrição'><?php echo utf8_decode($generodesc)?> </th>

                <th>
                    <a href="ControlerAdmin.php?acao=editarGenero&iduser=<?=$id?>&idGenero=<?=$genero->ge_id?>&idusuario=1">Editar</a> |
                    <a href="ControlerAdmin.php?acao=excluirGenero&idGenero=<?=$genero->ge_id?>&idusuario=1">Remover</a>
                </th>
            </tr>


        <?php endforeach; ?>
        <tr>
           <td>
                <a href="ControlerAdmin.php?acao=addGenero&iduser=<?=$id?>">Adicionar novo Genero</a> |
            </td>
        </tr>
        </tbody>
    </table>
 </div>
</div>



</body>
</html>