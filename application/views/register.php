<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">   

    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-3 control-label">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama" placeholder="Isikan Nama">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="nim" class="col-md-3 control-label">NIM</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nim" placeholder="Isikan NIM">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">E-mail</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Isikan E-mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" placeholder="Isikan Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Isikan Password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="password2" class="col-md-3 control-label">Konfirmasi Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                        <span style="margin-left:8px;">or</span>  
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>       
         </div> 
   