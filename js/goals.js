//Prepare jTable
$('#GoalTableContainer').jtable({
    title: 'All Goals',
    paging: true,
    sorting: true,
    pageSize: 10,


    actions: {
        listAction:   '/goals/get_goals/'
    },
    fields: {
        goal_id: {
            key: true,
            create: false,
            edit: false,
            list: false
        },
        last_name: {
            title: 'Last Name',
            width: '20%',
            create: false,
            edit: false
        },
        first_name: {
            title: 'First Name',
            width: '20%',
            create: false,
            edit: false
        },
        goals: {
            title: 'Goals',
            width: '50%',
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
            width: '20%',
            type: 'date',
            create: false,
            edit: false
        }
    }
});

//Load person list from server
$('#GoalTableContainer').jtable('load');
