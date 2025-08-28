// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['nosort']
    }],
    "oLanguage": {
        "sProcessing":   "Procesiranje u toku...",
        "sLengthMenu":   "Zeigen _MENU_ elemenata",
        "sZeroRecords":  "Nije pronađen nijedan rezultat",
        "sInfo":         "Anzeige_START_ do _END_ od gesamt _TOTAL_ elemenata",
        "sInfoEmpty":    "Anzeige0 do 0 od gesamt 0 elemenata",
        "sInfoFiltered": "(filtrirano od gesamt _MAX_ elemenata)",
        "sInfoPostFix":  "",
        "sSearch":       "Suchen:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "HOME",
            "sPrevious": "Prethodna",
            "sNext":     "Nächste",
            "sLast":     "Poslednja"
        }
    }
  });
});