@extends('admin.layout.index')

@section('content')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tạo Tour Mới</h4>
                  <p class="card-description">
                    
                  </p>
                  @if(count($errors) > 0 )
                  		<div class= "alert alert-danger" >
                  			@foreach($errors -> all() as $err)
                  				{{ $err }}<br>


                  			@endforeach

                  		</div>
                  @endif

                  @if(session('thongbao'))
                  		<div class= "alert alert-success" >
                  			{{session('thongbao')}}

                  		</div>
                  @endif
                  <form class="forms-sample" action="admin/qlTour/themTour" method="POST" enctype="multipart/form-data">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleInputName1">Tên Tour</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Tour" name="Ten" required="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Tiêu Đề</label>
                      <textarea class="form-control"  name="TieuDe"  ></textarea>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Khu Vực</label>
                    <select class="form-control form-control-sm" id="khuvuc" name="khuvuc" required >
                      @foreach(App\khuvuc::all() as $kv)
                      <option value="{{ $kv -> MaKV }}">{{ $kv -> TenKV }}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Nhóm Tour</label>
                    <select class="form-control form-control-sm" id="nhomtour" name="NhomTour" >
                      @foreach(App\nhomtour::all() as $nt)
                      <option value="{{ $nt -> MaNhomTour }}">{{ $nt -> TenNhom }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div id="chitietnhomtour" style="width: 100%; height: 70px; background: #EEE9E9;" > 
                    {{-- <p style="background: #99CCFF; padding: 0.5px; float: left; margin-left: 10px; margin-right: 20px;">dsfds <i class="dong fa fa-times"></i><p> --}}
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh/ TP</label>
                    <select class="form-control form-control-sm" id="MaTinh" name="tinh" required >
                     @foreach(App\tinh::all() as $t)
                      <option value="{{ $t -> MaTinh }}">{{ $t -> TenTinh }}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Chọn Địa Điểm Du Lịch</label>
                    <select class="form-control form-control-sm" id="MaDD" name="MaDD" >
                     {{--  <option value="{{ $tour -> MaNhomTour }}">{{ $tour -> nhomtour -> TenNhom }}</option> --}}
                      @foreach(App\diadiemdulich::all() as $nt)
                      <option value="{{ $nt -> MaDD }}">{{ $nt -> TenDD }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div id="diadiemtour" style="width: 100%; height: 100px; background: #EEE9E9;">
                    {{-- <p style="background: #99CCFF; padding: 0.5px; float: left; margin-left: 10px; margin-right: 20px;">dsfds <i class="dong fa fa-times"></i><p> --}}
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Hình Thức</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="HinhThuc">
                      @foreach(App\hinhthucdl::all() as $ht)
                      <option value="{{ $ht -> MaHT }}">{{ $ht -> TenHinhThuc }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Nhân Viên Phụ Trách</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="NhanVienPT">
                      @foreach(App\user::where('level',2)->get() as $nv)
                      <option value="{{ $nv -> MaNV }}">{{ $nv -> TenNV }}</option>
                      @endforeach
                    </select>
                  </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Hình Ảnh Tiêu Đề</label>
                      <input type="file" class="form-control" id="exampleInputCity1" placeholder="Chọn Ảnh" name='HinhAnh'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Điểm Khởi Hành</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="DiemKhoiHanh">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Số Ngày</label>
                      <input type="number" class="form-control" id="exampleInputCity8" name="SoNgay" min="1">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputCity1" >Mô Tả</label>
                      <textarea class="form-control"  name="MoTa"  CLASS="ckeditor" id="editor1"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Giá</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="Gia">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Giá Trẻ Em</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="GiaTE" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Giá Em Bé</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="GiaEB" >
                    </div>
                    
                    <button type="submit" class="thembtn btn btn-success mr-2">Submit</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection
@section('script')
  <script src="admin_asset/js/js/jquery.min.js"></script>

<script type="text/javascript">  
   CKEDITOR.replace( 'editor1' );  
</script>


 <script type="text/javascript">  
    $(document).ready(function(){
      $('#khuvuc').on('click',function(){
        var kv=$('#khuvuc').val();
        // document.getElementById('khuvuc').disabled= false;
        $.get('admin/ajax/nhomtour/'+ kv, function(data){
          $('#nhomtour').html(data);
        
          
        });
      });
      $('#nhomtour').on('change', function(){
        
        var a= $('#nhomtour option:selected').text();
        var b = $('#nhomtour ').val();
        //   $.get('admin/ajax/nhomtour/'+ kv, function(data){
        var r= '<p style="background: #99CCFF; padding: 0.5px; float: left; margin-left: 10px; margin-right: 20px;">'+a+'<i class="dong fa fa-times"></i><input name="CTNhomTour[]" type="text" value='+b+' style="display: none"> <p> '
          $('#chitietnhomtour').append(r);
          
        
          
        // });
      });
      $('.dong').live('click',function(){
          $(this).parent().remove();
      });
      $('#MaDD').on('click', function(){

        var a= $('#MaDD option:selected').text();
        var b = $('#MaDD ').val();
        //   $.get('admin/ajax/nhomtour/'+ kv, function(data){
        var r= '<p style="background: #99CCFF; padding: 0.5px; float: left; margin-left: 10px; margin-right: 20px;">'+a+'<i class="dongdd fa fa-times"></i><input name="DiaDiemTour[]" type="text" value='+b+' style="display: none"><p> '
          $('#diadiemtour').append(r);
        
          
        // });
      });
      $('.dongdd').live('click',function(){
          $(this).parent().remove();
      });
      $('#MaTinh').on('click',function(){
              
              var tinh = $('#MaTinh').val();

        $.get('admin/ajax/diadiemdl/'+ tinh  , function(data){
          $('#MaDD').html(data);
        
          
        });
      });
    });
</script>
@endsection