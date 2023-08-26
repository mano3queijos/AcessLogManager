<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>person register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>


    <section class="d-flex">
        <div class="container">
            <div class="row justify-content-center">



                <form action="person/form/save" method="post" class="col col-md-6">


                    <div class="panel panel-primary text-center">
                        <div class="mb-3 display-3 h5">Person Register</div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="control-label h5" for="Name"> Name: </label>

                        <div>
                            <input name="name" placeholder="name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="control-label h5" for="birthday"> Birthday </label>

                        <div>
                            <input name="birthday" placeholder="birthday" class="form-control" type="date">
                        </div>
                    </div>


                    <div class="form-group mb-4">
                        <label class="control-label h5" for="CPF"> CPF: </label>

                        <div>
                            <input name="cpf" placeholder="cpf" class="form-control" type="number">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="control-label h5" for="phoneNumber"> Phone number: </label>

                        <div>
                            <input name="phoneNumber" placeholder="PhoneNumber" class="form-control" type="number">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="control-label h5" for="email"> Email: </label>

                        <div>
                            <input name="email" placeholder="email" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="control-label h5" for="password"> Password: </label>

                        <div>
                            <input name="password" placeholder="Password" class="form-control" type="password">
                        </div>
                    </div>


                    <label class="col-md-2 control-label" for="prosseguir"></label>

                    <div class="col-md-8">
                        <button type="submit" name="prosseguir" class="btn btn-success" type="Submit">Save
                            person</button>


                        <a href="/">


                            <button type="button" name="Cancelar" class="btn btn-danger" type="submit">Cancelar</button>
                        </a>


                    </div>

                </form>


            </div>
        </div>

    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


</body>

</html>