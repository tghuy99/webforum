<div class="container">
    <div class="row">
      <div class="main">
          <h3 style="color:#65aeee;">Please Log In or <a href="register.php">Register</a></h3>
          <form role="form" action="index.php?mod=user&act=login" method="post" name="login">
              <div class="form-group">
                  <label for="inputUsernameEmail">Username or email</label>
                  <input type="text" class="form-control" id="inputUsernameEmail" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login_button">
                  Log In  
              </button>
          </form>
        </div>
    </div>
</div>
<div style="margin-bottom: 40px;"></div>