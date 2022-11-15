

{{-- View này sẽ kế thừa giao diện từ `backend.layouts.master` --}}
@include('backend.layouts.partials.link')





<body class="g-sidenav-show   bg-gray-100">
    
    
    @include('backend.layouts.partials.navbar')
    <main class="main-content position-relative border-radius-lg ">
        <header class="header-v4">
            <!-- Header desktop -->
            <div class="container-menu-desktop" style="height:20px">
                <!-- Topbar -->
                <div class="top-bar">
                        <div style="text-align:center ; padding-top:10px">
                            This is a product demo
                    </div>
                </div>
        
        
        </header>
        <div class="container-fluid py-4">
            <div class="row">
        <div class="col-12">
            {{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
            @extends('frontend.layouts.masters')
            
            {{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
            @section('title')
            CozaStore | Product detail
            @endsection
            
            {{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
            @section('custom-css')
            @endsection
            
            {{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
            @section('main-content')
            <div style="padding-top:20px ; margin-left:160px" class="all">
                <!-- Product info -->
                @include('frontend.widgets.product-info', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
            
            </div>
            
            @include('frontend.widgets.related_products', [$data = $danhsachsanpham])
            @endsection
            
            {{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
            @section('custom-scripts')
            @endsection
        </div>
    </div>
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

