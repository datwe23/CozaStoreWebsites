{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
CozaStore | Product detail
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<div style="padding-bottom:200px" class="all">
    <!-- Product info -->
    @include('frontend.widgets.product-info', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])

</div>

@include('frontend.widgets.related_products', [$data = $danhsachsanpham])
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
@endsection