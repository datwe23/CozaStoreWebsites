<div class="row">

    <div class="col-lg-12 margin-tb">
    
    <div class="pull-left">
    
    <h2> Show employee</h2>
    
    </div>
    
    <div class="pull-right">
    
    <a class="btn btn-primary" href="{{ route('nhanvien.index') }}"> Back</a>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12">
    
    <div class="form-group">
    
    <strong>Name:</strong>
    
    {{ $nhanviens->nv_hoTen }}
    
    </div>
    
    </div>
    
    
    
    <div class="col-xs-12 col-sm-12 col-md-12">
    
    <div class="form-group">
    
    <strong>Gender:</strong>
    
    {{ $nhanviens->nv_gioiTinh }}
    
    </div>
    
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
    
    <div class="form-group">
    
    <strong>Email:</strong>
    
    {{ $nhanviens->nv_email }}
    
    </div>
    
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
    
    <div class="form-group">
    
    <strong>Date of birth:</strong>
    
    {{ $nhanviens->nv_ngaySinh }}
    
    </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
    
        <div class="form-group">
        
        <strong>Address:</strong>
        
        {{ $nhanviens->nv_diaChi }}
        
        </div>
        
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12">
    
            <div class="form-group">
            
            <strong>Phone number:</strong>
            
            {{ $nhanviens->nv_dienThoai }}
            
            </div>
            
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
    
                <div class="form-group">
                
                <strong>Status:</strong>
                
                {{ $nhanviens->nv_trangThai }}
                
                </div>
                
                </div>