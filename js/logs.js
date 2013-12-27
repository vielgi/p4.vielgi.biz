//Prepare jTable
$('#LogTableContainer').jtable({
    title: 'Table of Logs',
    paging: true,
    sorting: true,
    pageSize: 10,

    actions: {
        listAction:   '/log/get_logs/',
        deleteAction: '/log/delete_log/'
    },
    fields: {
        log_id: {
            key: true,
            create: false,
            edit: false,
            list: true
        },
        
        action: {
            title: 'Action',
            width: '20%'
        },
        fk: {
            title:'FK',
            width:'10%'
        },
        login: {
            title: 'Login',
            width: "10%",
            type: 'checkbox',
            values: { '0': 'No', '1': 'Yes' },
            defaultValue: '1'
        },
        first_name: {
            title: 'First Name',
            width: '20%',
            create: false,
            edit: false
        },
        last_name: {
            title: 'Last Name',
            width: '20%',
            create: false,
            edit: false
        },
        posted_on: {
            title: 'Date',
            width: '10%',
            type: 'date',
            create: false,
            edit: false
        }
    }
});

//Load person list from server
$('#LogTableContainer').jtable('load');
