<style>
  *,
  *:before,
  *:after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Montserrat', 'Open Sans', Helvetica, Arial, sans-serif;
    background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  @keyframes gradientBG {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  .header {
    margin-bottom: 30px;
    text-align: center;
  }

  .logo {
    font-size: 36px;
    font-weight: 700;
    color: white;
    letter-spacing: 2px;
    margin-bottom: 5px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
  }

  .subtitle {
    color: rgba(255, 255, 255, 0.8);
    font-size: 16px;
    font-weight: 400;
  }

  .cont {
    overflow: hidden;
    position: relative;
    width: 900px;
    height: 600px;
    margin: 0 auto 50px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
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
    height: 46px;
    border-radius: 30px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    font-weight: 600;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
  }

  button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
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
    background-image: url("<?= base_url('assets/AdminLte/dist/assets/img/abstract.png'); ?>");
    background-size: cover;
    background-position: center;
    transition: transform 1.2s ease-in-out;
  }

  .img:after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgb(0 129 248 / 90%), rgb(255 250 0 / 72%));
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
    margin-bottom: 15px;
    font-weight: 600;
    font-size: 22px;
  }

  .img__text p {
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 20px;
    opacity: 0.9;
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
    width: 120px;
    height: 46px;
    margin: 0 auto;
    background: transparent;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    cursor: pointer;
    font-weight: 600;
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
    transition: all 0.3s ease;
  }

  .img__btn:hover:after {
    background-color: rgba(255, 255, 255, 0.1);
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
    font-size: 28px;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-weight: 600;
  }

  label {
    display: block;
    width: 260px;
    margin: 20px auto 0;
    text-align: left;
  }

  label span {
    font-size: 12px;
    color: #555;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 0.5px;
  }

  input {
    display: block;
    width: 100%;
    margin-top: 8px;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #e1e1e1;
    border-radius: 5px;
    text-align: left;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
  }

  input:focus {
    outline: none;
    border-color: #1a2a6c;
    box-shadow: 0 0 0 2px rgba(26, 42, 108, 0.1);
  }

  .forgot-pass {
    margin-top: 15px;
    text-align: center;
    font-size: 13px;
    color: #999;
    transition: color 0.3s ease;
  }

  .forgot-pass:hover {
    color: #1a2a6c;
  }

  .login-submit {
    margin-top: 40px;
    margin-bottom: 20px;
    color: #fff;
    background: linear-gradient(135deg, #1a2a6c, #0052A5);
    border: none;
  }

  .register-submit {
    margin-top: 40px;
    margin-bottom: 20px;
    color: #fff;
    background: linear-gradient(135deg, #b21f1f, #c23b3b);
    border: none;
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

  .form-fields {
    height: 360px;
    overflow-y: auto;
    padding-right: 10px;
  }

  .form-fields::-webkit-scrollbar {
    width: 6px;
  }

  .form-fields::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
  }

  .form-fields::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
  }

  .form-fields::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  .footer {
    margin-top: 20px;
    text-align: center;
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
  }
</style>

<body>
  <div class="header">
    <div class="logo">RIMS PSAS</div>
    <div class="subtitle">Public Service Automation System</div>
  </div>

  <div class="cont">
    <form action="<?= base_url('auth/attempt_login') ?>" method="POST">
      <?= csrf_field() ?>
      <div class="form sign-in">
        <h2>Welcome Back</h2>
        <label>
          <span>Username</span>
          <input id="loginUsername" name="loginUsername" type="text" required />
        </label>
        <label>
          <span>Password</span>
          <input id="loginPassword" name="loginPassword" type="password" required />
        </label>
        <p class="forgot-pass">Forgot password?</p>
        <button type="submit" class="login-submit">SIGN IN</button>
      </div>
    </form>

    <div class="sub-cont">
      <div class="img">
        <div class="img__text m--up">
          <h2>New to our platform?</h2>
          <p>Register now to access our comprehensive service automation system and streamline your operations.</p>
        </div>
        <div class="img__text m--in">
          <h2>Already registered?</h2>
          <p>If you already have an account, sign in to continue your session.</p>
        </div>
        <div class="img__btn">
          <span class="m--up">SIGN UP</span>
          <span class="m--in">SIGN IN</span>
        </div>
      </div>

      <form action="<?= base_url('auth/attempt_register') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form sign-up">
          <h2>Create Account</h2>
          <div class="form-fields">
            <label>
              <span>Full Name</span>
              <input id="registerFullName" type="text" name="registerFullName" required />
            </label>
            <label>
              <span>Email Address</span>
              <input id="registerEmail" type="email" name="registerEmail" required />
            </label>
            <label>
              <span>Address</span>
              <input id="registerAddress" type="text" name="registerAddress" required />
            </label>
            <label>
              <span>Contact Number</span>
              <input id="registerPhone" type="text" name="registerPhone" required />
            </label>
            <label>
              <span>Username</span>
              <input id="registerUsername" type="text" name="registerUsername" required />
            </label>
            <label>
              <span>Password</span>
              <input id="registerPassword" type="password" name="registerPassword" required />
            </label>
            <label>
              <span>Confirm Password</span>
              <input id="confirmPassword" type="password" name="confirmPassword" required />
            </label>
          </div>
          <button type="submit" class="register-submit">REGISTER</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer">
    © 2025 RIMS Public Service Automation System. All rights reserved.
  </div>

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