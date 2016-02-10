
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
 <div class="box box-primary" ng-controller="candidatesCtrl">
                <div class="box-header with-border">
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" name="addCandidate" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                    <div class="col-xs-12 text-center">
              <label ng-model="picture" id="image-holder" ></label>
                    </div>
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
                          <input class="form-control pull-right datemask" id="date" ng-model="dateofbirth" type="text">
                        </div>
                          <div date-picker selector=".datemask" ></div>
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
                   <select ng-model="party" class="form-control" ng-init="getParties()">
                          <option ng-repeat="party in parties" value="{{party.name}}">{{party.name}}</option>
                        </select>
                  </div>
                  <div class="col-xs-6">
                    <label>Aspired Political Office</label>
                    <select ng-model="office" class="form-control" ng-init="getOffices()">
                          <option ng-repeat="office in offices" value="{{office.name}}">{{office.name}}</option>
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
                     <select ng-model="state" class="form-control" ng-init="getStates()">
                          <option ng-repeat="state in states" value="{{state.name}}">{{state.name}}</option>
                        </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Select Constituency</label>
                     <select ng-model="constituency" class="form-control" ng-init="getLGA()">
                        <option>-- Please Select --</option>
                          <option ng-repeat="lga in lgas" value="{{lga.name}}">{{lga.name}}</option>
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
                          <input type="text" ng-model="phone" class="form-control" id="phone" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                          <div input-mask selector=".phone" ></div>
                        </div>
              </div>
              <div class="col-xs-6">
                <label for="email" class="control-label">Email Address</label>
                <input type="text" ng-model="email" class="form-control" id="email">
              </div>
              </div>
              <div class="col-xs-6">
            <input id="file" type="file" />
            <br>
            <button type="button" class="btn btn-default" id="image_alt"> <span class="fa fa-upload"></span>Upload Passport</button>
          </div>
                  </div><!-- /.box-body -->

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" ng-init="getData()">Close</button>
            <button type="button" class="btn btn-success" ng-click="addData()"><span class="gyphicon glyphicon-plus-sign"></span> Register Candidate</button>
          </div>
                </form>
              </div>
 
        </div>
        </div>
        <style>
.size {
    width: 100px;
    height: 100px;
}
.invisible-border {
    border: 1px solid transparent;
}
.myCircle {
    padding: 10px;
    border-radius: 50%;
}
input#fileUpload{position:fixed;top:-100px;}
</style>
<script>
  document.getElementById('image_alt').addEventListener('click',function(){
    document.getElementById('fileUpload').click();
});
</script>
<script>
  $("#fileUpload").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {

             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "img-circle center-block size padding invisible-border"
                     }).appendTo(image_holder);
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
</script>