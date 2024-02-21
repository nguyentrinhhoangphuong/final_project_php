<!-- Page Title (Light)-->
<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="#"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Contacts</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Contacts</h1>
        </div>
    </div>
</div>
<!-- Contact detail cards-->
<section class="container-fluid pt-grid-gutter">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card h-100" href="#map" data-scroll>
                <div class="card-body text-center"><i class="ci-location h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-2">Địa chỉ cửa hàng chính</h3>
                    <p class="fs-sm text-muted">Số 01, Khối A1, Toà nhà Đạt Gia, 43 Đường Cây Keo, Tam Phú, Thủ Đức, Hồ Chí Minh</p>
                    <div class="fs-sm text-primary">Bấm vào để xem bản đồ<i class="ci-arrow-right align-middle ms-1"></i></div>
                </div>
            </a></div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
                <div class="card-body text-center"><i class="ci-time h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-3">Giờ làm việc</h3>
                    <ul class="list-unstyled fs-sm text-muted mb-0">
                        <li>Thứ 2 - Thứ 7: 10AM - 7PM</li>
                        <li class="mb-0">Chủ nhật: 11AM - 5PM</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
                <div class="card-body text-center"><i class="ci-phone h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-3">Số điện thoại</h3>
                    <ul class="list-unstyled fs-sm mb-0">
                        <li><span class="text-muted me-1">Dành cho khách hàng:</span><a class="nav-link-style" href="tel:+108044357260">0383 308 983</a></li>
                        <li class="mb-0"><span class="text-muted me-1">Hô trợ kỹ thuật:</span><a class="nav-link-style" href="tel:+100331697720">0383 308 983</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card h-100">
                <div class="card-body text-center"><i class="ci-mail h3 mt-2 mb-4 text-primary"></i>
                    <h3 class="h6 mb-3">Địa chỉ email</h3>
                    <ul class="list-unstyled fs-sm mb-0">
                        <li><span class="text-muted me-1">Dành cho khách hàng:</span><a class="nav-link-style" href="mailto:+108044357260">training@zendvn.com</a></li>
                        <li class="mb-0"><span class="text-muted me-1">Hô trợ kỹ thuật:</span><a class="nav-link-style" href="mailto:support@example.com">training@zendvn.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Split section: Map + Contact form-->
<div class="container-fluid px-0" id="map">
    <div class="row g-0">
        <div class="col-lg-6 iframe-full-height-wrap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.360488946652!2d106.73870422093619!3d10.860162191371517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527d5640014e7%3A0x3bb323b29d50dca9!2zWmVuZFZOIC0gxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6pu!5e0!3m2!1svi!2s!4v1708450010809!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
            <h2 class="h4 mb-4">Gửi cho chúng tôi</h2>
            <form class="needs-validation mb-3" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-name">Tên của bạn:&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="cf-name" required>
                        <div class="invalid-feedback">Vui lòng điền tên bạn!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-email">Địa chỉ email:&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control" type="email" id="cf-email" required>
                        <div class="invalid-feedback">Vui lòng cung cấp địa chỉ email hợp lệ!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-phone">Điện thoại của bạn:&nbsp;<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="cf-phone" required>
                        <div class="invalid-feedback">Vui lòng cung cấp số điện thoại hợp lệ!</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="cf-subject">Subject:</label>
                        <input class="form-control" type="text" id="cf-subject">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="cf-message">Lời nhắn:&nbsp;<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="cf-message" rows="6" required></textarea>
                        <div class="invalid-feedback">Hãy viết một tin nhắn!</div>
                        <button class="btn btn-primary mt-4" type="submit">Gửi tin nhắn</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>