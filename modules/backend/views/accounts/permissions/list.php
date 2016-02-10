
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $this->lang->line('dashboard');?>
            <small><?= $this->lang->line('control_panel'); ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= $this->lang->line('home'); ?></a></li>
            <!-- <li class="active">{{ title }}</li> -->
          </ol>
        </section>
        <div class="content">
<div class="row" ng-controller="permissionsCtrl">
<section class="content">
  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><?= $this->lang->line('permission_management'); ?></h3>
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
                        <th><?= $this->lang->line('name'); ?></th>
                        <th><?= $this->lang->line('definition'); ?></th>
                      </tr>
                    </thead>
                    <tbody ng-init="getData()">
                      <tr class="odd" role="row" ng-repeat="permission in filtered = (pagedItems | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                        <td>{{ permission.name }}</td>
                        <td>{{ permission.definition }}</td>
                        <td> 
                           <button type="submit" class="btn btn-sm btn-success" ng-click="editData(permission)" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-edit"></span> </button>
                           <button type="submit" class="btn btn-sm btn-danger" ng-click="deleteData(permission.id)"><span class="glyphicon glyphicon-trash"></span> </button>
                        </td>
                      </tr>
                      </tbody>
                  </table></div></div>
                  <div class="row">
                  <div class="col-sm-5">
                  <div aria-live="polite" role="status" id="datatables_info" class="dataTables_info">{{ totalItems}} <?= $this->lang->line('permission_created'); ?></div>
                  </div><div class="col-sm-7">
                  <div id="datatables_paginate" class="dataTables_paginate paging_simple_numbers">
                   <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                </div></div></div></div>
                </div>
 <div class="box-footer clearfix">
                <div class="btn-group">
                   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addModal">
                   <span class="glyphicon glyphicon-plus-sign"></span> <?= $this->lang->line('create_new_permission'); ?></button>
                </div>
                 <div class="pull-right"></div>
                </div>
                </form>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="permissionsCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel"><?= $this->lang->line('create_new_permission'); ?></h4>
      </div>
      <div class="modal-body">
        <form name="addPermission">
        <div class="form-group">
          <label><?= $this->lang->line('name'); ?></label>
          <input type="text" ng-model="name" class="form-control">
        </div>
        <div class="form-group">
                      <label><?= $this->lang->line('definition'); ?></label>
                      <textarea class="form-control" ng-model="description" rows="3" placeholder="Describe Permission"></textarea>
                    </div>
       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getPermissions()"><?= $this->lang->line('close'); ?></button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="addData()"><span class="gyphicon glyphicon-plus-sign"></span> <?= $this->lang->line('create_new_permission'); ?></button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="permissionsCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">Edit Permission #{{ item.id }}</h4>
      </div>
      <div class="modal-body">
        <form name="addPermission">
        <div class="form-group">
          <label><?= $this->lang->line('name'); ?></label>
          <input type="text" ng-model="item.name" class="form-control">
        </div>
        <div class="form-group">
                      <label><?= $this->lang->line('definition'); ?></label>
                      <textarea class="form-control" ng-model="item.definition" rows="3" placeholder="Describe Permission"></textarea>
                    </div>
       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()"><?= $this->lang->line('close'); ?></button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="updateData(item.id, item.name, item.definition)">
        <span class="gyphicon glyphicon-plus-sign"></span><?= $this->lang->line('save_changes'); ?></button>
      </div>
    </div>
  </div>
</div>
</div>
</section>