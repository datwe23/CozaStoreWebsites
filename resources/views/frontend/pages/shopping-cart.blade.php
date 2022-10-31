{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
CozaStore | Check out
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js">

<div style="text-align:center; background-color:#222222 ; height:180px"class="all">
    <i style="padding-top: 20px; padding-bottom:5px; font-size:100px" class="fa fa-credit-card" aria-hidden="true"></i>
    <h1 style="font-size:30px;color:rgba(57, 57, 57, 0.74) ; font-family:'Trebuchet MS', 'Lucvida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ; font-weight:100 ">CHECK OUT</h1>
</div>
		<div class="tab_container" >
                
                <input class="input-tab" id="tab1" type="radio" name="tabs">
                <label   class="label" for="tab1"><span class="numberCircle">1</span><span>Cart</span></label>
                
                <input class="input-tab"id="tab2" type="radio" name="tabs"checked>
                <label   class="label" for="tab2"><span class="numberCircle">2</span><span>Customer Information</span></label>
                
                <input class="input-tab"id="tab3" type="radio" name="tabs" >
                <label   class="label" for="tab3"><span class="numberCircle">3</span>Rules<span></span></label>
                
			<section style="width:1200px ; margin:auto" id="content1">
                <!-- Hiển thị giỏ hàng -->
                <ngcart-cart template-url="{{ asset('vendor/ngCart/template/ngCart/cart_checkout.html') }}"></ngcart-cart>
			</section>

			<section id="content2" class="tab-content">
              <div ng-controller="orderController">
                <form name="orderForm" ng-submit="submitOrderForm()" novalidate style="padding:20px 150px" class="row g-3">

                    <div class="col-md-4">
                      <label for="inputEmail4" class="form-label lassa" >Account</label>
                      <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" ng-model="kh_taiKhoan" ng-minlength="6" ng-maxlength="50" ng-required=true>
                      <ul>
                        <!-- Thông báo lỗi kh_taiKhoan -->
                        <li><span class="infor_error" ng-show="orderForm.kh_taiKhoan.$error.required"> Please enter your account name</span></li>
                        <li><span class="infor_error" ng-show="orderForm.kh_taiKhoan.$error.minlength">Account name must be > 6 characters</span></li>
                        <li><span class="infor_error" ng-show="orderForm.kh_taiKhoan.$error.maxlength">Username must be <= 50 characters</span> </li> <!-- Thông báo lỗi kh_hoTen -->
                    </ul>
                    </div>
                    <div  class="col-md col-md-6">
                      <label for="inputPassword4" class="form-label lassa" >Name</label>
                      <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" ng-model="kh_hoTen" ng-minlength="6" ng-maxlength="100" ng-required=true>
                      <ul>
                          <li><span class="infor_error" ng-show="orderForm.kh_hoTen.$error.required">Please enter your Name</span></li>
                          <li><span class="infor_error" ng-show="orderForm.kh_hoTen.$error.minlength">Name must be > 6 characters</span></li>
                          <li><span class="infor_error" ng-show="orderForm.kh_hoTen.$error.maxlength">Name must be <= 100 characters</span> </li> 
                      </ul>
                    </div>
                    <div class=" col-md col-2">
                      <label  for="inputAddress" class="form-label lassa" >Sex</label>
                      <select name="kh_gioiTinh" id="kh_gioiTinh" class="form-control" ng-model="kh_gioiTinh" ng-required=true>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                    <ul>
                        <!-- Thông báo lỗi kh_gioiTinh -->
                        <li><span class="infor_error" ng-show="orderForm.kh_gioiTinh.$error.required">Please select</span></li>
                    </ul>
                    </div>
                    <div class="col-md col-md-4">
                      <label class="form-label lassa" >Email</label>
                      <input type="email" class="form-control" id="kh_email" name="kh_email" ng-model="kh_email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                      <ul>
                          <!-- Thông báo lỗi kh_email -->
                          <li><span class="infor_error" ng-show="orderForm.kh_email.$error.required">Please enter your email</span></li>
                          <li><span class="infor_error" ng-show="!orderForm.kh_email.$error.required && orderForm.kh_email.$error.pattern">Only gmail.com is accepted, please check again</span></li>
                      </ul>
                    </div>
                    <div class="col-md col-md-6">
                      <label  class="form-label lassa" >Address</label>
                      <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" ng-model="kh_diaChi" ng-minlength="6" ng-maxlength="250">
                      
                      <ul>
                          <!-- Thông báo lỗi kh_diaChi -->
                          <li><span class="infor_error" ng-show="orderForm.kh_diaChi.$error.minlength">Address must be > 6 characters</span></li>
                          <li><span class="infor_error" ng-show="orderForm.kh_diaChi.$error.maxlength">Address must be <= 250 characters</span> </li> <!-- Thông báo lỗi kh_dienThoai -->
                      </ul>
                    </div>

                    <div class="col-md col-md-2">
                        <label  class="form-label lassa" >Date of birth</label>
                        <input type="datetime-local" class="form-control" id="kh_ngaySinh" name="kh_ngaySinh" ng-model="kh_ngaySinh" ng-required=true>
                        <ul>
                            <!-- Thông báo lỗi kh_ngaySinh -->
                            <li><span class="infor_error" ng-show="orderForm.kh_ngaySinh.$error.required">Please select</span></li>
                        </ul>
                      </div>

                      <div class="col-md col-md-6">
                        <label  class="form-label lassa" >Address</label>
                        <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" ng-model="kh_diaChi" ng-minlength="6" ng-maxlength="250">
                        <ul>
                            <!-- Thông báo lỗi kh_diaChi -->
                            <li><span class="infor_error" ng-show="orderForm.kh_diaChi.$error.minlength">Address must be > 6 characters</span></li>
                            <li><span class="infor_error" ng-show="orderForm.kh_diaChi.$error.maxlength">Address must be <= 250 characters</span> </li> <!-- Thông báo lỗi kh_dienThoai -->
                        </ul>
                      </div>

                      <div class="col-md col-md-6">
                        <label  class="form-label lassa" > Phone </label>
                        <input type="text" class="form-control" id="kh_dienThoai" name="kh_dienThoai" ng-model="kh_dienThoai" ng-minlength="6" ng-maxlength="11">
                        <ul>
                            <li><span class="infor_error" ng-show="orderForm.kh_dienthoai.$error.required">Please enter your Name</span></li>
                            <li><span class="infor_error" ng-show="orderForm.kh_dienThoai.$error.minlength">Phone must be > 6 characters</span></li>
                            <li><span class="infor_error" ng-show="orderForm.kh_dienThoai.$error.maxlength">Phone must be <= 11 characters</span> </li> </li> </div> <div class="form-group">
                        </ul>
                      </div>
                    
                    <div class="col-md col-md-4">
                        <label class="lassa"  for="dh_thoiGianNhanHang">Delivery time:</label>
                        <input type="datetime-local" class="form-control" id="dh_thoiGianNhanHang" name="dh_thoiGianNhanHang" ng-model="dh_thoiGianNhanHang" ng-required=true>
                        <ul>
                            <!-- Thông báo lỗi dh_thoiGianDatHang -->
                            <li><span class="infor_error" ng-show="orderForm.dh_thoiGianNhanHang.$error.required">Please enter your delivery time</span></li>
                        </ul>
                    </div>

                    <div class="col-md col-md-4">
                        <label class="lassa"  for="dh_nguoiNhan">Receiver:</label>
                        <input type="text" class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" ng-model="dh_nguoiNhan" ng-minlength="6" ng-maxlength="100" ng-required=true>
                        <ul>
                            <!-- Thông báo lỗi dh_nguoiNhan -->
                            <li><span class="infor_error" ng-show="orderForm.dh_nguoiNhan.$error.required">Please enter the recipient name</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_nguoiNhan.$error.minlength">Recipient name must be > 6 characters</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_nguoiNhan.$error.maxlength">Recipient name must be <= 100 characters</span> 
                        </ul>
                    </div>

                    <div class=" col-md col-md-4">
                        <label class="lassa"  for="dh_diaChi">Receiver address</label>
                        <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" ng-model="dh_diaChi" ng-minlength="6" ng-maxlength="250" ng-required=true>
                        <ul>
                        </li> <!-- Thông báo lỗi dh_diaChi -->
                        <li><span class="infor_error" ng-show="orderForm.dh_diaChi.$error.required">Please enter your address</span></li>
                        <li><span class="infor_error" ng-show="orderForm.dh_diaChi.$error.minlength">Address must be > 6 characters</span></li>
                        <li><span class="infor_error" ng-show="orderForm.dh_diaChi.$error.maxlength">Address must be <= 250 characters</span> </li> 
                        </ul>
                    </div>

                    <div class=" col-md col-md-4">
                        <label class="lassa"  for="dh_dienThoai">Recipient phone</label>
                        <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" ng-model="dh_dienThoai" ng-minlength="6" ng-maxlength="11" ng-required=true>
                        <ul>
                            <!-- Thông báo lỗi dh_dienThoai -->
                            <li><span class="infor_error" ng-show="orderForm.dh_dienThoai.$error.required">Please enter Phone</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_dienThoai.$error.minlength">Phone must be > 6 characters</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_dienThoai.$error.maxlength">Phone must be <= 11 characters</span> </li>
                        </ul>
                    </div>

                    <div class="col-md col-md-4">
                        <label class="lassa"  for="dh_nguoiGui">Recipient</label>
                        <input type="text" class="form-control" id="dh_nguoiGui" name="dh_nguoiGui" ng-model="dh_nguoiGui" ng-minlength="6" ng-maxlength="100" ng-required=true>
                        <ul>
                            <!-- Thông báo lỗi dh_nguoiGui -->
                            <li><span class="infor_error" ng-show="orderForm.dh_nguoiGui.$error.required">Please enter Sender</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_nguoiGui.$error.minlength">Sender must be > 6 characters</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_nguoiGui.$error.maxlength">Sender must be <= 100 characters</span> </li> 
                        </ul>
                    </div>

                    <div class="col-md col-md-4">
                        <label class="lassa"  for="tt_ma">Payment methods:</label>
                        <select name="tt_ma" id="tt_ma" class="form-control" ng-model="tt_ma" ng-required=true>
                            @foreach($danhsachphuongthucthanhtoan as $tt)
                            <option value="{{ $tt->tt_ma }}">{{ $tt->tt_ten }}</option>
                            @endforeach
                        </select>
                        <ul>
                            <!-- Thông báo lỗi tt_ma -->
                            <li><span class="infor_error" ng-show="orderForm.tt_ma.$error.required">Please select Payment method</span></li>
                        </ul>
                    </div>

                    <div class="col-md col-md-12">
                        <label class="lassa"  for="dh_loiChuc">Wish:</label>
                        <textarea style="height:100px" class="form-control" id="dh_loiChuc" name="dh_loiChuc" ng-model="dh_loiChuc" ng-minlength="6" ng-maxlength="500" ng-required=true></textarea>
                        <ul>
                            <!-- Thông báo lỗi dh_loiChuc -->
                            <li><span class="infor_error" ng-show="orderForm.dh_loiChuc.$error.required">Please enter Wishes</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_loiChuc.$error.minlength">Wishes must be > 6 characters</span></li>
                            <li><span class="infor_error" ng-show="orderForm.dh_loiChuc.$error.maxlength">Wishes must be <= 500 characters</span> </li> 
                        </ul>
                    </div>

                    <div class="col-md col-md-12">
                        <label class="lassa"  for="vc_ma">Form of transportation:</label>
                        <select name="vc_ma" id="vc_ma" class="form-control" ng-model="vc_ma" ng-required=true>
                            @foreach($danhsachvanchuyen as $vc)
                            <option value="{{ $vc->vc_ma }}">{{ $vc->vc_ten }} ({{ $vc->vc_chiPhi }} đ)</option>
                            @endforeach
                        </select>
                        <ul>
                            <!-- Thông báo lỗi vc_ma -->
                            <li><span class="infor_error" ng-show="orderForm.vc_ma.$error.required">Please select Shipping method</span></li>
                        </ul>
                    </div>
                    <button style="margin-top:40px" type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
                        Thanh toán
                    </button>

                </form>
                      <div class="alert alert-success" ng-show="orderForm.$valid">
                        Valid information, please press the . button<b>"Thanh toán"</b> to complete your ORDER<br />
                        We will send email to you. Thank you very much for trusting our products.
        </div>
			</section>

            <section style="width:1200px ; margin:auto" id="content3">
                <!-- Hiển thị giỏ hàng -->
                <p>
                1.1       Chào mừng bạn đến với sàn giao dịch thương mại điện tử CozaStore qua giao diện website hoặc ứng dụng di động (“Trang CozaStore”). Trước khi sử dụng Trang CozaStore hoặc tạo tài khoản CozaStore (“Tài Khoản”), vui lòng đọc kỹ các Điều Khoản Dịch Vụ dưới đây và Quy Chế Hoạt Động Sàn Giao Dịch Thương Mại Điện Tử CozaStore để hiểu rõ quyền lợi và nghĩa vụ hợp pháp của mình đối với Công ty TNHH CozaStore và các công ty liên kết và công ty con của CozaStore (sau đây được gọi riêng là “CozaStore”, gọi chung là “chúng tôi”, “của chúng tôi”). “Dịch Vụ” chúng tôi cung cấp hoặc sẵn có bao gồm (a) Trang CozaStore, (b) các dịch vụ được cung cấp bởi Trang CozaStore và bởi phần mềm dành cho khách hàng của CozaStore có sẵn trên Trang CozaStore, và (c) tất cả các thông tin, đường dẫn, tính năng, dữ liệu, văn bản, hình ảnh, biểu đồ, âm nhạc, âm thanh, video (bao gồm cả các đoạn video được đăng tải trực tiếp theo thời gian thực (livestream)), tin nhắn, tags, nội dung, chương trình, phần mềm, ứng dụng dịch vụ (bao gồm bất kỳ ứng dụng dịch vụ di động nào) hoặc các tài liệu khác có sẵn trên Trang CozaStore hoặc các dịch vụ liên quan đến Trang CozaStore (“Nội Dung”). Bất kỳ tính năng mới nào được bổ sung hoặc mở rộng đối với Dịch Vụ đều thuộc phạm vi điều chỉnh của Điều Khoản Dịch Vụ này. Điều Khoản Dịch Vụ này điều chỉnh việc bạn sử dụng Dịch Vụ cung cấp bởi CozaStore.

                </p>
                <br>
                <p>
                    1.2       Dịch Vụ bao gồm dịch vụ sàn giao dịch trực tuyến kết nối người tiêu dùng với nhau nhằm mang đến cơ hội kinh doanh giữa người mua (“Người Mua”) và người bán (“Người Bán”) (gọi chung là “bạn”, “Người Sử Dụng” hoặc “Các Bên”). Hợp đồng mua bán thật sự là trực tiếp giữa Người Mua và Người Bán. Các Bên liên quan đến giao dịch đó sẽ chịu trách nhiệm đối với hợp đồng mua bán giữa họ, việc đăng bán hàng hóa, bảo hành sản phẩm và tương tự. CozaStore không can thiệp vào giao dịch giữa các Người Sử Dụng. CozaStore có thể hoặc không sàng lọc trước Người Sử Dụng hoặc Nội Dung hoặc thông tin cung cấp bởi Người Sử Dụng. CozaStore bảo lưu quyền loại bỏ bất cứ Nội Dung hoặc thông tin nào trên Trang CozaStore theo Mục 6.4 bên dưới. CozaStore không bảo đảm cho việc các Người Sử Dụng sẽ thực tế hoàn thành giao dịch. Lưu ý, CozaStore sẽ là bên trung gian quản lý tình trạng hàng hóa và mua bán giữa Người Mua và Người Bán và quản lý vấn đề chuyển phát, trừ khi Người Mua và Người Bán thể hiện mong muốn tự giao dịch với nhau một cách rõ ràng.
                    
                </p>       
                <br>  
                <p>
                    1.3       Trước khi trở thành Người Sử Dụng của Trang CozaStore, bạn cần đọc và chấp nhận mọi điều khoản và điều kiện được quy định trong, và dẫn chiếu đến, Điều Khoản Dịch Vụ này và Chính Sách Bảo Mật được dẫn chiếu theo đây.
                </p>           
                <br>
                    <p>
                        1.4       CozaStore bảo lưu quyền thay đổi, chỉnh sửa, tạm ngưng hoặc chấm dứt tất cả hoặc bất kỳ phần nào của Trang CozaStore hoặc Dịch Vụ vào bất cứ thời điểm nào theo quy định pháp luật. Phiên Bản thử nghiệm của Dịch Vụ hoặc tính năng của Dịch Vụ có thể không hoàn toàn giống với phiên bản cuối cùng.
                    </p>
			</section>



		</div>


</div>
</div>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `orderController`
    app.controller('orderController', function($scope, $http, ngCart) {
        $scope.ngCart = ngCart;

        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitOrderForm = function() {
            debugger;
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.orderForm.$valid) {
                // lấy data của Form
                var dataInputOrderForm_KhachHang = {
                    "kh_taiKhoan": $scope.orderForm.kh_taiKhoan.$viewValue,
                    "kh_hoTen": $scope.orderForm.kh_hoTen.$viewValue,
                    "kh_gioiTinh": $scope.orderForm.kh_gioiTinh.$viewValue,
                    "kh_email": $scope.orderForm.kh_email.$viewValue,
                    "kh_ngaySinh": $scope.orderForm.kh_ngaySinh.$viewValue,
                    "kh_diaChi": $scope.orderForm.kh_diaChi.$viewValue,
                    "kh_dienThoai": $scope.orderForm.kh_dienThoai.$viewValue,
                };

                var dataInputOrderForm_DatHang = {
                    "dh_thoiGianNhanHang": $scope.orderForm.dh_thoiGianNhanHang.$viewValue,
                    "dh_nguoiNhan": $scope.orderForm.dh_nguoiNhan.$viewValue,
                    "dh_diaChi": $scope.orderForm.dh_diaChi.$viewValue,
                    "dh_dienThoai": $scope.orderForm.dh_dienThoai.$viewValue,
                    "dh_nguoiGui": $scope.orderForm.dh_nguoiGui.$viewValue,
                    "dh_loiChuc": $scope.orderForm.dh_loiChuc.$viewValue,
                    "vc_ma": $scope.orderForm.vc_ma.$viewValue,
                    "tt_ma": $scope.orderForm.tt_ma.$viewValue,
                };

                var dataCart = ngCart.getCart();

                var dataInputOrderForm = {
                    "khachhang": dataInputOrderForm_KhachHang,
                    "donhang": dataInputOrderForm_DatHang,
                    "giohang": dataCart,
                    "_token": "{{ csrf_token() }}",
                };

                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.order`
                $http({
                    url: "{{ route('frontend.order') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputOrderForm)
                }).then(function successCallback(response) {
                    // Clear giỏ hàng ngCart
                    //$scope.ngCart.empty();

                    // Gởi mail thành công, thông báo cho khách hàng biết
                    swal('Đơn hàng hoàn tất!', 'Xin cám ơn Quý khách!', 'success');

                    // Chuyển sang trang Hoàn tất đặt hàng
                    if (response.data.redirectUrl) {
                        location.href = response.data.redirectUrl;
                    }
                }, function errorCallback(response) {
                    // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
                    swal('Có lỗi trong quá trình thực hiện Đơn hàng!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });
            }
        };
    });
</script>

<style>
    .lassa{
        color:rgb(58, 58, 58) ; font-size: 14px
    }
    .col-md{
        margin-bottom: 15px
    }

    .infor_error{
        color:rgba(247, 28, 28, 0.841);
    }

    *,
*:after,
*:before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.clearfix:before,
.clearfix:after {
	content: " ";
	display: table;
}

.clearfix:after {
	clear: both;
}

body {
	font-family: sans-serif;
	background: #f6f9fa;
}

.all>h1 {
	color:rgb(224, 219, 219) ;
	text-align: center;
}
.all>h4.payment-title {
    text-align: left;
    padding: 10px 0px 30px 30px;
    font-weight: 500;
    color: #5e6977;
}
a {
  color: #666666;
  text-decoration: none;
  outline: none;
}

.tab_container {
   max-width: 1200px ; margin: auto;
    margin: 50px auto;
    position: relative;
    border: 1px solid #eee;
    border-radius: 7px;
  background:#fff;
}

input, section {
  clear: both;
  padding-top: 10px;
  display: none;
}

.label {
  font-weight: 700;
  font-size: 14px;
  display: block;
  float: left;
  padding: 20px 14px;
  color: #ccc;
  cursor: pointer;
  text-decoration: none;
  text-align: center;
  background: #fff;
  margin-bottom: 2px;
      border-top-left-radius: 7px;
    border-top-right-radius: 7px;
  border-bottom:2px solid #eee;

}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
  padding: 20px 0 0 0;
  color: #999;
}

.tab_container .tab-content h3  {
  text-align: center;
}

.tab_container [id^="tab"]:checked + label {
  background: #fff;
  border-bottom:2px solid #358ed7;
  color: #358ed7;
}

.tab_container [id^="tab"]:checked + label>span.numberCircle {
  border: 2px solid #358ed7;
  border-radius: 50%;
    width: 30px;
    height: 30px;
    padding: 3px 5px;
    text-align: center;
    font-size: 10px;
    margin: 3px 8px
}

label:hover {
background-color:#eee;
  border-radius:0px;
}

.numberCircle {
    border-radius: 50%;
    width: 30px;
    height: 30px;
    padding: 3px 5px;
    border: 2px solid #ccc;
    text-align: center;
    font-size: 10px;
    margin: 3px 8px
}


.row-payment-method {
  margin: 0px 0px 0px 0px;
  padding: 22px 0px 11px 0px;
  text-align: left;
  display: table;
}
.payment-row {
  background-color: #f5f6fa;
  padding-left: 30px;
  padding-right: 30px;
      width: 100%;
}
.payment-row-last {
  margin-left: 30px;
  margin-right: 30px;
  width: 100%;
}

.payment-padding-right {
  
}
.select-icon {
  display: table-cell;
  vertical-align: top;
  text-align: left;
  padding-left: 0px;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  width: 24px;
  height: 24px;
}

.select-txt {
  display: table-cell;
  vertical-align: middle;
  word-wrap: break-word;
  height: 60px;
  text-align: left;
  padding-left: 15px;
  font-size: 12pt;
}
.select-logo {
  padding-right: 0px;
  vertical-align: top;
      right: 35px;
    position: absolute;
}
.select-logo-sub {
  display: table-cell;
  vertical-align: middle;
}
.logo-spacer {
  padding-right: 13px;
}
.pymt-type-name {
  font-weight: 500;
  font-size: 12pt;
  padding-bottom: 8px;
  color: #5a6977;
}
.pymt-type-desc {
  padding-bottom: 22px;
  width:70%;
    font-size:14px;
}
.hr {
  border-bottom: 1px solid #ebf0f5;
  padding-bottom: 5px;
}
.form-cc {
  display: table;
  width: 100%;
  text-align: left;
  padding: 0px 0px 30px 30px;
}
.row-cc {
  display: table;
  width: 100%;
  padding-bottom: 7px;
}
.cc-txt {
  border-color: #e1e8ee;
  width: 100%;
}
.input-tab {
  border-radius: 5px;
  border-style: solid;
  border-width: 2px;
  height: 38px;
  padding-left: 15px;
  font-weight: 600;
  font-size: 11pt;
  color: #5e6977;
 
}
.input-tab[type="text"] {
   display: initial;
  padding:15px
}
.text-validated {
  border-color: #7DC855;
  background-image: url("https://www.dropbox.com/s/1mve74fafiwsae1/icon-tick.png?raw=1");
  background-repeat: no-repeat;
  background-position: right 18px center;
}
.cc-ddl {
  border-color: #f0f4f7;
  background-color: #f0f4f7;
      width: 100px;
    margin-right: 10px;

  
}
.cc-title {
  font-size: 10.5pt;
  padding-bottom: 8px;
}
.cc-field {
  padding-top: 15px;
  padding-right: 30px;
  display: table-cell;
}
.button-master-container, .button-master-container:hover {
  display: table;
  width: 100%;
  border-top: 1px solid #e1e8ee;
  height: 60px;
  vertical-align: bottom;
}
.button-container {
  width: 50%;
  display: table-cell;
  text-align: center;
  vertical-align: middle;
}
a, a:hover {
  color: inherit;
  text-decoration: inherit;
}
.button-container:hover {
background-color:#eee;
  cursor:pointer;
}
.button-finish {
  border-left: 1px solid #e1e8ee;
  color: #7DC855;
  font-weight: 500;
  font-size: 12pt;
  background-image: url("https://www.dropbox.com/s/10d95otbo48r0hh/icon-next.png?raw=1");
  background-repeat: no-repeat;
  background-position: right 50px center;
}
.cvv-tooltip-img {
  display: inline-block;
  vertical-align: middle;
  padding-left: 17px;
}
.input-tab[id^="radio"]{
   display:none;
}

.input-tab[id^="radio"] + label
{
    background-image:url("https://www.dropbox.com/s/mnwbybfl4pnzoi4/radio-inactive.png?raw=1");
    height: 26px;
    width: 24px;
    display:inline-block;
    padding: 0 0 0 0px;
    cursor:pointer;
    border-radius: 50%;
}

.input-tab[id^="radio"]:checked + label
{
    background-image:url("https://www.dropbox.com/s/8634yi8i1s7fx7w/radio-active.png?raw=1");
  height: 26px;
    width: 24px;
    display:inline-block;
    padding: 0 0 0 0px;
    cursor:pointer;
}
p.credit {
  text-align:center;
  color: #ccc;
}
</style>
@endsection