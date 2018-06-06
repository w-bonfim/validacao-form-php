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
        $errors = array();
        if(isset($_POST['acao']) == 'form'){
          
            //array('options'=> array('min_range'=> 18),'max_range'=> 19))
            if(!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)):
                $errors[] = "IDADE invalida";
            endif;
            
            
        }
    ?>
    <h1>Validação</h1>
    
    <?php if(count($errors) > 0): ?>
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= $error ?> </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="acao" value="form"><br>
        Nome: <input type="text" name="nome" placeholder="Nome"><br>
        Sobrenome: <input type="text" name="sobrenome" placeholder="Sobrenome"><br>
        Idade: <input type="text" name="idade" placeholder="Idade"><br>
        E-mail: <input type="text" name="email" placeholde="E-mail"><br>
        <button type="submit">Enviar</button>
    </form>

</body>
</html>