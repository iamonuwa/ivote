var myApp = angular.module('ivoterApp', ['ngRoute', 'ngAnimate','ngResource','ui.bootstrap','omr.directives']);  

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
myApp.directive('datePicker', function($parse, $timeout){
    return {
        restrict: 'A',
        replace: true,
        transclude: false,
        compile: function(element, attrs) {
          return function (scope, slider, attrs, controller) {
            $(attrs.selector).datepicker();
          };
        }
    };
});

myApp.directive('editorWYSIWYG', function($parse, $timeout){
    return {
        restrict: 'A',
        replace: true,
        transclude: false,
        compile: function(element, attrs) {
          return function (scope, slider, attrs, controller) {
            $(attrs.selector).wysihtml5();
          };
        }
    };
});

myApp.directive('inputMask', function($parse, $timeout){
    return {
        restrict: 'A',
        replace: true,
        transclude: false,
        compile: function(element, attrs) {
          return function (scope, slider, attrs, controller) {
            $(attrs.selector).inputmask();
          };
        }
    };
});



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
myApp.controller('loginCtrl', function ($scope, $http, $location){
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

//Dashboard Controller
myApp.controller('dashboardCtrl', function ($scope, $http) {
    $scope.getComputerName = function () {
        $http.get(BASE_URL + 'dashboard/getComputerName').success(function (data) {
            $scope.getComputer = data;
        })
    }
    $scope.getIpAddress = function () {
        $http.get(BASE_URL + 'dashboard/getIpAddress').success(function (data) {
            $scope.getIP = data;
        })
    }
    $scope.getCurrentUser = function () {
            $http.get(BASE_URL + 'users/currentUser').success(function (data) {
                $scope.CurrentUser = data;
            })
    }
});

//Accounts Controller
myApp.controller('accountsCtrl', function ($scope, $http, $route) {
    $scope.users    =  [];

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

  //Retrieve from API
    $scope.getData = function() {
        $('.overlay, .loading-img').show();
            $http.get(BASE_URL + "api/accounts/index/").success(function(data)
            {
        $scope.users = data;
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
            });
            $('.overlay, .loading-img').hide();
        }
    
    //Post to API
     $scope.add = function() {
        $scope.data = [];
        // $scope.pass = randomString(10);
        $http.post(BASE_URL + 'api/accounts/index/', 
            {
                'surname'     : $scope.surname, 
                'firstname'     : $scope.firstname, 
                'othername'    : $scope.othername,
                'dateofbirth' : $scope.dateofbirth,
                'gender' : $scope.gender,
                'phone' : $scope.phone,
                'occupation' : $scope.occupation,
                'picture': $scope.picture,
                'email' : $scope.email,
                'name' : randomString(7, "N")
                // 'pass' : $scope.pass
            }
        )
        .success(function (message) {
          toastr.success(message)
            $scope.reset();
            console.log($scope.picture);
            $route.reload();
        })
        .error(function (message){
            console.log($scope.picture);
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
        var x = confirm("Are you sure you want to block this account?");
     if(x){
        $http.delete(BASE_URL + "api/accounts/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
        });
    }
        else{}
        }

    $scope.getRoles = function() {
        $http.get(BASE_URL + 'api/roles').success(function (data) {
                $scope.roles = data;
        });
    }

    $scope.updateData = function (id, surname, firstname, othername, dateofbirth, gender, phone) {
        $http.put(BASE_URL + "api/accounts/index/" +  id + "/" + surname + "/" + firstname + "/" + othername + "/" + dateofbirth + "/" + gender + "/" + phone)
        .success(function (message) {
            toastr.success(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }

   });

//Lock Controller
myApp.controller('lockCtrl', function ($scope, $http, $route) {
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
        var x = confirm("Are you sure you want to unblock this account?");
     if(x){
        $http.delete(BASE_URL + "api/locked_accounts/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
        });
    }
        else{}
        }
  
});

//Voters Controller
myApp.controller('voterCtrl', function ($scope, $http, $route) {
    $scope.users    =  [];

    $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

  //Retrieve from API
    $scope.getData = function() {
            $http.get(BASE_URL + "api/voters/index/").success(function(data)
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
        var vm = this;
        $scope.data = [];
        $http.post(BASE_URL + 'api/voters/index/', 
            {
                'surname'     : $scope.surname, 
                'firstname'     : $scope.firstname, 
                'othername'    : $scope.othername,
                'dateofbirth' : $scope.dateofbirth,
                'gender' : $scope.gender,
                'phone' : $scope.phone,
                'occupation' : $scope.occupation,
                'name' : randomString(7, "N"),
                'picture' : $scope.picture
            }
        )
        .success(function (message) {
          toastr.success(message)
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
        var x = confirm("Are you sure you want to delete this?");
     if(x){
        $http.delete(BASE_URL + "api/voters/index/" + index)
        .success(function (message) {
            $scope.getData();
            toastr.success(message)
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
        });
    }
        else{}
        }

    $scope.updateData = function (surname, firstname, othername, dateofbirth, gender, phone, occupation, email) {
        $http.put(BASE_URL + "api/voters/index/" + surname + "/" + firstname + "/" + othername + "/" + dateofbirth + "/" + gender + "/" + phone + "/" + occupation + "/" + email, {cache:true})
        .success(function (message) {
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
        var chkBox = document.getElementById("checkBox");
        var chkBox_input = chkBox.length;
        for(var i=0; i<chkBox_input; i++) {
            if(chkBox[i].type == 'checkbox' && chkBox[i].checked == true) selection.push(chkBox[i].value);
          }
          return selection;
    } 
    $scope.addPermToRole = function(index, data) {
        var selection = [];
        var chkBox = document.getElementById("checkBox");
        var chkBox_input = chkBox.length;
        for(var i=0; i<chkBox_input; i++) {
            if(chkBox[i].type == 'checkbox' && chkBox[i].checked == true) selection.push(chkBox[i].value);
          }
          console.log(chkBox_input);
    }

    $scope.updateData = function (id, name, definition) {
        $http.put(BASE_URL + "api/roles/index/" + id + "/" + name + "/" + definition)
        .success(function (message) {
            toastr.success(message)
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
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
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
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
        });
    }
        else{}
        }
   
});

//Party Controller
myApp.controller('partiesCtrl', function ($scope, $http, $route) {
    $scope.getData = function () {
        $http.get(BASE_URL + "api/parties/index").success(function (data){
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
            $route.reload();
            toastr.success(message)
        })
        .error(function (message) {
            $route.reload();
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
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
        });
    }
        else{}
        }
});

//Office Controller
myApp.controller('officeCtrl', function ($scope, $http, $route) {
    
    $scope.getData = function () {
    $http.get(BASE_URL + "api/office/index").success(function (data) {
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
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
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
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
            })
    }
    $scope.getParties = function() {
        $http.get(BASE_URL + 'api/parties').success(function (data) {
                $scope.parties = data;
        });
    }
    $scope.getOffices = function() {
        $http.get(BASE_URL + 'api/office').success(function (data) {
                $scope.offices = data;
        });
    }
    $scope.getStates = function() {
        $http.get(BASE_URL + 'election_candidates/getState').success(function (data) {
                $scope.states = data;
        });
    }

    $scope.getLGA = function (index) {
        $http.get(BASE_URL + 'election_candidates/getLGAByState/'+ index).success(function (data) {
            $scope.lgas = data;
        });
    }

    $scope.addData = function (file) {
        // console.log($scope.holder);
        // Form Upload

// function MyCtrl ($scope) {
//     $scope.data = {};
//     $scope.add = function () {
        var holder = document.getElementById('file').files[0],
        r = new FileReader();
        r.onloadend = function (e) {
            // $scope.data = e.target.result;
            console.log(e.target.result);
        }
            console.log(e.target.result);

//         r.readAsBinaryString(holder);
//     }
// }
        // $http.post(BASE_URL + 'api/candidates/index', {
        //     'surname'       : $scope.surname,
        //     'firstname'     : $scope.firstname,
        //     'othername'     : $scope.othername,
        //     'dateofbirth'   : $scope.dateofbirth,
        //     'gender'        : $scope.gender,
        //     'party'         : $scope.party,
        //     'office'        : $scope.office,
        //     'education'     : $scope.education,
        //     'state'         : $scope.state,
        //     'constituency'  : $scope.constituency,
        //     'phone'         : $scope.phone,
        //     'email'         : $scope.email,
        //     'picture'       : $scope.picture
        // }).success( function (message) {
        //     toastr.success(message)
        // }).error( function (message) {
        //     toastr.warning(message)
        //     console.log(message)
        // });
    }

     $scope.editData = function (index) {
         angular.element(document.getElementById("editModal")).scope().item = index;
        };

    $scope.updateData = function (index) {
        // var data = {
        //         surname     : index.surname, 
        //         firstname   : index.firstname, 
        //         othername   : index.othername,
        //         dateofbirth : index.dateofbirth,
        //         gender      : index.gender,
        //         party       : index.party,
        //         office      : index.office,
        //         education   : index.education,
        //         state       : index.state,
        //         constituency: index.constituency,
        //         phone       : index.phone,
        //         email       : index.email
        // };
        $http.put(BASE_URL + "api/candidates/index/" + index.id + "/" + index.surname + "/" + index.firstname + "/" + index.othername + "/" + index.dateofbirth + "/" + index.gender + "/" + index.party + "/" + index.office + "/" + index.education + "/" + index.state + "/" + index.constituency + "/" + index.phone + "/" + email)
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
    $scope.updateData = function (id, title, category, election_date, duration, status) {
        $http.put(BASE_URL + "api/elections/index/" + id  + "/" + title + "/" + category + "/" + election_date + "/" + duration + "/" + status)
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
            'duration' : $scope.duration,
            'status' : $scope.status
        })
        .success( function (message) {
            toastr.success(message);
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
        })
        .error(function (message) {
            $scope.getData();
            toastr.warning(message)
        });
    }
        else{}
        }
});
// Profile Controller
myApp.controller('profileCtrl', function ($scope, $http, $route) {
    $scope.getData = function() {
        $http.get(BASE_URL + 'users/currentUser').success(function (data) {
        $scope.user = data;    
        })
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
        $http.put(BASE_URL + "api/accounts/index/" + index.id + "/" + index.surname + "/" + index.firstname + "/" + index.othername + "/" + index.dateofbirth + "/" + index.gender + "/" + index.phone )
        .success(function (message) {
            toastr.success(message)
        })
        .error(function (message) {
            toastr.warning(message)
        })
    }

});