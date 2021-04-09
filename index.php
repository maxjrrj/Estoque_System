<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./css/estilo.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="sidenav">
         <div class="login-main-text">
            <h2>Auto Mecânica<br> Indio</h2>
            <p>Sistema de Serviços Internos.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="processa_login.php" method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="login" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="senha" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-secondary">Login</button>
                  <button type="submit"  class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
      </div>



</body>
</html>