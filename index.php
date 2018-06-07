<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validação</title>
    <style>

    </style>
</head>
<body>
    <?php 
        //Validações
        $errors = array();
        if(isset($_POST['form'])){
          
            if(!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)):
                $errors[] = 'Idade inválida';
            endif;

            if(!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)):
                $errors[] = 'E-mail inválido';
            endif;

            if(!$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT)):
                $errors[] = 'Peso inválido';
            endif;
        }
    ?>
    <h1>Validação</h1>
    <!-- Mensagens -->
    <?php if(count($errors) > 0): ?>
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= $error ?> </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Formulário -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        Nome: <input type="text" name="nome" placeholder="Nome"><br>
        Sobrenome: <input type="text" name="sobrenome" placeholder="Sobrenome"><br>
        Idade: <input type="text" name="idade" placeholder="Idade"><br>
        Peso: <input type="text" name="peso" placeholder="Peso"><br>
        E-mail: <input type="text" name="email" placeholde="E-mail"><br>
        <button type="submit" name="form">Enviar</button>
    </form>

</body>
</html>