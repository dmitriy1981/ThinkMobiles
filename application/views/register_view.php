<div class="col-lg-6 register-form">
            <div class="well bs-component">
               <form method="POST" class="form-horizontal">
                <fieldset>
                  <legend id="registration-legend">Registration</legend>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputUser">Username</label>
                    <div class="col-lg-10">
                      <input name="username" type="text" placeholder="Username" id="inputUser" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                    <div class="col-lg-10">
                      <input name="email" type="text" placeholder="Email" id="inputEmail" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                    <div class="col-lg-10">
                      <input name="password" type="password" placeholder="Password" id="inputPassword" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputPassword">Re-type password</label>
                    <div class="col-lg-10">
                        <input name="password_confirm" type="password" placeholder="Re-type password" id="inputPassword" class="form-control">
                    </div>
                  </div>
               <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default register-btn" type="submit">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
                <?php if(!empty($errors)): ?>
                    <div id="error-block" role="alert" class="alert alert-danger alert-dismissible fade in"> 
                        <h4>Oh snap! You got an error!</h4> 
                        <p>
                        <ul class="error-list">
                            <?php $arrayIterator = new RecursiveIteratorIterator(
                                    new RecursiveArrayIterator($errors)); ?>
                            <?php foreach($arrayIterator AS $k => $v): ?>
                                <li><?php echo ucfirst($v); ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </p> 
                    </div>
                <?php endif; ?>
</div>
</div>