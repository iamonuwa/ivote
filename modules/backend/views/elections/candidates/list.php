
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
<div class="row" ng-controller="candidatesCtrl">
           <section class="content">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Candidates Registration</h3>
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
                  <div class="col-sm-12" ng-show="filteredItems >= 0">
                  <table class="table table-bordered table-striped dataTable no-footer">
                    <thead>
                      <tr role="row">
                      <th colspan="1" rowspan="1" class="sorting_disabled">Name</th>
                      <th colspan="1" rowspan="1" class="sorting_disabled">Party</th>
                      <th colspan="1" rowspan="1" class="sorting_disabled">Position</th>
                      <th colspan="1" rowspan="1" class="sorting_disabled">Date Registered</th>
                      <th colspan="1" rowspan="1" class="sorting_disabled">Last Modified</th>
                    </tr>
                    </thead>
                    <tbody ng-init="getData()">
                <tr class="odd" role="row" ng-repeat="candidate in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                      <td>{{ candidate.surname }} {{ candidate.firstname }} {{ candidate.othername }}</td>
                      <td>{{ candidate.party }}</td>
                      <td>{{ candidate.office }}</td>
                      <td>{{ candidate.date_created }}</td>
                      <td>{{ candidate.last_update }}</td><td> 
                          <button type="submit" class="btn btn-sm btn-success" ng-click="editData(candidate)" data-toggle="modal" data-target="#editModal" name="edit"><span class="glyphicon glyphicon-edit"></span> </button> <button type="submit" class="btn btn-sm btn-danger" ng-click="deleteData(candidate.id)" name="delete"><span class="glyphicon glyphicon-trash"></span> </button>
                        </td>
                      </tr>
                      </tbody>
                  </table></div></div>
                  <div class="row">
                  <div class="col-sm-5">
                  <div aria-live="polite" role="status" id="datatables_info" class="dataTables_info">{{ totalItems}} registered candidates</div>
                  </div><div class="col-sm-7">
                  <div id="datatables_paginate" class="dataTables_paginate paging_simple_numbers">
                   <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                </div></div></div></div>
                </div>

                <div class="box-footer clearfix">
                <div class="btn-group">
                   <a href="#/create-new" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Register New Candidate</a>
                </div>
                 <div class="pull-right"></div>
                </div>
                </form>
              </div>
              </div>
        </section>
      </div>
      </div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="candidatesCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">Edit {{ item.surname }} {{ item.firstname }} {{ item.othername }}</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <form name="editCandidate">
        <div class="form-group">
                      <div class="col-xs-4">
                        <label for="surname" class="control-label">Surname</label>
                        <input type="text" ng-model="item.surname" class="form-control" id="surname">
                      </div>
                  
                 <div class="col-xs-4">
                <label for="firstame" class="control-label">Firstname</label>
                <input type="text" ng-model="item.firstname" class="form-control" id="firstname">
              </div>
               <div class="col-xs-4">
                <label for="othername" class="control-label">Othername</label>
                <input type="text" ng-model="item.othername" class="form-control" id="othername">
              </div>
                    <div class="col-xs-6">
                    <label for="dateofbirth" class="control-label">Date Of Birth</label>
                    <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input class="form-control pull-right" id="dateofbirth" ng-model="item.dateofbirth" type="text">
                        </div>
                    </div>
                <div class="col-md-6">
                        <label for="gender" class="control-label">Gender</label>
                        <select ng-model="item.gender" class="form-control">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                        </select>
                      </div>
              <div class="col-xs-6">
                    <label>Select Political Party</label>
                   <select ng-model="item.party" class="form-control" ng-init="getParties()">
                          <option ng-repeat="party in parties" value="{{party.name}}">{{party.name}}</option>
                        </select>
                  </div>
                  <div class="col-xs-6">
                    <label>Aspired Political Office</label>
                    <select ng-model="item.office" class="form-control" ng-init="getOffices()">
                          <option ng-repeat="office in offices" value="{{office.name}}">{{office.name}}</option>
                        </select>
                  </div>

              <div class="col-xs-4">
                    <label>Select Edu Qualification</label>
                     <select ng-model="item.education" class="form-control">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                        </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Select State</label>
                     <select ng-model="item.state" class="form-control" ng-init="getStates()">
                          <option ng-repeat="state in states" value="{{state.name}}">{{state.name}}</option>
                        </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Select Constituency</label>
                     <select ng-model="constituency" class="form-control" ng-init="getLGA()">
                        <option>-- Please Select --</option>
                          <option ng-repeat="lga in lgas" value="{{lga.name}}">{{lga.name}}</option>
                        </select>
                  </div>
              <div class="col-xs-6">
                <label for="phone" class="control-label">Phone Number</label>
                <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                          <input type="text" ng-model="item.phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </div>
              </div>
              <div class="col-xs-6">
                <label for="email" class="control-label">Email Address</label>
                <input type="text" ng-model="item.email" class="form-control" id="email">
              </div>
              </div>
             </form>
        </div>
             </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
            <button type="button" class="btn btn-success" ng-click="updateData(item)"><span class="gyphicon glyphicon-plus-sign"></span> Save Changes</button>
          </div>
             </div>
             </div>
             </div>
