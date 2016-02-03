
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
            <div class="col-md-4"></div>
           <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('<?= base_url('public_html/themes/'.get_current_theme('backend').'/dist/img/photo1.png')?>') center center;">
                  <h3 class="widget-user-username" ng-init="getCurrentUser()">{{ CurrentUser.surname }} {{ CurrentUser.firstname }} {{ CurrentUser.othername}}</h3>
                  <h5 class="widget-user-desc" ng-init="getUserRole()">{{ CurrentRole.role }}</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-rounded" src="{{CurrentUser.picture}}" alt="{{CurrentUser.name}}">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div>
            <div class="col-md-4"></div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Settings</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">United States of America <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                    <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
                    <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Vertical Progress bars</h3>
                </div><!-- /.box-header -->
                <div class="box-body text-center">
                  <p>By adding the class <code>.vertical</code> we achieve:</p>
                  <div class="progress vertical">
                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="height: 40%">
                      <span class="sr-only">40%</span>
                    </div>
                  </div>
                  <div class="progress vertical">
                    <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="height: 20%">
                      <span class="sr-only">20%</span>
                    </div>
                  </div>
                  <div class="progress vertical">
                    <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 60%">
                      <span class="sr-only">60%</span>
                    </div>
                  </div>
                  <div class="progress vertical">
                    <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="height: 80%">
                      <span class="sr-only">80%</span>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
          </div>
        </section>