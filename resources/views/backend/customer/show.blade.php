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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Show Customers</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                            <p class="mb-0">{{ $customers->kh_hoTen }}</p>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <p class="mb-0">{{ $customers->kh_email }}</p>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                      <p class="mb-0">{{ $customers->kh_ngaySinh }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Last name</label>
                                       <p class="mb-0">{{ $customers->kh_dienThoai }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                       <p class="mb-0">{{ $customers->kh_diaChi }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <img src="{{ asset('assets/img/bg-profile.jpg') }}" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                    <a href="javascript:;">
                                        <img src="{{ asset('assets/img/team-2.jpg') }}" class="rounded-circle img-fluid border border-2 border-white">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                          
                        </div>
                        <div class="card-body pt-0">
                           
                            <div class="text-center mt-4">
                                <h5>
                                   {{ $customers->kh_hoTen }}
                                   
                                   <span class="font-weight-light"> | 

                                     <?php
                                            if($customers->kh_gioiTinh==1){
                                                ?>
                                                <span style="padding:5px 6px" class="badge badge-sm bg-gradient-success">
                                                <?php
                                                echo '<p style="font-size:12px; margin:0 ; padding:0px 6px">Female <i class="fa fa-venus" aria-hidden="true"></i> </p> ';

                                                ?>
                                                </span>
                                                <?php
                                            } 
                                            else{
                                                ?>
                                                <span style="background-color:#f44168;padding:5px 6px" class="badge badge-sm">
                                                <?php
                                                echo '<p style="font-size:12px; margin:0 ; padding:0px 6px">Male <i class="fa fa-mars" aria-hidden="true"></i> </p> ';
                                                ?>
                                                 </span>
                                                <?php
                                            }
                                        ?>

                                   </span>
                                </h5>
                                <div class="h6 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i> {{ $customers->kh_diaChi }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    
</div>
  </main>


</body>

