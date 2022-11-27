<div class="row">

<div class="col-lg-12 margin-tb">

<div class="pull-left">

<h2> Show customer</h2>

</div>

<div class="pull-right">

<a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>

</div>

</div>

</div>

<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

<strong>Name:</strong>

{{ $customers->kh_hoTen }}

</div>

</div>



<div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

<strong>Gender:</strong>

{{ $customers->kh_gioiTinh }}

</div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

<strong>Email:</strong>

{{ $customers->kh_email }}

</div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

<strong>Date of birth:</strong>

{{ $customers->kh_ngaySinh }}

</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">
    
    <strong>Address:</strong>
    
    {{ $customers->kh_diaChi }}
    
    </div>
    
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
        
        <strong>Phone number:</strong>
        
        {{ $customers->kh_dienThoai }}
        
        </div>
        
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
            
            <strong>Status:</strong>
            
            {{ $customers->kh_trangThai }}
            
            </div>
            
            </div>