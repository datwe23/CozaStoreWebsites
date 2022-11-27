
{{-- View này sẽ kế thừa giao diện từ `backend.layouts.master` --}}
@include('backend.layouts.partials.link')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.master` --}}
@section('title')
Danh sách sản phẩm
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `` --}}
@section('custom-css')

<style>
  .img-list {
    width: 100px;
    height: 100px;
  }
</style>
@endsection



{{-- Thay thế nội dung vào Placeholder `content` của view `backend.layouts.master` --}}
@section('content')

<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(Session::has('alert-' . $msg))
  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
  @endif
  @endforeach

</div>


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  
  @include('backend.layouts.partials.navbar')
  <main class="main-content position-relative border-radius-lg ">
  @include('backend.layouts.partials.sidebar')
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div style="padding:30px" class="card mb-4">
                <div style="padding-left:0px ; padding-top:0px ;border-bottom:1px solid rgb(94, 92, 92) " class="card-header pb-0">
                    <h6 style="padding-bottom: 7px">Product edit page</h6>
                </div>
                <div >
                    <div class="table-responsive p-0">
                        <form method="post" action="{{ route('admin.donhang.update' , $DonHang ->dh_ma)}}" enctype="multipart/form-data">
                          @csrf
                            <div class="row">
                
                           
                            <div class="form-group col-4">
                                <label for="sp_">Người nhận</label>
                                <input type="text" class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" value="{{$DonHang -> dh_nguoiNhan}}" >
                            </div>

                            <div class="form-group col-4">
                                <label for="sp_giaGoc">Địa chỉ </label>
                                <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" value="{{$DonHang -> dh_diaChi}}
                                " >
                            </div>   

                            <div class="form-group col-4">
                              <label for="sp_giaGoc">Điện thoại</label>
                              <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" value="{{$DonHang -> dh_dienThoai}}" >
                          </div> 
                            
                          <div class="form-group col-4">
                            <label for="sp_giaGoc">Người gửi</label>
                            <input type="text" class="form-control" id="dh_nguoiGui" name="dh_nguoiGui" value="{{$DonHang -> dh_nguoiGui}}" >
                        </div> 

                        <div class="form-group col-4">
                          <label for="sp_giaGoc">Lời chúc</label>
                          <input type="text" class="form-control" id="dh_loiChuc" name="dh_loiChuc"value ="{{$DonHang -> dh_loiChuc}}" >
                      </div>

                      <div style="padding-top:10px" class="form-group col-6">
                        <label for="dh_daThanhToan">Trạng thái thanh toán</label>
                        <select name="dh_daThanhToan" class="form-control">
                        <option value="1"{{old('dh_daThanhToan', $DonHang->dh_daThanhToan) == 1 ?"selected":""}}>Đã thanh toán</option>
                        <option value="2"{{old('dh_daThanhToan',$DonHang->dh_daThanhToan) == 2 ?"selected":""}}>Chưa thanh toán</option>
                      </select>

                    <div class="form-group col-4">
                      <label for="sp_giaGoc">Ngày xử lý</label>
                      <input type="date" class="form-control" id="dh_ngayXuly" name="dh_ngayXuly" >
                  </div>

        

                <div style="padding-top:10px" class="form-group col-6">
                  <label for="vc_ma">Phương thức thanh toán</label>
                  <select name="tt_ma" class="form-control">
                      @foreach($Thanhtoan as $tt)
                          <option value="{{ $tt->tt_ma }}">{{ $tt->tt_ten }}</option>
                      @endforeach
                  </select>

                            <div style="text-align: center ; padding-top:30px" class="form-group">
                                <button style="width:70% ; text-align:center" type="submit" class="btn btn-primary">SUBMIT</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="fa fa-heart"></i> by
                        <a href="" class="font-weight-bold" target="_blank">Creative Group 5</a> for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
  </main>

<style>

      
      .file-upload {
        background-color: #ffffff;
        width: 99%;
        border-radius: 6px;
        margin: 0 auto;
        padding: 20px;
      }
      
      
      .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
      }
      
      .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
      }
      
      .file-upload-content {
        display: none;
        text-align: center;
      }
      
      .file-upload-input { 
        position: absolute;
        margin: 0;
        padding: 0;

        outline: none;
        opacity: 0;
        cursor: pointer;
      }
      
      .image-upload-wrap {
        margin-top: 20px;
        position: relative;
      }

      
      .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
      }
      
      .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
      }
      

      
    
      .remove-image:active {
        border: 0;
        transition: all .2s ease;
      }
</style>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
      
          var reader = new FileReader();
      
          reader.onload = function(e) {
            $('.image-upload-wrap').hide();
      
            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();
      
            $('.image-title').html(input.files[0].name);
          };
      
          reader.readAsDataURL(input.files[0]);
      
        } else {
          removeUpload();
        }
      }
      
      function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
      }
      $('.image-upload-wrap').bind('dragover', function () {
              $('.image-upload-wrap').addClass('image-dropping');
          });
          $('.image-upload-wrap').bind('dragleave', function () {
              $('.image-upload-wrap').removeClass('image-dropping');
      });
      
</script>
</body>
