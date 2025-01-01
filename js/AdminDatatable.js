window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    var table = new DataTable('#AdminTable', {
    layout: {
        topStart: {
           /*buttons: [
                {   
                    text: 'Edit Record',
                    action: function (e, dt, node, config) {
                        
                        window.location.href = "AdminViewRecordPage.php"
                    },
                    enabled: false
                },
                
            ]*/
        }
    },
    select: true
});
 
table.on('select deselect', function () {
    var selectedRows = table.rows({ selected: true }).count();
 
    table.button(0).enable(selectedRows === 1);
    table.button(1).enable(selectedRows > 0);
});
});
