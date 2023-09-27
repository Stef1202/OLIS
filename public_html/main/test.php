        <form class="login100-form validate-form" action="main/models/user.php?do=signup" method="post">
                            <div class="wrap-input100 validate-input has-feedback">
                                <input class="input200" type="text" name="userNo" id="userNo" onchange="showUsername();" data-validate="Please input your School ID number" placeholder="ID number" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            
                            <div class="wrap-input100 validate-input has-feedback"> 
                            
                                <input class="input200" type="text" name="lastname" data-validate="Please input your last name" placeholder="Last Name" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input has-feedback">
                                <input class="input200" type="text" name="firstname" data-validate="Please input your first name" placeholder="First Name" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input has-feedback">
                                <input class="input200" type="email" name="email" data-validate="Please input your email" placeholder="Email" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                               <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input has-feedback">
                                <input class="input200" type="text" name="contact" data-validate="Please input your contact number" placeholder="Contact Number" minlength="11" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  pattern="[0-9]+.{10,}" title="Must contain at least 11 digit" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                               <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input has-feedback">
                                <input class="input200" type="text" name="address"  placeholder="Address" data-validate="Please input your Address" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input has-feedback">
                                <input class="input200" type="text" name="username" id="username"  placeholder="Username" data-validate="Please input your Username" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                 <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input has-feedback">
                                <input class="input200" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                           title="Must contain at least one special characters, one number and one uppercase and lowercase letter, and at least 6 or more characters" name="password" placeholder="Password" data-validate="Please input your Password" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group" style="display:none"><label class="col-sm-2 control-label" >Role</label>
                                <div class="col-sm-10">
                                    <input name="role" class="form-control" value="Guest" readonly />
                                </div>
                            </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">Sign Up</button>
                            
                   
                        </div>
                              <div class="container-login100-form-btn">
                    
                    <a class="txt2" href="signin.php">
                        Already have an account?
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
                    
                        
          
                    </form>