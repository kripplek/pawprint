<?php echo $this->beginRow;?>
<div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">New user</div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <h6>User Info</h6>
                    <hr>
                    <!-- Form starts.  -->
                     <form class="form-horizontal "method="POST" action="/users/new">
                      <div class="control-group">
                        <label class="control-label" for="inputPassword">Username</label>
                        <div class="controls">
                          <input type="text" id="inputPassword"name='username' placeholder="smithj">
                        </div>
                      </div>
  
                      <div class="control-group">
                        <label class="control-label" for="inputPassword">Password</label>
                        <div class="controls">
                          <input type="password" id="inputPassword"name='password' placeholder="*************">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputCPassword">Confirm Password</label>
                        <div class="controls">
                          <input type="password" id="inputCPassword"name='passwordConfirm' placeholder="*************">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                          <input type="text" id="inputEmail"name='email' placeholder="user@domain.tld">
                        </div>
                      </div>

                      <button type="submit" class="btn btn-success">Create New</button>
                      <button type="button" id="reset" class="btn btn-danger">Clear Form</button>

                    </form>

                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>
<script>


$("#reset").click(function(e) {
    e.preventDefault();
        $(this).closest('form').find("input[type=text], textarea").val("");
});



</script>
