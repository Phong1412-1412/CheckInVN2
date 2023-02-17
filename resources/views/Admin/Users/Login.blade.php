<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.head')
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Đăng nhập</h3></div>
                                    <div class="card-body">
                                        @include('admin.alert')
                                        <form action = "/admin/users/login/store">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name = "email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Nhập Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name = "password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Nhập mật khẩu</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name = "remember" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Nhớ mật khẩu</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="/admin/users/login">Quên mật khẩu?</a>
                                                <button type="submit" class="btn btn-primary ">Đăng nhập</button>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Chưa có tài khoản? Đăng ký ngay!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="/admin/users/login">Privacy Policy</a>
                                &middot;
                                <a href="/admin/users/login">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('admin.footer')
    </body>
</html>
