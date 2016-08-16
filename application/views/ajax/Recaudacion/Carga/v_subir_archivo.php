
<div class="row">
	<!-- <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">-->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-pencil-square-o"></i> 
				<?= $tituloPagina; ?>
			<span>>  
				<?= $subTituloPagina; ?>
			</span>
		</h1>
	</div>
</div>

<div class="alert alert-block alert-warning">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Formato del archivo!</h4>
	<p>
		Utilize la plantilla Excel correspondiente a esta carga de datos, de lo contrario el sistema podria no ser capaz de leer optimamente los datos ingresados.
	<button type="button" class="btn btn-labeled btn-success" id="bajarPlantilla">
        <i class="glyphicon glyphicon-cloud-download"></i> Descargar Formato
    </button>
    </p>
    
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- START ROW -->

	<div class="row">

		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-6">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3"  data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Solo se permiten archivos de tipo Excel.</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="Recaudacion/Carga/Subir" id="excelForm" class="smart-form" enctype="multipart/form-data" method="post">
						
							<header>
								Seleccione el archivo a procesar.
							</header>
							
							<fieldset>
									
								<section>
									<label class="label">Archivo</label>
									<label for="file" class="input input-file">
										<div class="button"><input type="file" name="userfile" onchange="this.parentNode.nextSibling.value = this.value">Buscar</div><input type="text" placeholder="Excel" readonly="">
									</label>
								</section>
                                								
							</fieldset>
							
							<fieldset>
									
								<section>
									<label class="label">Clientes</label>
									<label class="select">
										<select name="cboClientes" id="cboClientes">
											<option value="0" selected="" disabled="">Seleccione</option>
											<?= $cboClientes; ?>
										</select><i></i>
									</label>
								</section>
                                								
							</fieldset>
							<footer>
								<button type="submit" class="btn btn-primary" id="subirExcel">
									Subir
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->				

		</article>
		<!-- END COL -->

	</div>

	<!-- END ROW -->

</section>
<!-- end widget grid -->

		
<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript">
	pageSetUp();
	
	var pagefunction = function() {
		
	};
	// end pagefunction
	
	// Load form valisation dependency 
	loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
    
    $( "#bajarPlantilla" ).click(function( event ) {
 		event.preventDefault();
       
        datos = "",
		url = "downloads/PlantillaCargaDatos.xlsx";
		
        var link = document.createElement("a");
        link.download = name;
        link.href = url;
        link.click();
	});
	
	$("#excelForm").validate({
		rules : {
			cboClientes : {
				required : true
			}
		},

		messages : {
			cboClientes : {
				required : 'Debe seleccione un cliente'
			}
		},
		
		submitHandler: function(form) {
			var formData = new FormData($("#excelForm")[0]);
	
			$.ajax({
				url: $("#excelForm").attr("action"),
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "html",
				success: function (data) {
					$('#content').html(data);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert("error");
				}
			});
		},
		
		errorPlacement : function(error, element) {
			error.insertAfter(element.parent());
		}
		
	});		
		
	
</script>
