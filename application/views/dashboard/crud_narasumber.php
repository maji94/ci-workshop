<?php
  $links = $this->uri->segment('3');
  if ($links == "add") {
    $header = "Tambah";
  }else{
    $header = "Ubah";
  }
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Narasumber</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><small style="margin-left: 0;"><?php echo $header; ?> Data Narasumber</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate>
              <label for="fullname">Full Name * :</label>
              <input type="text" id="fullname" class="form-control" name="fullname" required>
              <br>
              <label for="email">Email * :</label>
              <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required>
              <br>
              <label>Gender *:</label>
              <p>
                Laki-laki:
                <input type="radio" class="flat" name="gender" id="genderM" value="lakilaki" checked="" required> Perempuan:
                <input type="radio" class="flat" name="gender" id="genderF" value="perempuan">
              </p>

              <label>Hobbies (2 minimum):</label>
              <p style="padding: 5px;">
                <label>
                  <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2" required class="flat"> Skiing
                </label>
                <br>
                <label>
                  <input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat"> Running
                </label>
                <br>
                <label>
                  <input type="checkbox" name="hobbies[]" id="hobby3" value="eat" class="flat"> Eating
                </label>
                <br>
                <label>
                  <input type="checkbox" name="hobbies[]" id="hobby4" value="sleep" class="flat"> Sleeping
                </label>
                <br>
              </p>

              <label for="heard">Heard us by *:</label>
              <select id="heard" class="form-control" required>
                <option value="">Choose..</option>
                <option value="press">Press</option>
                <option value="net">Internet</option>
                <option value="mouth">Word of mouth</option>
              </select>
              <br>
              <label for="message">Message (20 chars min, 100 max) :</label>
              <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
              <br>
                <span class="btn btn-primary">Validate form</span>
            </form>
            <!-- end form for validations -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>