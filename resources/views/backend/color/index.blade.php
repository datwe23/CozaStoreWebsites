{{-- View này sẽ kế thừa giao diện từ `backend.layouts.master` --}}
@include('backend.layouts.partials.link')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.master` --}}
@section('title')
Danh sách Color
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
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert"
            aria-label="close">&times;</a></p>
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
                    <div class="card mb-4">
                        <div style="justify-content: space-between ; display:flex" class="card-header ">
                            <div class="header-left">
                                <h6>Color List</h6>
                            </div>
                            <div class="header-right">
                                <a href="{{ route('color.create') }}" class="btn btn-primary btn-sm mb-0 w-100"><i
                                        style="padding-right:10px" class="fa fa-plus-square" aria-hidden="true"></i>Add
                                    new Color</a>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                        <div style="background-color: #4d66f5d7;padding-top: 10px;padding-bottom: 0px;border-radius: 0;color: #fff;"
                            class="alert alert-dismissible">
                            <button style="" type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <p style="padding-left: 2px">{{ $message }}</p>
                        </div>
                        @endif

                        @if ($message = Session::get('successcreate'))
                        <div style="background-color: #2dce89;color:padding-top: 10px;padding-bottom: 0px;border-radius: 0;color: #fff;"
                            class="alert alert-dismissible">
                            <button style="" type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <p style="padding-left: 2px">{{ $message }}</p>
                        </div>
                        @endif

                        @if ($message = Session::get('successdelete'))
                        <div style="background-color: #f44168;padding-top: 10px;padding-bottom: 0px;border-radius: 0;color: #fff;"
                            class="alert alert-dismissible">
                            <button style="" type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <p style="padding-left: 2px">{{ $message }}</p>
                        </div>
                        @endif
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STT</th>
                                            <th style="text-align:center"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Color ID</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Color Name</th>
                                            <th style="width:25px"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th style="width:25px"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($colors as $key => $m)
                                        <tr>
                                            <td style="width:25px ; text-align:center">
                                                <h6 style="padding-left:20px" class="text-xs font-weight-bold mb-0">
                                                    {{ $key+1 }}</h6>
                                            </td>
                                            <td style="width:25px ; text-align:center">
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $m->m_ma }}</h6>
                                            </td>

                                            <td style="width:55px ; text-align:center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $m->m_ten }}</p>
                                            </td>



                                            <td class="align-middle text-center text-sm">

                                                <?php
                                            if($m->m_trangThai==1){
                                                ?>
                                                <span class="badge badge-sm bg-gradient-success">
                                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                    <?php
                                                echo 'ACTIVE';
                                                ?>
                                                </span>
                                                <?php
                                            } 
                                            else{
                                                ?>
                                                <span style="background-color:#f44168" class="badge badge-sm">
                                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                    <?php
                                                echo 'HIDDEN ';
                                                ?>
                                                </span>
                                                <?php
                                            }
                                        ?>

                                                </span>
                                            </td>

                                            <td style="text-align: center" class="align-middle">
                                                <form action="{{ route('color.destroy',$m->m_ma) }}" method="POST">
                                                    <a href="{{ route('color.edit' , $m ->m_ma ) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">Edit |</a>
                                                    <a style="color: #f64468"
                                                        href="{{ route('color.destroy' , $m ->m_ma ) }}"
                                                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                                                        class="font-weight-bold text-xs">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

                                </script>, made with by
                                <a class="font-weight-bold" target="_blank">Creative Group 5</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>


</body>
