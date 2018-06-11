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
    if(isset($_POST['form'])):
        $errors = array();

        $nome      = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        
        $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
        if(!filter_var($idade, FILTER_VALIDATE_INT)):
            $errors[] = 'Idade inválida!';
        endif;

        $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_FLOAT);
        if(!filter_var($peso, FILTER_VALIDATE_FLOAT)):
            $errors[] = 'Peso inválido';
        endif;

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
            $errors[] = 'E-mail inválido';
        endif;

        $site = filter_input(INPUT_POST, 'site', FILTER_SANITIZE_URL);
        if(!filter_var($site, FILTER_VALIDATE_URL)):
            $errors[] = 'Site inválido';
        endif;

    endif;
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
        E-mail: <input type="text" name="email" placeholder="E-mail"><br>
        Site: <input type="text" name="site" placeholder="Site"><br>
        <button type="submit" name="form">Enviar</button>
    </form>

</body>
</html>