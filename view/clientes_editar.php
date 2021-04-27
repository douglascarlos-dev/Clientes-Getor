<!doctype html>
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

<div class="card">
<div class="card-body">
<?php

function Mask($mask,$str){
  $str = str_replace(" ","",$str);
  for($i=0;$i<strlen($str);$i++){
      $mask[strpos($mask,"#")] = $str[$i];
  }
  return $mask;
}

$resultado = $cliente->get_cliente($cpf);
?>
<form action="<?php echo ENDERECO; ?>/clientes/atualizar/<?php echo $resultado["cpf"]; ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Nome</label>
      <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $resultado["nome"]; ?>" maxlength="100">
      
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">E-mail</label>
      <input type="text" class="form-control" id="inputEmail" name="email" value="<?php echo $resultado["email"]; ?>" maxlength="100">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCPF">CPF</label>
      <input type="text" class="form-control" id="inputCPF" name="cpf" value="<?php echo Mask("###.###.###-##",$resultado["cpf"]); ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputDataDeNascimento">Data de Nascimento</label>
      <input type="date" class="form-control" id="inputDataDeNascimento" name="data_de_nascimento" value="<?php echo $resultado["data_de_nascimento"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputSexo">Sexo</label>
        <select name="sexo" id="selectSexo" class="form-control">
          <option value='Masculino' name='Masculino'  <?php if($resultado["sexo_cliente"] == 'Masculino') { echo 'selected'; } ?>>Masculino</option>
          <option value='Feminino' name='Feminino' <?php if($resultado["sexo_cliente"] == 'Feminino') { echo 'selected'; } ?>>Feminino</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="selectEstadoCivil">Estado Civil</label>
            <select id="selectEstadoCivil" name='estado_civil' class="form-control">
            <option value="Solteiro" name='Solteiro' <?php if($resultado["estado_civil_cliente"] == 'Solteiro') { echo 'selected'; } ?>>Solteiro</option>
                <option value="Casado" name='Casado' <?php if($resultado["estado_civil_cliente"] == 'Casado') { echo 'selected'; } ?>>Casado</option>
                <option value="Divorciado" name='Divorciado' <?php if($resultado["estado_civil_cliente"] == 'Divorciado') { echo 'selected'; } ?>>Divorciado</option>
                <option value="Viúvo" name='Viúvo' <?php if($resultado["estado_civil_cliente"] == 'Viúvo') { echo 'selected'; } ?>>Viúvo</option>
            </select>
    </div>
  </div>
  
  <?php

$telefone = $cliente->get_cliente_telefone($cpf);

foreach($telefone as &$value):

    echo "<div class=\"form-row\">";
    echo "<div class=\"form-group col-md-6\">";
    echo "<label for=\"inputTipoTelefone\">Telefone</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputTipoTelefone\" name=\"tipo_telefone\" value=\"" . $value["tipo"] . "\" readonly>";
    
    echo "</div>";
    echo "<div class=\"form-group col-md-5\">";
    echo "<label for=\"inputTelefone\">Número</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputTelefone\" name=\"telefone\" value=\"" . Mask("(##) # ####-####",$value["telefone"]) . "\" readonly>";
    
    echo "</div>";

    echo "<div class=\"form-group col-md-1\">
      <label for=\"inputZip\">Apagar</label>
      <a class=\"btn btn-danger\" href=\"";echo ENDERECO; echo "/telefones/apagar/";
    echo $cpf;
    echo "/";
    echo $value["tipo"];
    echo "/";
    echo $value["telefone"];
    echo "\" role=\"button\">Deletar</a>
    </div>";

    echo "</div>";

endforeach;
  ?>
  
  

  <button type="submit" class="btn btn-primary">Atualizar</button>
  <a class="btn btn-outline-primary" id="novoTelefone" href="<?php echo ENDERECO; ?>/telefones/novo/<?php echo $cpf; ?>" role="button">Adicionar telefone</a>
  <a class="btn btn-danger" href="<?php echo ENDERECO; ?>/clientes/deletar/<?php echo $cpf; ?>" role="button">Deletar</a>

  
</form>

</div>

</div>
</div>

<script type="text/javascript" src="<?php echo ENDERECO; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo ENDERECO; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>