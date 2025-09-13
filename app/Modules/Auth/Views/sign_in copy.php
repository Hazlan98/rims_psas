<style>
  *,
  *:before,
  *:after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    background: linear-gradient(45deg, rgb(70, 172, 255), rgb(19, 226, 143), rgb(255, 227, 12), rgb(255, 81, 81));
    background-size: 300% 300%;
    animation: moveGradient 8s infinite linear;
  }

  @keyframes moveGradient {
    0% {
      background-position: 0% 100%;
    }

    50% {
      background-position: 100% 0%;
    }

    100% {
      background-position: 0% 100%;
    }
  }

  /* Add this class to trigger the background color change */
  body.change-bg {
    background: linear-gradient(45deg, #ff512f, #dd2476);
  }

  input,
  button {
    border: none;
    outline: none;
    background: none;
    font-family: 'Open Sans', Helvetica, Arial, sans-serif;
  }

  .tip {
    font-size: 20px;
    margin: 40px auto 50px;
    text-align: center;
  }

  .cont {
    overflow: hidden;
    position: relative;
    width: 900px;
    height: 690px;
    margin: 0 auto 100px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);

    display: flex;
    align-items: center;
  }

  .form {
    position: relative;
    width: 640px;
    transition: transform 1.2s ease-in-out;
    padding: 50px 30px;
  }

  .sub-cont {
    overflow: hidden;
    position: absolute;
    left: 640px;
    top: 0;
    width: 900px;
    height: 100%;
    padding-left: 260px;
    background: #fff;
    transition: transform 1.2s ease-in-out;
  }

  .cont.s--signup .sub-cont {
    transform: translate3d(-640px, 0, 0);
  }

  button {
    display: block;
    margin: 0 auto;
    width: 260px;
    height: 36px;
    border-radius: 30px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
  }

  .img {
    overflow: hidden;
    z-index: 2;
    position: absolute;
    left: 0;
    top: 0;
    width: 260px;
    height: 100%;
    padding-top: 360px;
  }

  .img:before {
    content: '';
    position: absolute;
    right: 0;
    top: 0;
    width: 900px;
    height: 100%;
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/sections-3.jpg');
    background-size: cover;
    transition: transform 1.2s ease-in-out;
  }

  .img:after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
  }

  .cont.s--signup .img:before {
    transform: translate3d(640px, 0, 0);
  }

  .img__text {
    z-index: 2;
    position: absolute;
    left: 0;
    top: 30%;
    width: 100%;
    padding: 0 20px;
    text-align: center;
    color: #fff;
    transition: transform 1.2s ease-in-out;
  }

  .img__text h2 {
    margin-bottom: 10px;
    font-weight: normal;
  }

  .img__text p {
    font-size: 14px;
    line-height: 1.5;
  }

  .cont.s--signup .img__text.m--up {
    transform: translateX(520px);
  }

  .img__text.m--in {
    transform: translateX(-520px);
  }

  .cont.s--signup .img__text.m--in {
    transform: translateX(0);
  }

  .img__btn {
    overflow: hidden;
    z-index: 2;
    position: relative;
    width: 100px;
    height: 36px;
    margin: 0 auto;
    background: transparent;
    color: #fff;
    text-transform: uppercase;
    font-size: 15px;
    cursor: pointer;
  }

  .img__btn:after {
    content: '';
    z-index: 2;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border: 2px solid #fff;
    border-radius: 30px;
  }

  .img__btn span {
    position: absolute;
    left: 0;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    transition: transform 1.2s;
  }

  .img__btn span.m--in {
    transform: translateY(-72px);
  }

  .cont.s--signup .img__btn span.m--in {
    transform: translateY(0);
  }

  .cont.s--signup .img__btn span.m--up {
    transform: translateY(72px);
  }

  h2 {
    width: 100%;
    font-size: 26px;
    text-align: center;
  }

  label {
    display: block;
    width: 260px;
    margin: 25px auto 0;
    text-align: center;
  }

  label span {
    font-size: 12px;
    color: #434343;
    text-transform: uppercase;
  }

  input {
    display: block;
    width: 100%;
    margin-top: 5px;
    padding-bottom: 5px;
    font-size: 16px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.4);
    text-align: center;
  }

  .forgot-pass {
    margin-top: 15px;
    text-align: center;
    font-size: 12px;
    color: #cfcfcf;
  }

  .login-submit {
    margin-top: 40px;
    margin-bottom: 20px;
    color: #fff;
    background-color: #2198f3;
    border-color: rgb(11, 137, 234);
    text-transform: uppercase;
  }

  .register-submit {
    margin-top: 40px;
    margin-bottom: 20px;
    color: #fff;
    background-color: #e60338;
    border-color: #d90334;
    text-transform: uppercase;
  }



  .fb-btn {
    border: 2px solid #d3dae9;
    color: #6078b0;
  }

  .fb-btn span {
    font-weight: bold;
    color: #465b8f;
  }

  .sign-in {
    transition-timing-function: ease-out;
  }

  .cont.s--signup .sign-in {
    transition-timing-function: ease-in-out;
    transition-duration: 1.2s;
    transform: translate3d(640px, 0, 0);
  }

  .sign-up {
    transform: translate3d(-900px, 0, 0);
  }

  .cont.s--signup .sign-up {
    transform: translate3d(0, 0, 0);
  }

  .icon-link {
    position: absolute;
    left: 5px;
    bottom: 5px;
    width: 32px;
  }

  .icon-link img {
    width: 100%;
    vertical-align: top;
  }

  .icon-link--twitter {
    left: auto;
    right: 5px;
  }

  .link-footer {
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
  }
</style>

<body>
  <center>
    <h1 style="padding-top:100px;padding-bottom:50px;"> RIMS PSAS </h1>
  </center>

  <div class="cont">
    <form action="<?= base_url('auth/attempt_login') ?>" method="POST">

      <div class="form sign-in">
        <h2>Welcome back,</h2>
        <label>
          <span>Username</span>
          <input id="loginUsername" name="loginUsername" type="text" class="form-control" value="" placeholder="" />
        </label>
        <label>
          <span>Password</span>
          <input id="loginPassword" name="loginPassword" type="password" class="form-control" placeholder="" />
        </label>
        <!-- <p class="forgot-pass">Forgot password?</p> -->
        <button type="submit" class="login-submit">Sign In</button>
      </div>
    </form>


    <div class="sub-cont">
      <div class="img">
        <div class="img__text m--up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img__text m--in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img__btn">
          <span class="m--up">Sign Up</span>
          <span class="m--in">Sign In</span>
        </div>
      </div>
      <form action="<?= base_url('auth/attempt_register') ?>" method="POST">

        <div class="form sign-up">
          <h2>Time to feel like home,</h2>
          <label>
            <span>Name</span>
            <input id="registerFullName" type="text" name="registerFullName" class="form-control" placeholder="" />
          </label>
          <label>
            <span>Email</span>
            <input id="registerEmail" type="email" name="registerEmail" class="form-control" placeholder="" />
          </label>
          <label>
            <span>Address</span>
            <input id="registerAddress" type="text" name="registerAddress" class="form-control" placeholder="" />
          </label>
          <label>
            <span>Contact Number</span>
            <input id="registerPhone" type="text" name="registerPhone" class="form-control" placeholder="" />
          </label>
          <label>
            <span>Username</span>
            <input id="registerUsername" type="text" name="registerUsername" class="form-control" placeholder="" />
          </label>
          <label>
            <span>Password</span>
            <input id="registerPassword" type="password" name="registerPassword" class="form-control" placeholder="" />
          </label>
          <label>
            <span>Confirm Password</span>
            <input id="confirmPassword" type="password" name="confirmPassword" class="form-control" placeholder="" />
          </label>
          <button type="submit" class="register-submit">Sign Up</button>
        </div>

      </form>

    </div>
  </div>

  <a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
    <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
  </a>

  <script>
    document.querySelector('.img__btn').addEventListener('click', function() {
      document.querySelector('.cont').classList.toggle('s--signup');
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    <?php if (session()->getFlashdata('swal_success')) : ?>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?= session()->getFlashdata('swal_success'); ?>',
        timer: 3000,
        showConfirmButton: false
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('swal_error')) : ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= session()->getFlashdata('swal_error'); ?>',
        timer: 3000,
        showConfirmButton: false
      });
    <?php endif; ?>
  </script>
</body>