
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
                        <form method="post" action="{{ route('admin.sanpham.update', ['id' => $sp->sp_ma]) }}" enctype="multipart/form-data">
                            <div class="row">
                            <div style="padding-top:10px"class="form-group col-6">
                                <label for="sp_ten">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten', $sp->sp_ten) }}">
                            </div>
                            <input type="hidden" name="_method" value="PUT" />
                            {{ csrf_field() }}
                            <div style="padding-top:10px" class="form-group col-6">
                                <label for="l_ma">Loại sản phẩm</label>
                                <select name="l_ma" class="form-control">
                                    @foreach($danhsachloai as $loai)
                                        @if($loai->l_ma == $sp->l_ma)
                                        <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                                        @else
                                        <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-4">
                                <label for="sp_giaGoc">Giá gốc</label>
                                <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{ old('sp_giaGoc', $sp->sp_giaGoc) }}">
                            </div>

                            <div class="form-group col-4">
                                <label for="sp_giaGoc">Giá bán</label>
                                <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{ old('sp_giaBan', $sp->sp_giaBan) }}">
                            </div>     
                            
                            <div class="form-group col-4">
                                <label for="sp_danhGia">Đánh giá</label>
                                <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{ old('sp_danhGia', $sp->sp_danhGia) }}">
                            </div>
                            <div style=" padding-left:10px ; padding-top:20px" class="form-group col-12">
                                <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                <div style="text-align: center;border:1px rgb(70, 20, 250) solid ;border-style: dashed " class="file-upload">
                                  <button class="btn btn-primary btn-sm mb-0 w-30" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i style="padding-right:5px " class="fa fa-upload" aria-hidden="true"></i> Add Image</button>
                                
                                  <div class="image-upload-wrap">
                                    <input class="file-upload-input" id="sp_hinh" type="file" name="sp_hinh" type='file' onchange="readURL(this);" accept="image/*" />
                                    <div  class="all">
                                        <img src="https://gmedia.playstation.com/is/image/SIEPDC/ps-plus-cloud-storage-dark-icon-01-en-25sep20?$native--t$" style="width:100px" alt="">
                                      <h3 style="font-family: Arial, Helvetica, sans-serif ; font-weight:200;padding-top:10px; font-size:20px ">Drag and drop a file or select add Image</h3>
                                    </div>
                                  </div>
                                  <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                      <button style="background-color: #fb6b4b ; color:11px" type="button" onclick="removeUpload()" class="remove-image btn btn-primary btn-sm mb-0 w-30"><i  style="padding-right:5px"class="fa fa-minus-circle" aria-hidden="true"></i>Remove</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="sp_thongTin">Thông tin</label>
                                <textarea style="height:100px" type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin', $sp->sp_thongTin) }}"></textarea>
                            </div>
                       
                            <div class="form-group col-4">
                                <label for="sp_taoMoi ">Ngày tạo mới</label>
                                <input type="date" class="form-control" id="sp_taoMoi" name="sp_taoMoi" value="{{ old('sp_taoMoi', $sp->sp_taoMoi) }}" data-mask-datetime>
                            </div>
                            <div class="form-group col-4">
                                <label for="sp_capNhat">Ngày cập nhật</label>
                                <input type="date" class="form-control" id="sp_capNhat" name="sp_capNhat" value="{{ old('sp_capNhat', $sp->sp_capNhat) }}" data-mask-datetime>
                            </div>
                            <div class="form-group col-4">
                              <label for="sp_trangThai">Trạng thái</label>
                              <select name="sp_trangThai" class="form-control">
                                  <option value="1" {{ old('sp_trangThai', $sp->sp_trangThai) == 1 ? "selected" : "" }}>Khóa</option>
                                  <option value="2" {{ old('sp_trangThai', $sp->sp_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                              </select>
                            </div>
                            <div class="form-group ">
                              <div class="file-loading">
                                  <label>Hình ảnh liên quan sản phẩm</label>
                                  <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
                              </div>
                            </div>
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
