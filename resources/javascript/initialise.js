/* scripts to run on every page load (regular or ajax) */
function initialise() {
    dataTableServerSide(
        "#datatables-simple",
        urlApp + "DataTables/ajax",
        [
            { "data": "id" },
            { "data": "name" },
            { "data": "value" },
        ],
        [[ 2, "asc" ]] // name
    );
}
