<?php


session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>





    <section class="d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <form action="login/confirmation" method="post" class="col col-md-6">



                    <div class="panel panel-primary text-center">
                        <div class="mb-3 display-3 h5">Login Person</div>
                    </div>


                    <div class="form-group mb-0">
                        <label class="control-label h5" for="curso">cpf</label>

                        <div>
                            <input name="cpf" placeholder="cpf" class="form-control" type="number" />
                        </div>

                        <label class="control-label h5" for="curso">password</label>

                        <div>
                            <input name="password" placeholder="password" class="form-control" type="password" />
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prosseguir"></label>
                        <div class="col-md-8">
                            <button type="submit" name="prosseguir" class="btn btn-success" type="Submit">prosseguir</button>

                            <a href="/">
                                <button type="button" name="Cancelar" class="btn btn-danger" type="submit">Cancelar</button>
                            </a>
                        </div>
                    </div>

                </form>

            </div>
        </div>



    </section>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>