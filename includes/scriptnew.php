<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>
	<!-- PopUp -->
	<script src="../js/popup.js"></script>

	<!-- data tables -->
	<script src="../datatables/dataTables.bootstrap4.min.js"></script>
	
	<script>
        $(document).ready(function() {
			// cargar tabla de lista de usuarios
			$('#table1').DataTable({
				"language": {
					"url": "../datatables/Spanish.json"
				},
				responsive: "true",
			});

			// cargar tabla de lista de usuarios
            $('.tbListaUsuarios').DataTable({
                "language": {
                    "url": "../datatables/Spanish.json"
                },
                responsive: "true",
            });

			// cargar tabla de lista de clientes
            $('.tbListaClientes').DataTable({
                "language": {
                    "url": "../datatables/Spanish.json"
                },
                responsive: "true",
            });

			// cargar tabla de lista de clientes para ampliar prestamo
            $('.tableUserAmpliarPrestamo').DataTable({
                "language": {
                    "url": "../datatables/Spanish.json"
                },
                responsive: "true",
            });

			// cargar tabla de ciudades
            $('#tbCiudades').DataTable({
                "language": {
                    "url": "../datatables/Spanish.json"
                },
                responsive: "true",
            });
		});
	</script>
	<!-- data tables -->
	<script type="text/javascript" src="../datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
	<script type="text/javascript" src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="../datatables/DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../datatables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="../datatables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="../datatables/Buttons-1.7.0/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="../datatables/Buttons-1.7.0/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="../datatables/Buttons-1.7.0/js/buttons.print.min.js"></script>
	
	<script src="../js/popper.min.js"></script>