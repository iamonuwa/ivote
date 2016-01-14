
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li class="active">{{ title }}</li> -->
          </ol>
        </section>
         <div class="content">
      <div class="row" ng-controller="accountsCtrl">
<section class="content">
  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"> Staff Accounts Management</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box">
                <div class="box-header">
                </div>
                <form>
                <div class="box-body">
                  
                  <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatables_wrapper">
                  <div class="row">
                  <div class="col-sm-6">
                  <div id="datatables_length" class="dataTables_length">
                  <label>Show 
                  <select ng-model="entryLimit" class="form-control input-sm" aria-controls="datatables" name="datatables_length">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  </select> entries</label>
                  </div></div
                  ><div class="col-sm-6">
                  <div class="dataTables_filter" id="datatables_filter">
                  <label>Search:<input aria-controls="datatables" placeholder="" ng-model="search" ng-change="filter()" class="form-control input-sm" type="search"></label>
                  </div></div></div>
                  <div class="row">
                  <div class="col-sm-12" ng-show="filteredItems > 0">
                  <table class="table table-bordered table-striped dataTable no-footer">
                    <thead>
                      <tr role="row">
                        <th>Name</th>
                        <th>ID Number</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <!-- <th>Gender</th> -->
                        <th>Unit</th>
                      </tr>
                    </thead>
                    <tbody ng-init="getData()">
                      <tr class="odd" role="row" ng-repeat="user in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                        <td>{{ user.surname+', '+user.firstname+' '+user.othername }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.phone }}</td>
                        <!-- <td>{{ user.gender }}</td> -->
                        <td>{{ user.occupation }}</td>
                        <td> <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal" ng-click="editData(user)" title="Modify Account" ><span class="glyphicon glyphicon-edit"></span></button> 
                        <button type="submit" class="btn btn-sm btn-danger" ng-click="deleteData(user.id)" name="unblock" title="Deactivate Account"><span class="fa fa-lock"></span></button>
                         <button type="submit" class="btn btn-sm btn-primary" ng-click="printData(user)" name="print" title="Print User Details"><span class="glyphicon glyphicon-print"></span></button></td>
                      </tr>
                      </tbody>
                  </table></div></div>
                  <div class="row">
                  <div class="col-sm-5">
                  <div aria-live="polite" role="status" id="datatables_info" class="dataTables_info">{{ totalItems}} registered accounts</div>
                  </div><div class="col-sm-7">
                  <div id="datatables_paginate" class="dataTables_paginate paging_simple_numbers">
                   <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                </div></div></div></div>
                </div>

                <div class="box-footer clearfix">
                <div class="btn-group">
                   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus-sign"></span> Register New Account</button>
                   
                </div>
                 <div class="pull-right"></div>
                </div>
                </form>
              </div>
              </div>
            </div>
         </section>
         </div>
         </div>
         </div>


<!-- <table datatable="" dt-options="dtOptions" dt-columns="dtColumns" class="row-border hover"></table> -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="accountsCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">New Account for {{ surname }}  {{ firstname }} {{ othername }}</h4>
      </div>
      <div class="modal-body">
        <form name="form">
        <div class="row">
          <div class="form-group">
          <div class="col-xs-12 text-center">
              <label ng-model="picture" id="image-holder" ></label>
          </div>
          <div class="col-xs-4">
            <label for="surname" class="control-label">Surname</label>
            <input type="text" ng-model="surname" class="form-control" id="surname" placeholder="john" required>
          </div>
          <div class="col-xs-4">
            <label for="firstame" class="control-label">Firstname</label>
            <input type="text" ng-model="firstname" class="form-control" id="firstname" placeholder="doe" required>
          </div>
          <div class="col-xs-4">
            <label for="otherame" class="control-label">Othername</label>
            <input type="text" ng-model="othername" class="form-control" id="othername" placeholder="cow" required>
          </div>
          </div>
          </div>
          <div class="row">
            <div class="form-group">
            
                <div class="col-xs-6">
                <label for="dateofbirth" class="control-label">Date Of Birth</label>
                <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calender"></i>
                      </div>
                      <input class="form-control" id="datemask" type="text" placeholder="dd/mm/yyyy" required>
                    </div>
                </div>
            <div class="col-md-6">
                    <label for="gender" class="control-label">Gender</label>
                    <select ng-model="gender" class="form-control" required>
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                  </div>
                </div>
          </div>
        <div class="row">
          <div class="form-group">
          <div class="col-xs-6">
            <label for="phone" class="control-label">Phone Number</label>
            <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" ng-model="phone" class="form-control" placeholder="08062457326"required>
                    </div>
          </div>
          <div class="col-xs-6">
            <label for="email" class="control-label">Email Address</label>
            <input type="text" ng-model="email" class="form-control" id="email" placehoder="johndoe@whatever.com" required>
          </div>
          </div>
          </div>
           <div class="row">
          <div class="form-group">
          <div class="col-xs-6">
            <label for="unit" class="control-label">Unit</label>
            <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-map-maker"></i>
                      </div>
                      <input type="text" ng-model="occupation" class="form-control">
                    </div>
          </div>
          <div class="col-xs-6">
            <input id="fileUpload" type="file" />
            <br>
            <button type="button" class="btn btn-default" id="image_alt"> <span class="fa fa-upload"></span>Upload Passport</button>
          </div>
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="add()"><span class="gyphicon glyphicon-plus-sign"></span> Create Account</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="accountsCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">New Account for {{ item.surname }}  {{ item.firstname }} {{ item.othername }}</h4>
      </div>
      <div class="modal-body">
        <form name="addUser">
        <div class="row">
          <div class="form-group">
          <div class="col-xs-4">
            <label for="surname" class="control-label">Surname</label>
            <input type="text" ng-model="item.surname" class="form-control" id="surname" ng-required>
          </div>
          <div class="col-xs-4">
            <label for="firstame" class="control-label">Firstname</label>
            <input type="text" ng-model="item.firstname" class="form-control" id="firstname" required>
          </div>
          <div class="col-xs-4">
            <label for="otherame" class="control-label">Othername</label>
            <input type="text" ng-model="item.othername" class="form-control" id="othername" required>
          </div>
          </div>
          </div>
          <div class="row">
            <div class="form-group">
                <div class="col-xs-6">
                <label for="dateofbirth" class="control-label">Date Of Birth</label>
                <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input class="form-control pull-right" id="dateofbirth" ng-model="item.dateofbirth" type="text" required>
                    </div>
                </div>
            <div class="col-md-6">
                    <label for="gender" class="control-label">Gender</label>
                    <select ng-model="item.gender" class="form-control" required>
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                  </div>
                </div>
          </div>
        <div class="row">
          <div class="form-group">
          <div class="col-xs-6">
            <label for="phone" class="control-label">Phone Number</label>
            <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" ng-model="item.phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                    </div>
          </div>
          <div class="col-xs-6">
            <label for="email" class="control-label">Email Address</label>
            <input type="text" ng-model="item.email" class="form-control" id="email" required>
          </div>
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
        <button type="button" class="btn btn-success" ng-click="updateData(item)"><span class="gyphicon glyphicon-edit"></span> Save Changes</button>
      </div>
    </div>
  </div>
</div>
</div>

</section>
<style>
.size {
    width: 100px;
    height: 100px;
}
.invisible-border {
    border: 1px solid transparent;
}
.myCircle {
    padding: 10px;
    border-radius: 50%;
}
input#fileUpload{position:fixed;top:-100px;}
</style>
<script>
  document.getElementById('image_alt').addEventListener('click',function(){
    document.getElementById('fileUpload').click();
});
</script>
<script>
  $("#fileUpload").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {

             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "img-circle center-block size padding invisible-border"
                     }).appendTo(image_holder);
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
</script>