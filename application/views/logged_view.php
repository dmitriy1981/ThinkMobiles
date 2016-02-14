<div class="col-lg-6 user-form">
            <div class="well bs-component well-user-form">
               <form method="POST" class="form-horizontal">
                <fieldset>
                  <legend id="user-legend">Hello, <?php echo $userinfo->username; ?>!</legend>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="fname">F. Name</label>
                    <div class="col-lg-10">
                        <input value="<?php echo $userinfo->fname; ?>" name="fname" type="text" placeholder="" id="fname" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="lname">L. Name</label>
                    <div class="col-lg-10">
                      <input value="<?php echo $userinfo->lname; ?>" name="lname" type="text" placeholder="" id="lname" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="datepicker">Birthday</label>
                    <div class="col-lg-10">
                        <input value="<?php echo $bdate ?>" name="birthday" type="text" placeholder="" id="datepicker" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-info register-btn" type="submit">Save changes</button>
                    </div>
                  </div>
                </fieldset>
                   
              </form>
                <?php if(!empty($errors)): ?>
                    <div id="error-block" role="alert" class="alert alert-danger alert-dismissible fade in"> 
                        <p>
                            <ul class="error-list">
                            <?php foreach($errors AS $v): ?>
                                <li><?php echo ucfirst($v); ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </p> 
                    </div>
                <?php endif; ?>
            </div>
    
</div>
                <ul class="connectedSortable all-authors ui-sortable" id="sortable1">
                        <?php foreach ($interests AS $v): ?>  
                        <li data-id='<?php echo $v['id']; ?>' class="ui-state-default"><?php echo $v['title']; ?></li>
                        <?php endforeach; ?>
                </ul>
 
                <ul class="connectedSortable autors-adding ui-sortable" id="sortable2">
                    <div>
                    Drag interests here
                    <p style="font-size: 10px;">
                        (Automatically saving)
                    </p>
                    </div>
                  <?php foreach ($userinterests AS $v): ?>   
                  <li data-id='<?php echo $v['id']; ?>' class="ui-state-highlight"><?php echo $v['title']; ?></li>
                  <?php endforeach; ?>
                </ul>