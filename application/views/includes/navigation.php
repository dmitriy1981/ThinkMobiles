   <?php $uri = Request::current()->detect_uri(); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Home</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(Auth::instance()->get_user() === NULL): ?>
                <li<?php if(preg_match("/register/i", $uri)): ?>
                       class="active"
                      <?php endif; ?>
                    ><a href="/register">Register</a>
                </li>
                <li<?php if(preg_match("/login/i", $uri)): ?>
                       class="active"
                      <?php endif; ?>
                    ><a href="/login">Sign In</a>
                </li>
            <?php endif; ?>
            <?php if(Auth::instance()->get_user() !== NULL): ?>
                <li<?php if(preg_match("/logout/i", $uri)): ?>
                       class="active"
                      <?php endif; ?>
                       ><a id="lg_button" href="/logout">Logout</a>
                </li>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>