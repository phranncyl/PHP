<?php
session_start();
include_once("conexao.php");
$result_usuario = "SELECT max(id_usuario)+1 as id_usuario_novo FROM usuarios";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$hash="";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "./head.html" ?>

<body>
  <section id="container">
  <?php include "./header.php" ?>
  <?php include "./menu.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Cadastrar Usuário</h3>
        <div class="row mt">
          <div class="col-lg-12">
			
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm"  method="POST" action="proc_cad_usuario.php" enctype="multipart/form-data" >
				
				   <div class="form-group ">
                    <label for="nome" class="control-label col-lg-2">Nome</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="nome" name="nome" type="text" value=""/>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="usuario" class="control-label col-lg-2">Usuário</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="usuario" name="usuario" type="text" value="" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="senha" class="control-label col-lg-2">Senha</label>
                    <div class="col-lg-10">
                      <input  id="senha" name="senha" type="password" value=""/>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="email" name="email" type="email" value=""/>
                    </div>
                  </div>
				  <div class="form-group ">
                    <label for="status" class="control-label col-lg-2">Status: </label>
					<select name="status" id="status" style="margin-left: 15px;">
					<option value="A">Ativo</option>
					<option value="I">Inativo</option>
					<br><br>
					</select>
                  </div>
				  <!--ADVANCED FILE INPUT-->
					
						  <label class="control-label">Foto:</label>
						
							<div class="fileupload fileupload-new" data-provides="fileupload">
							  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							  <?php
								
								$_FILES['file']['name'] = 'profile'.$row_usuario['id_usuario_novo'].'.png';
								$caminho_photo = 'img/portfolio/profile'.$row_usuario['id_usuario_novo'].'.png';								
								echo "<img src='/".$caminho_photo."'>";
							  ?>
							   <!-- <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" /> -->
							  </div>
							  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
							  
								<span class="btn btn-theme02 btn-file">
								<span class="fileupload-new"><i class="fa fa-paperclip"></i>Selecionar</span>
								<span class="fileupload-exists"><i class="fa fa-undo"></i> Alterar</span>
								<input type="file" name="file" />
								</span>
								<a href="list_usuario.php" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Cancelar</a>
							</div>
					<div class="form-group ">
					<div class="col-lg-offset-2 col-lg-10">
					  <button class="btn btn-theme" type="submit">Salvar</button>
					  <a href="list_usuario.php" class="btn btn-theme04" type="button">Cancelar</a>
					</div>
					</div>
				</form>
			</div>
		 </div>
		  </div>
	 </div>
      </section>
      <!-- /wrapper -->
    </section>
 	<?php include "./footer.html" ?>
  </section>
  
  <!-- js placed at the end of the document so the pages load faster -->
  <?php include "./additional.js" ?>
  <?php include "./javascripts.js" ?>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="lib/form-component.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
</body>

</html>
