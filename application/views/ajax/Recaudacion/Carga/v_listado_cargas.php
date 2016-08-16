
<div class="row">
	<!-- <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">-->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
					<h2>Listado de Cargas</h2>				
					
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
						
						<form action="Recaudacion/Carga/ListadoCargasBusc" novalidate="novalidate"  id="filtroForm" class="smart-form" enctype="multipart/form-data" method="post">
						
							<header>
								Seleccione un rango de fechas y un cliente para la búsqueda
							</header>
							
							<fieldset>
                                
							    <div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="startdate" id="startdate" placeholder="Fecha Inicio">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="finishdate" id="finishdate" placeholder="Fecha Final">
										</label>
									</section>
								</div>
														
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
								<button type="submit" class="btn btn-primary" id="btnBuscar">
									Buscar
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
		// START AND FINISH DATE
		$('#startdate').datepicker({
			dateFormat : 'yy-mm-dd',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});
		
		$('#finishdate').datepicker({
			dateFormat : 'yy-mm-dd',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#startdate').datepicker('option', 'maxDate', selectedDate);
			}
		});
	};
	loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
       
	
	$("#filtroForm").validate({
		rules : {
			startdate : {
                required : true
            },
            finishdate : {
                required : true
            },
            cboClientes : {
				required : true
			}
		},

		messages : {
			startdate : {
                required : 'Ingrese una fecha Inicio'
            },
            finishdate : {
                required : 'Ingrese una fecha Final'
            },
            cboClientes : {
				required : 'Debe seleccione un cliente'
			}
		},
		
		submitHandler: function(form) {
			var formData = new FormData($("#filtroForm")[0]);
	
			$.ajax({
				url: $("#filtroForm").attr("action"),
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
