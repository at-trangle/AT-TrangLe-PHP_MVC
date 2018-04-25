<?php
  include('../public/layout/header.php');
?>
  <h1><span class="blue"><span class="yellow">Add news</pan></h1>  
  <div class="container form-top">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
        <div class="panel panel-danger">
          <div class="panel-body">
            <form method="post" enctype="multipart/form-data" id="reused_form">
              <div class="form-group">
                <label >Name</label>
                <input type="text" name="name" required class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label >Preview</label>
                <input type="text" name="preview" required class="form-control" placeholder="Enter preview">
              </div>
             
              <div class="form-group">
                <button class="btn btn-raised btn-lg btn-warning" type="submit" name="add">Add</button>
                <button class="btn btn-raised btn-lg btn-warning" type="reset">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
