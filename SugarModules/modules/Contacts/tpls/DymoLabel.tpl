<form id='PrintLabel' name='PrintLabel' method='post' action=''>
    <input name='record' type='hidden' id='record' value='{$RECORD}'/>
    <input name='module' type='hidden' id='module' value='Contacts'/>
    <input name='action' type='hidden' id='action' value='sendpackage'/>
    <input name='name' type='hidden' id='name' value='{$NAME}'/>
    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
            <th style='text-align: right;' scope='row'>Campus Initiative:&nbsp;</th>
            <td><select id='campus_initiatives' multiple='true' name='campus_initiatives[]'>{$CAMPAIGNS}</select>
        </tr>
        <tr>
            <th style='text-align: right;' scope='row'>Printer:&nbsp;</th>
            <td>
                <select id='printersSelect' name='printersSelect'></select>
            </td>

        </tr>
        </tr>
        <tr>
            <th style='text-align: right;' scope='row'>Label:&nbsp;</th>
            <td>
                <select id='label_id' name='label_id'>{$LABELS}</select>
            </td>

        </tr>
    </table>
</form>
