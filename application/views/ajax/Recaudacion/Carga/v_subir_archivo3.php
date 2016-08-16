
<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
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
</br>
<div <?= $tipoMensaje; ?> >
	<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> <?= $tituloMensaje; ?></h4>
	<p>
		<?= $mensaje; ?>
        </br>
        <button type="button" class="btn btn-default" id="btnVolver">
            Volver
        </button>
    </p>
    
</div>

<!-- widget grid -->
<section id="widget-grid" class="" <?= $grillaVisible; ?> >
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-blueDark" id="grillaClienteMoroso" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Documentos no procesados</h2>

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
</script>
