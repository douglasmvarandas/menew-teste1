<?php
include_once 'assets/includes/header.php';
include 'connect-bd.php';


?>


<div class="container col-xxl-8 px-4 py-5" id="page-content">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="assets/img/index-image.svg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="80%" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3" style="color:#b82525">Agenda Menew</h1>
      <p class="lead">Organize seus contatos em um único lugar.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="cadastro.php"> <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Cadastre aqui</button></a>
        <a href="agenda.php"> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Acesse sua agenda</button> </a>
      </div>
    </div>
  </div>
</div>






<?php
include_once 'assets/includes/footer.php'
?>