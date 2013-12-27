//Prepare jTable
$('#PeopleTableContainer').jtable({
    title: 'Table of Plans',
    paging: true,
    sorting: true,
    pageSize: 10,


    actions: {
        listAction:   '/plans/get_plans',
        createAction: '/plans/create_plan/',
        updateAction: '/plans/update_plan/',
        deleteAction: '/plans/delete_plan/'
    },
    fields: {
        plan_id: {
            key: true,
            create: false,
            edit: false,
            list: false
        },
        description: {
            title: 'Description',
            width: '25%'
        },
        time: {
            title: 'Hours',
            width: '10%'
        },
        last_name: {
            title: 'Last Name',
            width: '15%',
            create: false,
            edit: false
        },
        first_name: {
            title: 'First Name',
            width: '15%',
            create: false,
            edit: false
        },
        public: {
            title: 'Public',
            width: "5%",
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
$('#PeopleTableContainer').jtable('load');
