<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="rolesCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">Assign Permission to {{role.name}}</h4>
      </div>
      <div class="modal-body">
        <form name="addPermission">
        <ul>
          <li ng-repeat="perm in item" class="checkbox"> 
          <label>
            <input id="checkBox" checkbox-group/>
            {{ perm.name }}
          </label>
          </li>
        </ul>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="addPermToRole(perm, role.id)"><span class="fa fa-plus-sign"></span> Save Changes</button>
      </div>
    </div>
  </div>
</div>
