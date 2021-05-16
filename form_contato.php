<script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
</script>
<div class="row">
  <form class="form-horizontal" name="agenda" action="dao/cad_contato.php" method="post" >
    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" placeholder="Nome" autofocus required>
    </div>
    <div class="form-group">
      <label>Telefone</label>
      <input type="tel" id="telefone" class="form-control" name="telefone" pattern="\([0-9]{2}\) [0-9]{4}-[0-9]{4}$" placeholder="(00) 0000-0000">
    </div>
    <div class="form-group">
      <label>Celular</label>
      <input type="tel" id="celular" class="form-control" name="celular" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(00) 00000-0000" required>
    </div>
    <div class="form-group">
      <label>E-mail</label>
      <input type="email" class="form-control" name="email" placeholder="exemplo@exemplo.com.br" required>
    </div>
    <div class="form-group">
      <label>Cidade</label>
      <input type="text" class="form-control" name="cidade" placeholder="Cidade" autofocus>
    </div>
    <div class="form-group">
      <input type="text" list="estado" name="estado" autocomplete="on" placeholder="Estado">
      <datalist id="estado">
        <option value="Alagoas">
        <option value="Bahia">
        <option value="Paraíba">
        <option value="Pernambuco">
        <option value="Rio Grande do Norte">
      </datalist>  
    </div>
    <div class="form-group">
      <input type="text" list="categoria" name="categoria" autocomplete="on" placeholder="Categoria">
      <datalist id="categoria">
        <option value="Cliente">
        <option value="Fornecedor">
        <option value="Funcionário">
      </datalist>  
    </div>              
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <button type="reset" class="btn btn-primary">Limpar</button>
  </form>
</div>