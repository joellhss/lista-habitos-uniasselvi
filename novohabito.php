<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Lista de hábitos</title>
</head>
<body>
<div class="main jumbotron bg-light">
    <h1>Novo Hábito</h1>
    <!-- Formulário para cadastro de pessoas
    Note a utilização do atributo name, que
    faz
    o link entre os elementos do DOM e o
    JavaScript-->
    <form id="formulario" action="inserirhabito.php">
        <div class="mb-3 d-flex flex-column">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu novo hábito" autofocus />
        </div>
        <input class="btn btn-primary" type="submit" value="Criar">
    </form>
</div>
<script type="text/javascript">
    // Declara uma função para
    // validar o formulário
    var validaForm = function(){
        var nomeHabito = document.getElementById("nome").value;
        if ("" == nomeHabito){
            alert("É necessário informar o nome do Hábito");
            return false;
        }
    }
    // Aqui declaramos que esta
    // função ocorre sempre no
    // submit do formulário
    document.getElementById("formulario").
        onsubmit = validaForm;
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>