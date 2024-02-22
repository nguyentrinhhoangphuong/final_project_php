<?php
$login = URL::createShopLink('shop', 'index', 'login');
$token = md5(uniqid(rand(), true));
$register = URL::createShopLink('shop', 'index', 'register');

?>
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
    <div class=" modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header bg-secondary">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Đăng ký</a>
                    </li>
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body tab-content py-4">
                <form class="needs-validation tab-pane fade show active" action="<?php echo $login ?>" autocomplete="off" method="post" novalidate id="signin-tab">
                    <input type="hidden" name="form[token]" value="<?php echo $token; ?>" />
                    <div class="mb-3">
                        <label class="form-label" for="si-email">Email</label>
                        <input class="form-control" name="form[email]" type="email" id="si-email" placeholder="johndoe@example.com" required />
                        <div class="invalid-feedback">
                            Vui lòng cung cấp một địa chỉ email hợp lệ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="si-password">Password</label>
                        <div class="password-toggle">
                            <input class="form-control" name="form[password]" type="password" id="si-password" required />
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox" /><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex flex-wrap justify-content-between">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="si-remember" />
                            <label class="form-check-label" for="si-remember">Remember me</label>
                        </div>
                        <a class="fs-sm" href="#">Quên mật khẩu?</a>
                    </div>
                    <button class="btn btn-primary btn-shadow d-block w-100" type="submit">
                        Đăng nhập
                    </button>
                </form>


                <!-- ======================================================== -->
                <form class="needs-validation tab-pane fade" action="<?php echo $register ?>" autocomplete="off" novalidate id="signup-tab" method="post">
                    <input type="hidden" name="form[token]" value="<?php echo $token; ?>" />
                    <div class="mb-3">
                        <label class="form-label" for="su-name">Full name</label>
                        <input class="form-control" name="form[username]" type="text" id="su-name" placeholder="John Doe" required />
                        <div class="invalid-feedback">Xin vui lòng điền tên của bạn.</div>
                    </div>
                    <div class="mb-3">
                        <label for="su-email">Email</label>
                        <input class="form-control" name="form[email]" type="email" id="su-email" placeholder="johndoe@example.com" required />
                        <div class="invalid-feedback">
                            Vui lòng cung cấp một địa chỉ email hợp lệ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="su-password">Password</label>
                        <div class="password-toggle">
                            <input class="form-control" name="form[password]" type="password" id="su-password" required />
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox" />
                                <span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="su-password-confirm">Confirm password</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="su-password-confirm" required />
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox" /><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-shadow d-block w-100" type="submit">
                        Đăng ký
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>