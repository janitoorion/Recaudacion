
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

<div class="alert alert-block alert-warning">
	<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Error</h4>
	<p>
		<?= $error; ?>
        </br>
        <button type="button" class="btn btn-default" id="btnVolver">
            Volver
        </button>
    </p>
    
</div>

        
<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript">
	pageSetUp();
	
	var pagefunction = function() {
		
	};
	
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
