<?php
$inicial= $_REQUEST['contato'];

$busca = mysqli_query($con, "select * from agenda where cod_contato = '$inicial'" ) or trigger_error('Erro ao executar consutla. Detalhes = ' . mysqli_error());
$dados = mysqli_fetch_array($busca);

?>

<div class="row" >
  <form class="form-horizontal"  >
    <div class="form-group">
      <label>Código</label>
      <input type="text" class="form-control" id="disabledInput" name="cod_contato" value="<?php echo $dados['cod_contato']; ?>" autofocus required disabled>
    </div>
    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" id="disabledInput" name="nome" placeholder="Nome" value="<?php echo $dados['nome']; ?>" autofocus required disabled>
    </div>
    <div class="form-group">
      <label>E-mail</label>
      <input type="email" class="form-control" id="disabledInput" name="email" placeholder="exemplo@exemplo.com.br" value="<?php echo $dados['email']; ?>" required disabled>
    </div>
    <div class="form-group">
      <label>Telefone</label>
      <input type="tel" class="form-control" id="disabledInput" name="telefone" pattern="\([0-9]{2}\) [0-9]{4}-[0-9]{4}$" placeholder="(00) 0000-0000" value="<?php echo $dados['telefone']; ?>" disabled>
    </div>
    <div class="form-group">
      <label>Celular</label>
      <input type="tel" class="form-control" id="disabledInput" name="celular" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(00) 00000-0000" value="<?php echo $dados['celular']; ?>" required disabled>
    </div>
    <div class="form-group">
      <input type="text" id="disabledInput" list="cidade" name="cidade" autocomplete="on" placeholder="Cidade" value="<?php echo $dados['cidade']; ?>" disabled>
      <datalist id="cidade">
        <option value="Aracaju">
        <option value="Delmiro">
        <option value="Maceió">
        <option value="Pariconha">
        <option value="Petrolândia">
      </datalist>  
    </div>
    <div class="form-group">
      <input type="text" id="disabledInput" list="estado" name="estado" autocomplete="on" placeholder="Estado" value="<?php echo $dados['estado']; ?>" disabled>
      <datalist id="estado">
        <option value="Alagoas">
        <option value="Bahia">
        <option value="Pernambuco">
        <option value="Sergipe">
      </datalist>  
    </div>
    <div class="form-group">
      <input type="text" id="disabledInput" list="categoria" name="categoria" autocomplete="on" placeholder="Categoria" value="<?php echo $dados['categoria']; ?>" disabled>
      <datalist id="categoria">
        <option value="Alagoas">
        <option value="Bahia">
        <option value="Pernambuco">
        <option value="Sergipe">
      </datalist>  
    </div>
  </form>
</div>