@section('title', 'Đăng nhập hệ thống quản trị')
<!DOCTYPE html>
<html lang="en">
  <x-admin-head />

  <body class="account-page">
    <div class="main-wrapper">
      <div class="account-content">
        <div class="login-wrapper">
          <div class="login-content">
            <div class="login-userset">
              <div class="login-logo">
                <img src="https://i.ibb.co/7xfz0v3K/black.png" alt="img" />
              </div>
              <div class="login-userheading">
                <h3>Sign In</h3>
                <h4>Please login to your account</h4>
              </div>
              <x-admin-error />

              <form action="{{ route('admin.auth.login') }}" method="POST">
                @csrf
                <div class="form-login">
                  <label>Email</label>
                  <div class="form-addons">
                    <input
                      type="email"
                      name="email"
                      placeholder="Enter your email address"
                      value="{{ old('email') }}"
                      required
                    />

                    <img src="/assets/img/icons/mail.svg" alt="img" />
                  </div>
                </div>
                <div class="form-login">
                  <label>Password</label>
                  <div class="pass-group">
                    <input
                      type="password"
                      name="password"
                      class="pass-input"
                      placeholder="Enter your password"
                      required
                    />
                    <span class="fas toggle-password fa-eye-slash"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="1" />
                    <label class="form-check-label" for="invalidCheck2">Remember me</label>
                  </div>
                </div>

                <div class="form-login">
                  <button class="btn btn-login" type="submit">Sign In</button>
                </div>
              </form>
            </div>
          </div>
          <div class="login-img">
            <img src="https://i.ibb.co/whBvqXdM/background.jpg" alt="img" />
          </div>
        </div>
      </div>
    </div>

    <x-admin-footer />
  </body>
</html>
