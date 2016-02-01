
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
                  <div class="col-sm-12" ng-show="filteredItems > 0">
                  <table class="table table-bordered table-striped dataTable no-footer">
                    <thead>
                      <tr role="row">
                        <th>Name</th>
                        <th>Definition</th>
                      </tr>
                    </thead>
                    <tbody ng-init="getData()">
                      <tr class="odd" role="row" ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                        <td>{{ data.name }}</td>
                        <td>{{ data.definition }}</td>
                        <td> 
                          <button type="submit" class="btn btn-sm btn-primary" ng-click="getDataByRole(data)" data-toggle="modal" data-target="#roleModal" name="edit"><span class="glyphicon glyphicon-cog"></span> </button> <button type="submit" class="btn btn-sm btn-success" ng-click="editData(data)" data-toggle="modal" data-target="#editModal" name="edit"><span class="glyphicon glyphicon-edit"></span> </button> <button type="submit" class="btn btn-sm btn-danger" ng-click="deleteData(data.id)" name="delete"><span class="glyphicon glyphicon-trash"></span> </button>
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