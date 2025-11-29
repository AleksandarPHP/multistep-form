@extends('cms.layout.container')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">HOME</a>
    </li>
    <li class="breadcrumb-item active">Optionen</li>
</ol>
<h1>Optionen</h1>
<hr>
<a href="{{ url()->full().'/create'}}" class="btn btn-primary mb-3">Hinzufügen <i class="fa-solid fa-plus"></i></a>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Liste</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableSSR" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Item</th>
                    <th class="nosort text-center">Aktion</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th> 
                    <th>Status</th>
                    <th>Item</th>
                    <th class="nosort text-center">Aktion</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(function() {
   $(document).on('click', '.confirmation', function(e) {
       e.preventDefault();
       if (confirm('Da li ste sigurni?')) $('#delete-form'+$(this).attr('data-id')).submit();
   });
});

$(document).ready(function() {
    $('#dataTableSSR').DataTable({
    'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['nosort']
    }],
    'language': {
        "sEmptyTable":     "Die Tabelle enthält keine Daten.",
        "sInfo":           "Anzeige_START_ do _END_ od gesamt _TOTAL_ Aufzeichnungen",
        "sInfoEmpty":      "Anzeige0 do 0 od gesamt 0 Aufzeichnungen",
        "sInfoFiltered":   "(filtrirano od gesamt _MAX_ Aufzeichnungen)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ".",
        "sLengthMenu":     "Zeigen _MENU_ Aufzeichnungen",
        "sLoadingRecords": "Učitavanje...",
        "sProcessing":     "Obrada...",
        "sSearch":         "Suchen:",
        "sZeroRecords":    "Nisu pronađeni odgovarajući zapisi",
        "oPaginate": {
            "sFirst":    "HOME",
            "sLast":     "Poslednja",
            "sNext":     "Nächste",
            "sPrevious": "Vorherige"
        },
        "oAria": {
            "sSortAscending":  ": aktivirajte da sortirate kolonu uzlazno",
            "sSortDescending": ": aktivirajte da sortirate kolonu silazno"
        }
    },
    "bProcessing": true,
    "serverSide": true,
    "ajax": {
        url: "{{ url('cms/accessories/ajax') }}",
        type: "post",
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        },
        error: function(){
            $("#dataTableSSR_processing").css("display","none");
            alert('Došlo je do greške prilikom učitavanja podataka, molimo pokušajte ponovo učitati stranicu.')
        }
    },
    "createdRow": function (row, data, index) {
        $(row).find('td:eq(2)').addClass("text-center");
        $(row).find('td:eq(3)').addClass("text-center");
        $(row).find('td:eq(4)').addClass("text-center");
    },
    "order": [[ 0, "asc"]],
    // "rowCallback": function(row, data, index) {
    //     if(data[3] == "Izdavanje") {
    //         $(row).find('td:eq(3)').css('background-color', '#d2fad7');
    //     } else if(data[3] == "Prodaja") {
    //         $(row).find('td:eq(3)').css('background-color', '#d5d8f3');
    //     } else {
    //         $(row).find('td:eq(3)').css('background-color', '#f3d5d5');
    //     }
    // }
  });
});
</script>
@endsection