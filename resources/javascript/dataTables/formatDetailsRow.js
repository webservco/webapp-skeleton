function formatDetailsRow(rowData) {

    var div = $('<div/>')
        .addClass( 'loading' )
        .text( 'Loading...' );

    div.load(urlApp + "DataTables/details/" + rowData.DT_RowId + " #content", function(response, status, xhr) {

    }).removeClass( 'loading' );

    return div;
}
