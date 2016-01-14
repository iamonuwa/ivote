
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
<div class="row" ng-controller="electionCtrl">
<section class="content">
  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Elections Management</h3>
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
                        <th>Title</th>
                        <th>Type</th>
                        <th>Election Date</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Last Modified Date</th>
                      </tr>
                    </thead>
                    <tbody ng-init="getData()">
                      <tr class="odd" role="row" ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                        <td>{{ data.title }}</td>
                        <td>{{ data.category }}</td>
                        <td>{{ data.election_date }}</td>
                        <td>{{ data.created_by }}</td>
                        <td>{{ data.is_active }}</td>
                        <td>{{ data.date_created }}</td>
                        <td>{{ data.last_update }}</td>
                        <td>  <button class="btn btn-sm btn-success" data-toggle="modal" ng-show="!data.is_active == 1" data-target="#editModal" ng-click="editData(data)" title="Modify Election" ><span class="glyphicon glyphicon-edit"></span></button> 
                        <button type="submit" class="btn btn-sm btn-danger" ng-show="!data.is_active == 1" ng-click="deleteData(data.id)" name="unblock" title="Remove Election"><span class="glyphicon glyphicon-trash"></span></button> <button type="submit" class="btn btn-sm btn-primary" ng-click="printData(data)" name="print" title="Print Election Details"><span class="glyphicon glyphicon-print"></span></button></td>
                      </tr>
                      </tbody>
                  </table></div></div>
                  <div class="row">
                  <div class="col-sm-5">
                  <!-- <div aria-live="polite" role="status" id="datatables_info" class="dataTables_info">{{ totalItems}} registered roles</div> -->
                  </div><div class="col-sm-7">
                  <div id="datatables_paginate" class="dataTables_paginate paging_simple_numbers">
                   <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                </div></div></div></div>
                </div>

                <div class="box-footer clearfix">
                <div class="btn-group">
                   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus-sign"></span> Start New Election</button>
                </div>
                 <div class="pull-right"></div>
                </div>
                </form>
              </div>
              </div>
        </section>
      </div>
      </div>
       <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="electionCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">New Election</h4>
      </div>
      <div class="modal-body">
        <form name="add">
         
        <div class="row">
          <div class="form-group">
          <div class="col-xs-6">
            <label for="title" class="control-label">Election Title</label>
             <input type="text" ng-model="title" class="form-control" id="title" required>
          </div>
          <div class="col-xs-6">
            <label for="title" class="control-label">Election Category</label>
            <select ng-model="category" class="form-control" required>
                      <option value="GENERAL ELECTIONS">GENERAL ELECTIONS</option>
                      <option value="BYE-ELECTION">BYE-ELECTION</option>
                      <option value="RE-RUN">RE-RUN</option>
            </select>
          </div>
          <div class="col-xs-8">
            <label for="election_date" class="control-label">Date of Election</label>
            <input type="text" ng-model="election_date" class="form-control" id="date" required>
          </div>
           <div class="col-xs-4">
            <label for="duration" class="control-label">Duration</label>
            <input type="text" ng-model="duration" class="form-control" id="date" required>
          </div>
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="addData()"><span class="gyphicon glyphicon-plus-sign"></span> Create Election</button>
      </div>
    </div>
  </div>
</div>
</div>

 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="electionCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">Modify Election {{ item.title }}</h4>
      </div>
      <div class="modal-body">
        <form name="add">
         
        <div class="row">
          <div class="form-group">
          <div class="col-xs-6">
            <label for="title" class="control-label">Election Title</label>
             <input type="text" ng-model="item.title" class="form-control" id="title" required>
          </div>
          <div class="col-xs-6">
            <label for="title" class="control-label">Election Category</label>
            <select ng-model="item.category" class="form-control" required>
                      <option value="GENERAL ELECTIONS">GENERAL ELECTIONS</option>
                      <option value="BYE-ELECTION">BYE-ELECTION</option>
                      <option value="RE-RUN">RE-RUN</option>
            </select>
          </div>
          <div class="col-xs-8">
            <label for="election_date" class="control-label">Date of Election</label>
            <input type="text" ng-model="item.election_date" class="form-control" id="date" required>
          </div>
           <div class="col-xs-4">
            <label for="duration" class="control-label">Duration</label>
            <input type="text" ng-model="item.duration" class="form-control" id="date" required>
          </div>
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="updateData(item.id, item.title, item.category, item.election_date, item.duration)"><span class="gyphicon glyphicon-plus-sign"></span> Save Changes</button>
      </div>
    </div>
  </div>
</div>
</div>