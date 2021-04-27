<?php
//define('ENDERECO', '/php-pdo-oop-clean-urls-postgresql');
?><!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ENDERECO; ?>/css/bootstrap.min.css" crossorigin="anonymous">

   
    <title>Sistema 1.0</title>
  </head>
  <body>
  <?php require_once 'menu.php'; ?>




  <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">

  <div class="alert alert-danger d-none" role="alert" id="myDIV">Certifique-se de que todos os campos estão preenchidos e tente novamente.</div>

<div class="card">
<div class="card-body">
<form name="register" action="<?php echo ENDERECO; ?>/telefones/cadastrar/<?php echo $cpf; ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Descrição</label>
      <select id="selectTipo" name="tipo" class="form-control">
          <option value='Casa' name='Casa' selected>Casa</option>
          <option value='Celular' name='Celular'>Celular</option>
          <option value='Recado' name='Recado'>Recado</option>
          <option value='Trabalho' name='Trabalho'>Trabalho</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputTelefone">Telefone</label>
      <input type="text" class="form-control" id="inputTelefone" name="telefone" maxlength="11">
    </div>
  </div>

  <a class="btn btn-outline-primary" href="<?php echo ENDERECO; ?>/clientes/editar/<?php echo $cpf; ?>" role="button">Cancelar</a> 
  <button type="submit" class="btn btn-primary">Cadastrar</button> 

</form>

</div>

</div>
</div>

<script
    type="text/javascript"
    src="<?php echo ENDERECO; ?>/js/jquery-3.5.1.slim.min.js"
    
  ></script>
<script src="<?php echo ENDERECO; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


    <script type="text/javascript">
    $(document).ready(function () {

        $('form[name="register"]').on("submit", function (e) {

            var usertelefone = $(this).find('input[name="telefone"]');

            if ($.trim(usertelefone.val()) === "") {
                $("#myDIV").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#myDIV").addClass('d-none');
            }
        });

    });
    </script>
</body>
</html>