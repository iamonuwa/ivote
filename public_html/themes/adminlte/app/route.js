myApp.config(['$routeProvider',function ($routeProvider){
        $routeProvider
                .when('/',{
                    title: 'backend',
                    templateUrl: BASE_URL + 'backend/base'
                })
                .when('/voters',{
                    title: 'Voters Management',
                    templateUrl: BASE_URL + 'backend/election_voter_list'
                })
                .when('/candidates',{
                    title: 'Candidates Management',
                    templateUrl: BASE_URL + 'backend/election_candidates'
                })
                .when('/users',{
                    title: 'Users Management',
                    templateUrl: BASE_URL + 'backend/election_account_list'
                })
                .when('/locked-accounts',{
                    title: 'Users Management',
                    templateUrl: BASE_URL + 'backend/election_account_locked'
                })
                .when('/setup-election',{
                    title: 'Start Election',
                    templateUrl: BASE_URL + '/backend/election_settings'
                })
                .when('/party',{
                    title: 'Political Party',
                    templateUrl: BASE_URL + '/backend/election_political_party'
                })
                .when('/office', {
                    title: 'Office',
                    templateUrl: BASE_URL + '/backend/election_office'
                })
                .when('/roles',{
                    title: 'Roles Management',
                    templateUrl: BASE_URL + '/backend/election_account_role_list'
                })
                .when('/assign-permission',{
                    title: 'Assign Permissions',
                    templateUrl: BASE_URL + '/backend/election_account_role_edit'
                })
                .when('/permissions',{
                    title: 'Permissions Management',
                    templateUrl: BASE_URL + '/backend/election_account_permission_list'
                })
                .when('/register-voter',{
                    title: 'Voter Registration',
                    templateUrl: BASE_URL + 'backend/election_voter_registration'
                })
                .when('/modify-voter',{
                    title: 'Modify Voter Registration',
                    templateUrl: BASE_URL + 'backend/election_voter_modify'
                })
                .when('/profile',{
                    title: 'My Profile',
                    templateUrl: BASE_URL + 'backend/profile'
                })
                .when('/app-settings',{
                    title: 'Application Settings',
                    templateUrl: BASE_URL + 'backend/web_settings'
                })
                .when('/create-new',{
                    title: 'New Candidate',
                    templateUrl: BASE_URL + 'backend/election_candidates_register'
                })
                .when('/mailer',{
                    title: 'Messaging System',
                    templateUrl: BASE_URL + 'backend/messaging'
                })
                .when('/compose',{
                    title: 'Compose Message',
                    templateUrl: BASE_URL + 'backend/messaging_compose'
                })
                // .when('/logout',{
                //     title: 'Logout User',
                //     templateUrl: BASE_URL + 'backend/login'
                // })
                .otherwise({
                    redirectTo: 'pages/notfound.html'
                });
    }]);