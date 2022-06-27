<footer class="text-white pt-4 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-12 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="mb-4" style="font-family: cursive;">Eden Beauty</h5>
                <p>
                    Eden Beauty cung cấp cho bạn sự tự tin với trách nhiệm và uy tín bởi những sản phẩm chăm sóc da và làm đẹp
                    đến từ những thương hiệu nổi tiếng và chất lượng nhất.
                </p>
            </div>

            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mx-auto mt-3">
                <h6 class="mb-4">TÀI KHOẢN</h6>
                <p>
                    <a href="{{  route('dangnhap') }}" class="links">Đăng nhập</a>
                </p>
                <p>
                    <a href="{{  route('dangky') }}" class="links">Tạo tài khoản</a>
                </p>
                <p>
                    <a href="{{  route('thongtinkh.lichsumuahang') }}" class="links">Lịch sử mua hàng</a>
                </p>
                <p>
                    <a href="{{  route('thongtinkh') }}" class="links">Thay đổi địa chỉ</a>
                </p>
            </div>

            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mx-auto mt-3">
                <h6 class="mb-4">DỊCH VỤ & HỖ TRỢ</h6>
                <p>
                    <a href="#" class="links">Chính sách bảo hành</a>
                </p>
                <p>
                    <a href="#" class="links">Chính sách đổi trả</a>
                </p>
                <p>
                    <a href="#" class="links">Chính sách bảo mật</a>
                </p>
                <p>
                    <a href="#" class="links">Câu hỏi thường gặp</a>
                </p>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="mb-4">LIÊN HỆ</h6>
                <p>
                    <i class="fas fa-home me-3"></i>3/2, Ninh Kiều, Cần Thơ, Việt Nam
                </p>
                <p>
                    <i class="fas fa-envelope me-3"></i>eden.beauty@gmail.com
                </p>
                <p>
                    <i class="fas fa-phone me-3"></i>0909.210.999
                </p>
                <p>
                    <i class="fas fa-clock me-3"></i>9h00 - 21h00 từ T2 đến CN
                </p>
            </div>
        </div>

        <hr class="line mb-4">

        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12 col-xl-4">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item h6 mb-0">Theo dõi chúng tôi</li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/" target="_blank" class="social-icon fab fa-facebook"></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/" target="_blank" class="social-icon fab fa-instagram"></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/" target="_blank" class="social-icon fab fa-youtube"></a>
                    </li>

                </ul>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-5">
                <p>Copyright &copy;2021
                    <strong>Eden Beauty</strong> All rights reserved
                </p>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-3">
                <div class="mb-3">
                    <i class="fab fa-cc-paypal fs-3"></i>
                    <i class="fab fa-cc-visa fs-3"></i>
                    <i class="fab fa-cc-mastercard fs-3"></i>
                    <div class="d-inline-block">
                        <img src="{{url('frontend')}}/image/icon-vnpay.png" 
                        style="width: 40px; height: 28px; background: #fff;vertical-align: sub;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>