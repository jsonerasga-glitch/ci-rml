<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>RML ++</title>
        <meta name="description" content="The small framework with powerful features">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
        <div class="container-fluid" style="background: rgba(0,0,0,0.5); position: absolute; height:100%;">
            <div class="row mt-4">
                <div class="col-4"></div>
                <div class="col-4 mt-5 p-4" style="background-color:white; border-radius:5px;">
                    <form class="form-signin">
                        <h3 class="h3 mb-3 font-weight-normal text-center">Admin login</h3>
                        <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="height:40px;">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div> 
                                    <input type="text" class="login-input form-control" required name="username" placeholder="Username" autofocus="true"/ style="outline-color: black;"> 
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="height:40px;">
                                            <i class="fas fa-unlock-alt"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="login-input form-control" required name="password" placeholder="Password"/> 
                                </div>
                        <div class="checkbox mb-3">
                        </div>
                        <a class="btn btn-lg btn-primary btn-block text-center form-control" type="submit" href="dashboardAdmin">Login</a>
                      
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>