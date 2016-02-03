
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


 <div class="box box-primary">
                <div class="box-header with-border">
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="col-xs-4">
                        <label for="surname" class="control-label">Surname</label>
                        <input type="text" ng-model="surname" class="form-control" id="surname">
                      </div>
                  
                                   <div class="col-xs-4">
                <label for="firstame" class="control-label">Firstname</label>
                <input type="text" ng-model="firstname" class="form-control" id="firstname">
              </div>
               <div class="col-xs-4">
                <label for="othername" class="control-label">Othername</label>
                <input type="text" ng-model="othername" class="form-control" id="othername">
              </div>
              </div>
                   <div class="form-group">
                    <div class="col-xs-6">
                    <label for="dateofbirth" class="control-label">Date Of Birth</label>
                    <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input class="form-control pull-right" id="dateofbirth" ng-model="dateofbirth" type="text">
                        </div>
                    </div>
                <div class="col-md-6">
                        <label for="gender" class="control-label">Gender</label>
                        <select ng-model="gender" class="form-control">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
    <div class="col-xs-6">
                    <label>Select Political Party</label>
                   <select ng-model="political_party" class="form-control" ng-init="getParty()">
                          <option ng-repeat="party in parties" value="{{party.name}}">{{party.name}}</option>
                        </select>
                  </div>
                  <div class="col-xs-6">
                    <label>Aspired Political Office</label>
                    <select ng-model="education" class="form-control">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                        </select>
                  </div>
                </div>

                <div class="form-group">
              <div class="col-xs-4">
                    <label>Select Edu Qualification</label>
                     <select ng-model="education" class="form-control">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                        </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Select State</label>
                     <select ng-model="state" class="form-control">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                        </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Select Constituency</label>
                     <select ng-model="constituency" class="form-control">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                        </select>
                  </div>
                </div>

                  <div class="form-group">
              <div class="col-xs-6">
                <label for="phone" class="control-label">Phone Number</label>
                <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                          <input type="text" ng-model="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </div>
              </div>
              <div class="col-xs-6">
                <label for="email" class="control-label">Email Address</label>
                <input type="text" ng-model="email" class="form-control" id="email">
              </div>
              </div>
                  </div><!-- /.box-body -->

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
            <button type="button" class="btn btn-success" ng-click="add()"><span class="gyphicon glyphicon-plus-sign"></span> Register Candidate</button>
          </div>
                </form>
              </div>
 
        </div>
        </div>