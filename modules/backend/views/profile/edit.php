<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row" ng-controller="profileCtrl">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?= base_url('public_html/uploads/default.png');?>" alt="User profile picture">
                  <h3 class="profile-username text-center" ng-model="name"><?= $this->aauth->get_user()->surname.' '.$this->aauth->get_user()->firstname.' '.$this->aauth->get_user()->othername;?></h3>
                  <p class="text-muted text-center">Software Engineer</p>
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
                  <form>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-sm-4">
                          <input type="text" class="form-control" ng-model="item.surname" placeholder="Surname">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" ng-model="item.firstname" placeholder="Firstname">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" ng-model="item.othername" placeholder="Othername">
                        </div>
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