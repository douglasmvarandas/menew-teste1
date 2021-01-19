<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>	

	<?php include('application/views/template/config.php');?>

	<title>Agenda Menew</title>

	
</head>
<body class="bg-light">

    <?php include('application/views/template/header.php');?>

    <div class="container h-100">

      <div class="py-5 text-center">
        <h2>Projeto Agenda - Menew</h2>
      </div>

      <div class="row h-100 justify-content-center align-items-center">

        <div class="card card-body bg-white table-responsive">
            <h4 class="mb-3">Listar</h4>

            <!-- Campo de Busca -->
            <?php echo form_open('agenda_menew/listar/'. $this->uri->segment(3))?>
            <div class="input-group mb-2 col-md-6 row">
                <input type="text" class="form-control" name="busca" placeholder="Digite o nome do contato e tecle enter">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                </div>
            </div>
            </form>

            <hr>

            <?php 
                if($this->session->flashdata('remove-ok') != ''){
                    echo '<div class="alert alert-success">Registro removido com sucesso.</div>';
                }

                if($this->session->flashdata('remove-error') != ''){
                    echo '<div class="alert alert-danger">O registro não pode ser removido pois existem outros registros que dependem dele.</div>';
                }

                if($total_rows == 0 && !$this->input->post('busca')){
                    echo '<div class="alert alert-info">Nenhum resultado encontrado para sua pesquisa.</div>';
                } else if($total_rows == 0){
                    echo '<div class="alert alert-info">Nenhum resultado encontrado.</div>';
                } else {
            ?>
            <table class="table table-bordered">
				<thead>
					<tr class="table-title">							
						<th>Nome</th>
						<th>Telefone</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th class="text-center" style="width:115px">::</th>
					</tr>
				</thead>
				<tbody>
				  <?php foreach($contatos as $row){?>
					  <tr>
						  <td><?php echo $row->nome?></td>
                          <td><?php echo $row->telefone?></td>
                          <td><?php echo $row->email?></td>
                          <td><?php echo $row->cidade?></td>
                          <td><?php echo $row->estado?></td>
                          <td><?php echo $row->categoria?></td>
							<td class="text-center">
                                <a class="btn btn-warning editar-contato" href="<?php echo base_url('agenda_menew/editar/'. $row->id)?>"><i class="fas fa-edit"></i></a> 
				                <a class="btn btn-danger excluir-contato" data-id-usuario="<?php echo $row->id?>"><i class="fas fa-trash-alt"></i></a>
							</td>				
						</tr>
                    <?php } ?>
				</tbody>
			</table>
            <?php }?>
        </div>

      </div>

    </div>
    <script type="text/javascript">
        $(function(){
            // Remover Contato
            $('.excluir-contato').click(function(){
                var id = $(this).attr('data-id-usuario');
                var r = confirm('Você está prestes a remover um registro.\n\nConfirma operação?');
                if(r == true){
                    location.href = "<?php echo base_url('agenda_menew/remover')?>/" + id;
                }
            });
        });
    </script>
</body>
</html>