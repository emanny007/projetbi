<!-- Jquery JS-->
<script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{asset('vendor/slick/slick.min.js')}}"> </script>

<script src="{{asset('vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!-- Datatables  JS-->
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
<script src="{{asset('DataTables/DataTables-1.10.18/js/jquery.datatables.min.js')}}"></script>
<!-- pdf Datatables  JS-->
<script src="{{asset('DataTables/build/pdfmake.min.js')}}"></script>
<script src="{{asset('DataTables/build/vfs_fonts.js')}}"></script>
<!-- Main JS-->
<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('DataTables/build/buttons.html5.min.js')}}"></script>
<script src="{{asset('DataTables/build/buttons.print.min.js')}}"></script>
<script src="{{asset('DataTables/build/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('DataTables/build/jszip.min.js')}}"></script>
<script src="{{asset('DataTables/build/jszip.min.js')}}"></script>



<script language="JavaScript">
$('#myTable').DataTable( {
    buttons: [
        {
            extend: 'pdfHtml5',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
    ]
} );




$(document).ready( function () {
    $('#examplccsddze').DataTable( {
        "order": [[ 1, "asc" ]]
    } );
} );

$('#example').DataTable( {
    language: {
        processing:     "Traitement en cours...",
        search:         "Rechercher&nbsp;:",
        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Chargement en cours...",
        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        paginate: {
            first:      "Premier",
            previous:   "Pr&eacute;c&eacute;dent",
            next:       "Suivant",
            last:       "Dernier"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }

    },

} );




function afficherAutre() {
  var a = document.getElementById("autre");
  var m = document.getElementById("date_fin");

  if (document.form1.type_contrat.value == "CDI")
  {
  	if (a.style.display == "block")
		  a.style.display = "none";

  	if (m.style.display == "block")
		m.style.display = "none";
  }
  else
  {
  	a.style.display = "block";
	m.style.display = "block";
  }
}


$(document).ready(function() {
    var printCounter = 0;

    // Append a caption to the table before the DataTables initialisation
    $('#examples').append('<caption style="caption-side: bottom">A fictional</caption>');

    $('#examples').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.'
            },
            {
                extend: 'pdf',
                messageBottom: null
            },
            {
                extend: 'print',
                messageTop: function () {
                    printCounter++;

                    if ( printCounter === 1 ) {
                        return 'This is the first time you have printed this document.';
                    }
                    else {
                        return 'You have printed this document '+printCounter+' times';
                    }
                },
                messageBottom: null
            }
        ]
    } );
} );



</script>
