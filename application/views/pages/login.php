<div class=container>
    <div class=row>
        <div class=card style="width:40%; margin-top:20%; margin-left:30%; margin-bottom:15%; padding:20px;">
            <div class=card-body>
                <form method="post" action="<?php echo base_url()?>index.php/home/act_login">
                    <div class="form-group">
                        <h3><center>Login</center><h3>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>