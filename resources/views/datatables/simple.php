<h1>DataTables</h1>

<p>Simple example without database. Search and filter not functional.</p>

<table id="datatables-simple" class="table table-sm table-striped<?php /* doesn't work for complex headers ?>dt-responsive */ ?>" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th><?=__('Id')?></th>
            <th><?=__('Name')?></th>
            <th><?=__('Value')?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th><?=__('Id')?></th>
            <th><?=__('Name')?></th>
            <th><?=__('Value')?></th>
        </tr>
    </tfoot>
</table>
