<?php 
//sample database - di na tinanggal nakakatamad
    include_once('../../../config.php');
    include_once('db.php');

    //if(isset($_GET['search'])) {$search = $_GET['search'];}
    $search = $_POST['user_id'];
    $sql="Select * from tbl_users WHERE 
                        id LIKE '%$search%'";
    $result= mysqli_query($con, $sql);
    $users= mysqli_fetch_all($result);
    
    mysqli_free_result($result);
    mysqli_close($con);
   
     foreach($users as $user){
        $id = $user[0];
        if(is_numeric($user[14])==1){
            $cpass = $user[14];
        }else{
        $cpass = endecrypt($user[14],'d');
            
        }
        echo  
        '<div class="modal fade" id="updatePassword" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Update Password</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" action="models/user.php?id='.$id.'&do=changePassword2"
                          method="post">
                        <div class="box-body blueblue">
                            <div class="form-group"><label class="col-sm-12">Username</label>
                                <div class="col-sm-12">
                                    <input value='.htmlspecialchars($user[1]).' type="text" class="form-control"
                                           name="username" placeholder="Username" required readonly></div>
                            </div>
                            <div class="form-group"><label class="col-sm-12 text-left">Type Old Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="passos" type="password" value='.htmlspecialchars($cpass).' class="form-control" 
                                          
                                           name="cPassword" placeholder="Old Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_ps" class="btn btn-info" type="button" style="padding:5px width:10px;">
                                            <span class="fa fa-eye"></span>
                                            </button>
                                                </div></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-12 text-left">Type New Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="passo" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="nPassword" placeholder="New Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_p" class="btn btn-info" type="button" style="padding:5px width:10px;">
                                            <span class="fa fa-eye"></span>
                                            </button>
                                                </div></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-12 text-left">Re-type New Password</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input id="pusa" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&+~|{}:;<>/])[A-Za-z\d$@$!%*?&+~|{}:;<>/]{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                           name="rPassword" placeholder="Re-type New Password" required>
                                         <div class="input-group-prepend">
                                         <button id="show_pusa" class="btn btn-info" type="button" style="padding:5px width:10px;">
                                          <span class="fa fa-eye"></span>
                                            </button>
                                            </div></div>
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ';
                 
    }
?>

