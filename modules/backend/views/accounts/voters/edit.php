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
 <div class="box box-info">
  <div class="box-header with-border">
    <div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Personal Bio Data</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Capture Photo</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Capture Fingerprint</p>
      </div>
    </div>
  </div>
                  <!-- <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div> -->

   <div class="box">
                <div class="box-header">
                </div>
  <form role="form" ng-controller="voterCtrl">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Personal Bio Data</h3>
          <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">Surname</label>
            <input  maxlength="100" ng-model="surname" type="text" required="required" class="form-control"/>
          </div>
          </div>
          <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">Firstname</label>
            <input maxlength="100" type="text" ng-model="firstname" required="required" class="form-control"/>
          </div>
          </div>
           <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">Othername</label>
            <input maxlength="100" type="text" ng-model="othername" required="required" class="form-control"/>
          </div>
          </div>
          <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">Date Of Birth</label>
            <input  maxlength="100" ng-model="dateofbirth" type="text" required="required" class="form-control  datemask" id="date"/>
          </div>
          <div date-picker selector=".datemask" ></div>
          </div>
          <div class="col-md-4">
          <div class="form-group">
            <label for="gender" class="control-label">Gender</label>
                    <select ng-model="gender" class="form-control">
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
            </div>
          </div>
           <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">Age</label>
         <input maxlength="100" type="text" ng-model="age" required="required" class="form-control"/>
          </div>
          </div>
          <div class="col-md-8">
          <div class="form-group">
            <label class="control-label">Phone Number</label>
            <input maxlength="100" type="text" ng-model="phone" required="required" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
          </div>
          </div>
           <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">Occupation</label>
         <input maxlength="100" type="text" ng-model="occupation" required="required" class="form-control"/>
          </div>
          </div>
           <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">Address</label>
            <textarea required="required" class="form-control" placeholder="Enter your address" ></textarea>
          </div>
          </div>
          <div class="box-footer clearfix">
          <div class="btn-group">
          <button class="btn btn-primary nextBtn btn-flat pull-right" type="button" >Next</button>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Capture Photo</h3>
                  <!-- <ng-camera
                  capture-message="Cheeeese!"
                  countdown="3"
                  output-height="160"
                  output-width="213"
                  viewer-height="320"
                  viewer-width="426"
                  image-format="png"
                  jpeg-quality="100"
                  action-message="Take picture"
                  ng-model="media"
                  snapshot="vm.picture"
                  flash-fallback-url="<?= base_url('public_html/ng-camera/javascripts/vendors/webcamjs/webcam.swf');?>"
                  overlay-url="<?= base_url('public_html/ng-camera/overlay.png');?>"
                  shutter-url="<?= base_url('public_html/ng-camera/shutter.mp3');?>"
                  ></ng-camera> -->
                  <ng-camera
                    type="photo"
                    enabled="true"
                    width="320"
                    height="240"
                    countdown="3"
                    ng-model="picture"
                    capture="callback(picture)"
                    capture-message="Go!"></ng-camera>
                  <img ng-if="picture" ng-model="picture" ng-src="{{picture}}" alt="webcam picture">

          <div class="box-footer clearfix">
          <div class="btn-group">
          <button class="btn btn-primary nextBtn btn-flat pull-right" type="button" >Next</button>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Capture Fingerprint</h3>
         <div class="box-footer clearfix">
         
          <div class="btn-group">
          <button class="btn btn-primary btn-flat pull-right" ng-click="add()" type="button" >Next</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
  </div>
  </div>
  </div>


<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
      allWells = $('.setup-content'),
      allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
        $item = $(this);

    if (!$item.hasClass('disabled')) {
      navListItems.removeClass('btn-primary').addClass('btn-default');
      $item.addClass('btn-primary');
      allWells.hide();
      $target.show();
      $target.find('input:eq(0)').focus();
    }
  });

  allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
      isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
      if (!curInputs[i].validity.valid){
        isValid = false;
        $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
    }

    if (isValid)
      nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});

  </script>
 
