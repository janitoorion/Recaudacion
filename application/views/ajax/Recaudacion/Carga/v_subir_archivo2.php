<div class="row hidden-mobile">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-pencil-square-o"></i> 
				<?= $tituloPagina; ?> 
			<span>>  
				<?= $subTituloPagina; ?>
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-align-center">
		<h1 class="page-title txt-color-blueDark">
			<input type="hidden" id="rutCliente" value="<?= $rutCliente; ?>">
			<i class="fa-fw fa fa-user"></i><?= $nombreCliente; ?>
			<span>
				<?= $rutCliente; ?>
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-align-right">
		<div class="page-title">
			<a href="#" id="btnVolver" class="btn btn-default">Cancelar</a>
			<a href="#" id="btnProcesar" class="btn btn-primary">Procesar</a>
		</div>
	</div>
</div>
<!-- 
<div class="alert alert-block alert-success">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Formato del archivo!</h4>
	<p>
		Evalue si los datos que se procesaran estan correctos antes de aceptar la carga de datos.
    </p>
    
</div>
 -->
<!-- widget grid -->
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-blueDark" id="grillaClienteMoroso" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Documentos de la Carga</h2>

				</header>

				<div>

					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					
					<div class="widget-body no-padding table-responsive">

						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
					        <?= $grilla; ?>
						</table>

					</div>
				
				</div>
			</div>
		</article>
	</div>
	
</section>
<!-- end widget grid -->
		
<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript">
	pageSetUp();
	
	// pagefunction	
	var pagefunction = function() {
		
		var responsiveHelper_dt_basic = undefined;
		var responsiveHelper_datatable_fixed_column = undefined;
		var responsiveHelper_datatable_col_reorder = undefined;
		var responsiveHelper_datatable_tabletools = undefined;
		
		var breakpointDefinition = {
			pc : 1700,
			tablet : 1024,
			phone : 480
		};
		
		var datatableLang = "";
		
		if ($('#idiomaSelec').val() == "en"){
			datatableLang = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json";
		}
		else{
			datatableLang = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json";
		}
				
		$('#dt_basic').dataTable({
			"language": {
				"url": datatableLang
			},
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			}
		});
		
	};
		
	loadScript("assets/js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("assets/js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("assets/js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("assets/js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("assets/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});
	
	$( "#btnVolver" ).click(function( event ) {
 		event.preventDefault();
        datos = "",
		url = "Recaudacion/Carga/SubirArchivo/TRUE";
		
		var posting = $.get( url, { data:datos } );
		
		posting.done(function( data ) {
			$( "#content" ).html( data );
		});
        
	});
	
	$( "#btnProcesar" ).click(function( event ) {
 		event.preventDefault();
		
		/* CERRAR TODOS LOS DETALLES ABIERTOS (A LA MALA)*/
		$("tbody tr.detail-show").each(function(index) {
			$(this).removeClass('detail-show');
		});
		$("tbody tr.row-detail").each(function(index) {
			$(this).remove();
		});
		/* --- */
		
        checkfunction();
		
		var myRows = [];
		var headersText = [];
		var $headers = $("th");

		// Loop through grabbing everything
		var $rows = $("tbody tr").each(function(index) {
		$cells = $(this).find("td");
		myRows[index] = {};
		$cells.each(function(cellIndex) {
			// Set the header text
			if(headersText[cellIndex] === undefined) {
			headersText[cellIndex] = $($headers[cellIndex]).text().split(' ').join('_');
			}
			// Update the row object with the header/cell combo
			myRows[index][headersText[cellIndex]] = $(this).text();
		});    
		});
		
		var myObj = {
			"data": myRows
		};
		var jsondata
		datos = (JSON.stringify(myObj));
		
		url = "Recaudacion/Carga/ProcesarArchivo/";
		var posting = $.post( url, { data:datos, cliente:$("#rutCliente").val() } );
		
		posting.done(function( data ) {
			$( "#content" ).html( data );
		});
        
	});
	
	$( "#grilla" ).click(function( event ) {
 		event.preventDefault();
        datos = "",
		url = "Recaudacion/Carga/SubirArchivo/TRUE";
		
		var posting = $.get( url, { data:datos } );
		
		posting.done(function( data ) {
			$( "#content" ).html( data );
		});
        
	});
	
		
	var checkfunction = function() {
		$("#dt_basic tbody tr").each(function (index) 
		{
			$(this).children("td").each(function (index2) 
			{
				if (index2 == 0){
					if ($(this).children("label").children("input").is(":checked")) { 
						$(this).html("1");
					}
					else{
						$(this).html("0");
					}
				}
			})
			
		})
	};
	
	
</script>
