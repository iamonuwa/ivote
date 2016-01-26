var myApp = angular.module('ivoterApp', ['ngRoute', 'ngAnimate','ngResource','ui.bootstrap','camera']);  

myApp.controller('navController', function ($scope){
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  3;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;

    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };

});

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
                .when('/logout',{
                    title: 'Logout User',
                    templateUrl: BASE_URL + 'backend/login'
                })
                .otherwise({
                    redirectTo: 'pages/notfound.html'
                });
    }]);

myApp.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
    });

//Login Controller
myApp.controller('loginCtrl', function($scope, $http, $location){
                $scope.user = [];
                $scope.loginAccount = function(){
                $http.post(BASE_URL + 'api/login/', 
            {
                'username' : $scope.username,
                'password' : $scope.password
            }).success(function (message){
                $scope.user = message;
                window.location = BASE_URL + 'backend';
            }).error(function (message){
                console.log(message);
                toastr.warning(message);
            });
                }
});

//Accounts Controller
myApp.controller('accountsCtrl', function($scope, $http, $route) {
    $scope.users    =  [];

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

  //Retrieve from API
    $scope.getData = function() {
            $http.get(BASE_URL + "api/accounts/index/").success(function(data)
            {
        $scope.users = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
            });
        }
    
    //Post to API
     $scope.add = function() {
        $scope.data = [];
        $scope.pass = randomString(10);
        $http.post(BASE_URL + 'api/accounts/index/', 
            {
                'surname'     : $scope.surname, 
                'firstname'     : $scope.firstname, 
                'othername'    : $scope.othername,
                'dateofbirth' : $scope.dateofbirth,
                'gender' : $scope.gender,
                'phone' : $scope.phone,
                'occupation' : $scope.occupation,
                'email' : $scope.email,
                'name' : randomString(7, "N"),
                'pass' : $scope.pass
            }
        )
        .success(function (message) {
          toastr.success(message)
            // $scope.reset();
            console.log(message);
            $route.reload();
        })
        .error(function (message){
           toastr.warning(message)
        });
    }

    $scope.reset = function(){
        $scope.surname = '';
        $scope.firstname = '';
        $scope.othername = '';
        $scope.dateofbirth = '';
        $scope.gender = '';
        $scope.phone = '';
        $scope.email = '';
    }

    $scope.deleteData = function (index) {
        // console.log(index);
        var x = confirm("Are you sure you want to block this account?");
     if(x){
        $http.delete(BASE_URL + "api/accounts/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }

    $scope.updateData = function (index) {
        var data = {
                surname     : index.surname, 
                firstname   : index.firstname, 
                othername   : index.othername,
                dateofbirth : index.dateofbirth,
                gender      : index.gender,
                phone       : index.phone,
                occupation  : index.occupation,
                email       : index.email
        };
        $http.put(BASE_URL + "api/accounts/index/" + data)
        .success(function (message) {
            // toastr.success(message)
            console.log(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }
});

//Lock Controller
myApp.controller('lockCtrl', function($scope, $http, $route) {
    $scope.users    =  [];

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

  //Retrieve from API
    $scope.getData = function() {
            $http.get(BASE_URL + "api/locked_accounts/index/").success(function(data)
            {
        $scope.users = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
            });
        }
       $scope.deleteData = function (index) {
        // console.log(index);
        var x = confirm("Are you sure you want to unblock this account?");
     if(x){
        $http.delete(BASE_URL + "api/locked_accounts/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }
  
});

//Voters Controller
myApp.controller('voterCtrl', function($scope, $http, $route) {
    $scope.users    =  [];

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

  //Retrieve from API
    $scope.getData = function() {
            $http.get(BASE_URL + "api/accounts/index/").success(function(data)
            {
        $scope.users = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
            });
        }
   
    //Post to API
     $scope.add = function() {
        $scope.data = [];
        $http.post(BASE_URL + 'api/accounts/index/', 
            {
                'surname'     : $scope.surname, 
                'firstname'     : $scope.firstname, 
                'othername'    : $scope.othername,
                'dateofbirth' : $scope.dateofbirth,
                'gender' : $scope.gender,
                'phone' : $scope.phone,
                'occupation' : $scope.occupation,
                'email' : $scope.email,
                'name' : randomString(7, "N"),
                'pass' : randomString(10)
            }
        )
        .success(function (message) {
          toastr.success(message)
            // $scope.reset();
            $route.reload();
        })
        .error(function (message){
           toastr.warning(message)
        });
    }

    $scope.reset = function(){
        $scope.surname = '';
        $scope.firstname = '';
        $scope.othername = '';
        $scope.dateofbirth = '';
        $scope.gender = '';
        $scope.phone = '';
        $scope.email = '';
    }

    $scope.deleteData = function (index) {
        console.log(index);
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/accounts/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }

    $scope.updateData = function (index) {
        var data = {
                surname     : index.surname, 
                firstname   : index.firstname, 
                othername   : index.othername,
                dateofbirth : index.dateofbirth,
                gender      : index.gender,
                phone       : index.phone,
                occupation  : index.occupation,
                email       : index.email
        };
        $http.put(BASE_URL + "api/accounts/index/" + data)
        .success(function (message) {
            // toastr.success(message)
            console.log(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }
});


//Roles Controller
myApp.controller('rolesCtrl', function ($scope, $http, $route) {
    $scope.roles = [];

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };
    $scope.getData = function() {
            $http.get(BASE_URL + "api/roles/index/").success(function(data)
            {
            // $scope.roles = data;    
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
            });
        }

    $scope.addData = function () {
        $http.post(BASE_URL + "api/roles/index",
        {
            'name' : $scope.name,
            'definition' : $scope.definition
        })
        .success(function (message) {
            toastr.success(message);
            $route.reload();
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }

    $scope.getDataByRole = function (index) {
        // console.log(index)
        $http.get(BASE_URL + "api/permissions/index")
        .success(function (data) {
            // console.log(index)
            angular.element(document.getElementById("roleModal")).scope().item = data;
            angular.element(document.getElementById("roleModal")).scope().role = index;
        })
        .error(function (data) {
        });
    }

    $scope.checkboxSelection = function () {
        var selection = [];
        // console.log(document.getElementById("test"));
        var chkBox = document.getElementById("checkBox");
        var chkBox_input = chkBox.length;
        for(var i=0; i<chkBox_input; i++) {
            if(chkBox[i].type == 'checkbox' && chkBox[i].checked == true) selection.push(chkBox[i].value);
          }
          return selection;
    } 
    $scope.addPermToRole = function() {
       var getCheckBox = $scope.checkboxSelection();
       alert(getCheckBox);
        // $scope.selection = [];
        // $scope.toggleSelection = function toggleSelection(index) {
        //     var idx = $scope.selection.indexOf(index);
        //     console.log(index);
        // // }
        //     if (idx > -1) {
        //    $scope.selection.splice(idx, 1);
        //  }
        //   else {
        //     // $scope.selection.push(index);
        //     console.log(selection);
        //         }
        //     };
    }

    $scope.updateData = function (id, name, definition) {
        $http.put(BASE_URL + "api/roles/index/" + id + "/" + name + "/" + definition)
        .success(function (message) {
            toastr.success(message)
            // console.log(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }

    $scope.deleteData = function (index) {
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/roles/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }
});

//Permission Controller
myApp.controller('permissionsCtrl', function ($scope, $http, $route) {
    $scope.permissions = [];

     $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

    $scope.getData = function() {
        $http.get(BASE_URL + "api/permissions/index").success(function (data) {
            // $scope.permissions = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        });
    }



    $scope.addData = function () {
        $http.post(BASE_URL + "api/permissions/index",
        {
            'name' : $scope.name,
            'description' : $scope.description
        }).success(function (message) {
            toastr.success(message)
            $route.reload();
        })
        .error(function (message) {
            toastr.warning(message)
            $route.reload();
        });
    }
    $scope.updateData = function (id, name, definition) {
        $http.put(BASE_URL + "api/permissions/index/" + id + "/" + name + "/" + definition)
        .success(function (message) {
            toastr.success(message)
            // console.log(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }
    $scope.deleteData = function (index) {
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/permissions/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }
   
});

//Party Controller
myApp.controller('partiesCtrl', function ($scope, $http, $route) {
    $scope.getData = function () {
        $http.get(BASE_URL + "api/parties/index").success(function (data){
            // $scope.parties = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        });
    }
        $scope.addData = function () {
            $http.post(BASE_URL + "api/parties/index",
        {
           'name' : $scope.name,
           'slug' : $scope.slug,
           'definition' : $scope.definition,
           'picture'    : '1'
        })
        .success(function (message) {
            toastr.success(message)
        })
        .error(function (message) {
            toastr.warning(message)
        });
        }

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

    $scope.updateData = function (id, name, slug, description) {
        $http.put(BASE_URL + "api/parties/index/" + id + "/" + name + "/" + slug + "/" + description)
        .success(function (message) {
            toastr.success(message);
            $route.reload();
            // console.log(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }

        $scope.deleteData = function (index) {
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/parties/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }
});

//Office Controller
myApp.controller('officeCtrl', function ($scope, $http, $route) {
    
    $scope.getData = function () {
    $http.get(BASE_URL + "api/office/index").success(function (data) {
        // $scope.offices = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
     });
    }
    
    $scope.addData = function () {
        $http.post(BASE_URL + "api/office/index",
        {
            'name' : $scope.name
        })
        .success( function (message) {
            $scope.reset();
            toastr.success(message);
            $scope.getData();
            $route.reload();
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message);
        });
    }
    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };
    $scope.updateData = function (id, name) {
        $http.put(BASE_URL + "api/office/index/" + id + "/" + name)
        .success(function (message) {
            toastr.success(message)
            // console.log(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }
    $scope.deleteData = function (index) {
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/office/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }
    $scope.reset = function () {
        $scope.name = '';
    }
});
// Candidates Controller
myApp.controller('candidatesCtrl', function ($scope, $http) {
    $scope.getData = function() {
        $http.get(BASE_URL + 'api/candidates/index').success(function (data) {
             // $scope.candidates = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        })
    }
    $scope.deleteData = function (index) {
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/candidates/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }
});

// Election Controller
myApp.controller('electionCtrl', function ($scope, $http, $route) {
    $scope.getData = function() {
        $http.get(BASE_URL + 'api/elections/index').success(function (data) {
             // $scope.candidates = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        })
    }

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };
    $scope.updateData = function (id, title, category, election_date, duration) {
        $http.put(BASE_URL + "api/elections/index/" + id  + "/" + title + "/" + category + "/" + election_date + "/" + duration)
        .success(function (message) {
            toastr.success(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }

    $scope.addData = function () {
        $http.post(BASE_URL + "api/elections/index",
        {
            'title' : $scope.title,
            'category' : $scope.category,
            'election_date': $scope.election_date,
            'duration' : $scope.duration
        })
        .success( function (message) {
            // $scope.reset();
            toastr.success(message);
            console.log(message);
            $scope.getData();
            $route.reload();
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message);
        });
    }

    $scope.deleteData = function (index) {
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/elections/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
            // alert(message);
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
            // alert(message)
        });
    }
        else{}
        }
});
// Profile Controller
myApp.controller('profileCtrl', function ($scope, $http, $route) {
    $scope.getData = function() {
        $http.get(BASE_URL + 'api/elections/index').success(function (data) {
             // $scope.candidates = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        })
    }

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };
    $scope.updateData = function (id, title, category, election_date, duration) {
        $http.put(BASE_URL + "api/elections/index/" + id  + "/" + title + "/" + category + "/" + election_date + "/" + duration)
        .success(function (message) {
            toastr.success(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }

});