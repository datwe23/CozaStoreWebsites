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
                      <form method="post" action="{{ route('admin.loai.update' , $category->l_ma) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                        <div style="padding-top:10px"class="form-group col-6">
                          <label for="sp_ten">Category ID</label>
                          <input type="text" class="form-control" id="sp_ten" name="l_ma" value="{{$category ->l_ma}}">
                        </div>

                        <div style="padding-top:10px"class="form-group col-6">
                            <label for="sp_ten">Category Name</label>
                            <input type="text" class="form-control" id="sp_ten" name="l_ten" value="{{$category ->l_ten}}">
                          </div>

                        <div style="text-align: center ; padding-top:30px" class="form-group">
                           <button style="width:70% ; text-align:center"  type="submit" class="btn btn-primary">Submit</button>
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