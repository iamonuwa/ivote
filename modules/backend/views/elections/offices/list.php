
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $this->lang->line('dashboard');?>
            <small><?= $this->lang->line('control_panel');?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= $this->lang->line('home');?></a></li>
            <!-- <li class="active">{{ title }}</li> -->
          </ol>
        </section>
        <div class="content">
<div class="row" ng-controller="officeCtrl">
<section class="content">
  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><?= $this->lang->line('contestable_position_registration');?></h3>
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
                       <th colspan="1" rowspan="1" class="sorting_disabled"><?= $this->lang->line('office');?></th>
                      <th colspan="1" rowspan="1" class="sorting_disabled"><?= $this->lang->line('created_by');?></th>  
                      <th colspan="1" rowspan="1" class="sorting_disabled"><?= $this->lang->line('last_modified_date');?></th>
                      </tr>
                    </thead>
                    <tbody ng-init="getData()">
                <tr class="odd" role="row" ng-repeat="data in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <!-- <td width="1%"><input name="selector[]" ng-modal="index" id="selector[]" value="{{ officer.id }}" type="checkbox"></td> -->
                    <td>{{ data.name }}</td>
                    <td>{{ data.officer }}</td>
                    <td>{{ data.last_update | date:'medium'}}</td>
                        <td>  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal" ng-click="editData(data)" title="Modify Office" ><span class="glyphicon glyphicon-edit"></span></button> 
                        <button type="submit" class="btn btn-sm btn-danger" ng-click="deleteData(data.id)" name="unblock" title="Remove Office"><span class="glyphicon glyphicon-trash"></span></button></td>
                      </tr>
                      </tbody>
                  </table></div></div>
                  <div class="row">
                  <div class="col-sm-5">
                  <div aria-live="polite" role="status" id="datatables_info" class="dataTables_info">{{ totalItems}} <?= $this->lang->line('registered_offices');?></div>
                  </div><div class="col-sm-7">
                  <div id="datatables_paginate" class="dataTables_paginate paging_simple_numbers">
                   <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                </div></div></div></div>
                </div>

                <div class="box-footer clearfix">
                <div class="btn-group">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-plus-sign"></span> <?= $this->lang->line('create_new_position');?></button>
                </div>
                 <div class="pull-right"></div>
                </div>
                </form>
              </div>
              </div>
        </section>
      </div>
      </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="officeCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel"><?= $this->lang->line('create_new_position');?></h4>
      </div>
      <div class="modal-body">
        <form name="add">
         
        <div class="row">
          <div class="form-group">
          <div class="col-xs-12">
            <label for="title" class="control-label"><?= $this->lang->line('title');?></label>
             <input type="text" ng-model="name" class="form-control" id="title" required>
          </div>
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()"><?= $this->lang->line('close');?></button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="addData()">
        <span class="gyphicon glyphicon-plus-sign"></span> <?= $this->lang->line('create_new_position');?></button>
      </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="officeCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">Edit Office # {{ item.id }}</h4>
      </div>
      <div class="modal-body">
        <form name="addPermission">
        <div class="form-group">
          <label><?= $this->lang->line('title');?></label>
          <input type="text" ng-model="item.name" class="form-control">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" ng-click="getData()" data-dismiss="modal"><?= $this->lang->line('close');?></button>
        <button type="button" class="btn btn-success" ng-click="updateData(item.id, item.name)">
        <span class="glyphicon glyphicon-edit"></span> <?= $this->lang->line('save_changes');?></button>
      </div>
    </div>
  </div>
</div>
