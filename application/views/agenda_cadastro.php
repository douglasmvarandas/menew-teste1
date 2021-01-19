<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>	

	<?php include('application/views/template/config.php');?>

	<title>Agenda Menew</title>

	
</head>
<body class="bg-light">

	<!-- Header -->
	<?php include('application/views/template/header.php'); ?>

	<div class="container h-100">
		<div class="py-5 text-center">
        	<h2>Projeto Agenda - Menew</h2>
      	</div>

		<div class="row h-100 justify-content-center align-items-center">

			<div class="card card-body bg-white col-md-7">
				<h4 class="mb-3">Cadastro de contato</h4>

				<!-- Formulário -->
				<?php
					if(isset($msg_sucesso)){
						echo '<div class="alert alert-success">Registro salvo com sucesso. Redirecionando...</div>
								<script type="text/javascript">window.setTimeout(function () { location.href = "'.base_url('agenda_menew/listar/').'"}, 2000);</script>';    
					} elseif(isset($msg_erro)){
						echo '<div class="alert alert-danger">Não foi possível realizar a operação. Tente novamente.</div>
							  <a href="'.base_url('agenda_menew').'" class="btn btn-primary">Voltar</a>';
					} else {

						echo form_open('agenda_menew', 'id="form"');
				?>

						<div class="row">
							
							<div class="col-md-6 mb-3">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" placeholder="Insira seu nome" value="<?php echo set_value('nome')?>">
								<div class="text-danger">
									<?php echo form_error('nome'); ?>
                        		</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
                        		<label for="telefone">Telefone</label>
                        		<input type="text" class="form-control telefone" name="telefone" placeholder="Insira seu telefone" value="<?php echo set_value('telefone')?>">
								<div class="text-danger">
									<?php echo form_error('telefone'); ?>
                        		</div>
                    		</div>

							<div class="col-md-6 mb-3">
                        		<label for="email">Email</label>
                        		<input type="text" class="form-control" name="email" placeholder="Insira seu email" value="<?php echo set_value('email')?>">
								<div class="text-danger">
									<?php echo form_error('email'); ?>
                        		</div>
                    		</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
                        		<label for="cidade">Cidade</label>
                        		<input type="text" class="form-control" name="cidade" placeholder="Insira o nome da cidade" value="<?php echo set_value('cidade')?>">
								<div class="text-danger">
									<?php echo form_error('cidade'); ?>
                        		</div>
                    		</div>

							<div class="col-md-4 mb-3">
                        		<label for="estados">Estados</label>
								<?php echo form_dropdown('estado', $this->Model_agenda->getEstadosOpc(), set_value('estado'), 'class="custom-select d-block w-100"')?>
								<?php echo form_error('estado'); ?>
                    		</div>
						</div>

						<div class="row">
							<div class="col-md-5 mb-3">
								<label for="categorias">Categorias</label>
								<?php echo form_dropdown('categoria', $this->Model_agenda->getCategoriasOpc(), set_value('categoria'), 'class="custom-select d-block w-100"')?>
							</div>
						</div>

						<hr class="mb-4">
                		<input value="Enviar" name="submit" class="btn btn-dark btn-lg btn-block" type="submit">
				<?php }?>
			</div>
		
		</div>

	</div>
    <script>

		jQuery("input.telefone")
				.mask("(99) 9999-9999?9")
				.focusout(function (event) {  
					var target, phone, element;  
					target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
					phone = target.value.replace(/\D/g, '');
					element = $(target);  
					element.unmask();  
					if(phone.length > 10) {  
						element.mask("(99) 99999-999?9");  
					} else {  
						element.mask("(99) 9999-9999?9");  
					}  
				});
    </script>
</body>
</html>