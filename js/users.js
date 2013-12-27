//Prepare jTable
$('#UsersTableContainer').jtable({
    title: 'Table of Users',
    paging: true,
    sorting: true,
    pageSize:10,
    
    actions: {
        listAction:   '/userslist/get_users/',
        updateAction:   '/userslist/update_user/'
    },
    fields: {
        user_id: {
            key: true,
            create: false,
            edit: false,
            list: false
        },
        email: {
            title: 'Email',
            width: '20%'
        },
        admin: {
            title: 'Admin',
            width: '5%',
            type: 'checkbox',
            values: { '0': 'No', '1': 'Yes' },
            defaultValue: '1'
        },
        deleted: {
            title: 'Deleted',
            width: '5%',
            type: 'checkbox',
            values: { '0': 'No', '1': 'Yes' },
            defaultValue: '1'
        },
        modified_date: {
            title: 'Date',
            width: '10%',
            type: 'date',
            create: false,
            edit: false
        }
    }
});

//Load person list from server
$('#UsersTableContainer').jtable('load');
