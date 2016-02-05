<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Accounts</a></li>
            <li class="active">User profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row" ng-controller="profileCtrl">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary"ng-init="getData()">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php if($this->aauth->get_user()->picture !== '') { echo $this->aauth->get_user()->picture; } else{ echo base_url('public_html/uploads/default.png'); }?>" alt="User profile picture">
                  <h3 class="profile-username text-center">{{ user.surname }} {{ user.firstname }} {{ user.othername }}</h3>
                  <p class="text-muted text-center" ng-init="getRole()">{{role.name}}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

                        </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <!-- <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="active"><a href="javascript:void(0)" data-target="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                  <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input class="form-control input-lg" id="inputName" ng-model="user.surname" placeholder="Surname" type="text">
                        </div>
                        </div>
                         <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                         <div class="col-sm-10">
                          <input class="form-control input-lg" id="inputName" ng-model="user.firstname" placeholder="Firstname" type="text">
                        </div>
                        </div>
                         <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                         <div class="col-sm-10">
                          <input class="form-control input-lg" id="inputName" ng-model="user.othername" placeholder="Othername" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputGender" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-10">
                          <select class="form-control input-lg" id="inputGender" ng-selected="user.gender">
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                          </select>
                       </div>
                      </div>
                      <div class="form-group">
                        <label for="inputDateOfBirth" class="col-sm-2 control-label">Date Of Birth</label>
                        <div class="col-sm-10">
                          <input class="form-control input-lg" id="inputDateOfBirth" ng-model="user.dateofbirth" placeholder="Date of Birth" type="text">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="inputPhone" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input class="form-control input-lg" id="inputPhone" ng-model="user.phone" placeholder="Phone Number" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success" ng-click="updateData(user)">Save Changes</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
</div>    