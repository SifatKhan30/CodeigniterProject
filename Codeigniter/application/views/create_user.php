
<div class="container">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<form action="<?php echo base_url('Users/save') ?>" method="post" class="form-control">
<table class="table table-bordered"> 
    <tr>
        <th>Name</th>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <th>Email</th>
      
        <td><input type="text" name="email"></td>
        </tr>
        <tr>
        <th>Password</th>
        <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="submit" name="" value="Save" class="btn btn-xs btn-success"></td>
    </tr>
  
</table>
</form>
</div>