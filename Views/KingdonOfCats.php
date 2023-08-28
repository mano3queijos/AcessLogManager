<?php


session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redireciona o usuário para a página de login ou exibe uma mensagem de erro
    header("Location: /");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kingdon of cats</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="/cat.css">

</head>


<body>

    <section class="d-flex">
        <div class="container">
            <div class="row justify-content-center">


                <div class="col col-md-12">
                    <h2>Welcome to the Kingdom of Cats!</h2>

                    <div id="vote-options" class="vote-options">
                        <button class="btn btn-primary" onClick="vote(1)">Vote Up </button>
                        <button class="btn btn-warning" onClick="vote(-1)">Vote Down </button>
                        <button class="btn btn-info" onClick="showHistoricVotes()">History </button>

                        <div>
                            <img id="image-to-vote-on" class="col-lg"></img>
                        </div>

                    </div>

                    <div id="vote-results" class="vote-results">
                        <button class="btn btn-primary" onClick="showVoteOptions()">Show Vote Options</button>
                        <div id="grid" class="imgrid">
                        </div>
                    </div>
                    <div class="btn-group">
                        <form action="/exit/confirmation" method="post">
                            <div class="col-md-2">
                                <button type="submit" name="exit" class="btn btn-danger">Exit</button>
                            </div>
                        </form>
                    </div>
                    <a href="/list">
                        <button type="submit" class="btn btn-success" type="Submit">Lista de usuarios</button>
                    </a>
                </div>


            </div>
    </section>





</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="/cat.js"></script>


</html>