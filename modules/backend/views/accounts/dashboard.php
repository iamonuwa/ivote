
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
  <!-- Main content -->
        <section class="content" ng-controller="dashboardCtrl">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">CPU Usage</span>
                  <span class="info-box-number">90<small>%</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-facebook"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">41,410</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">760</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">2,000</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">System Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="nav nav-pills nav-stacked">
                    <li> <a href="javascript:void(0)" ng-init="getCurrentUser()"> ID Number: {{CurrentUser.name}}</a></li>
                    <li> <a href="javascript:void(0)" ng-init="getCurrentUser()"> Last Login: {{CurrentUser.last_login}}</a></li>
                    <li> <a href="javascript:void(0)" ng-init="getCurrentUser()"> Computer: {{ getComputer }}</a></li>
                    <li> <a href="javascript:void(0)" ng-init="getIpAddress()"> IP Address: {{ getIP }}</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Links</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Send Message</a>
                        <span class="product-description">
                        Send message to Commission. Message can be a complaint, discovered.
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-info">
                        <a href="#/profile" class="product-title">Update Profile</a>
                        <span class="product-description">
                        Edit your profile account
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <li class="item">
                      <div class="product-info">
                        <a href="javascript::;" data-toggle="modal" data-target="#password_reset" ng-click="editData(data)" class="product-title">Password Reset</a>
                        <span class="product-description">
                        Change your password
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
              </div>
            </div><!-- /.col (left) -->

             <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">INEC News Feeds</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Samsung TV </a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                      </div>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div>
        </section>
<div class="modal fade" id="password_reset" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" ng-controller="dashboardCtrl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalLabel">Reset Password</h4>
      </div>
      <div class="modal-body">
        <form name="add">
         
        <div class="row">
          <div class="form-group">
          <div class="col-xs-12">
            <label for="title" class="control-label">Old Password</label>
             <input type="password" ng-model="item.password" class="form-control" required>
          </div>
          
           <div class="col-xs-12">
            <label for="duration" class="control-label">New Password</label>
            <input type="password" ng-model="password" class="form-control" required>
          </div>

           <div class="col-xs-12">
            <label for="duration" class="control-label">Confirm Password</label>
            <input type="password" ng-model="c_password" class="form-control" required>
          </div>
         
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="updateData(item.password, password, c_password)"><span class="gyphicon glyphicon-plus-sign"></span> Change Password</button>
      </div>
    </div>
  </div>
</div>
</div>

