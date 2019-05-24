@extends('employee.layout.index')

@section('contentNV')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Đối Tác Dịch Vụ</h4>
                  <p class="card-description">
                    Thêm Đối Tác Mới
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
                  <form class="forms-sample" action="employee/qlDoiTac/themDT" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleInputName1">Tên Đối Tác</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Đối Tác " name="Ten">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Loại Dịch Vụ</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="loaidichvu">
                      @foreach(App\loaidoitac::all() as $t)
                      <option value="{{ $t -> MaLoaiDT}}">{{ $t -> TenLoaiDT }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputName2">Tel</label>
                      <input type="text" class="form-control" id="exampleInputName2" placeholder="Số điện thoại" name="Tel">
                    </div>
                  <div class="form-group">
                      <label for="exampleInputName3">Email</label>
                      <input type="Email" class="form-control" id="exampleInputName3" placeholder="Email " name="Email">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputName4">Địa Chỉ</label>
                      <input type="text" class="form-control" id="exampleInputName4" placeholder="Địa Chỉ " name="DiaChi">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="tinh">
                      @foreach(App\tinh::all() as $t)
                      <option value="{{ $t -> MaTinh }}">{{ $t -> TenTinh }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Ngân Hàng</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="nganhang">
                      
                      <option value="VietComBank">VietComBank</option>
                      <option value="VietTinBank">VietTinBank</option>
                      <option value="SaComBank">SaComBank</option>
                      <option value="VPBank">VPBank</option>
                      <option value="DongABank">DongABank</option>
                      
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputName3">Số Tài Khoản</label>
                      <input type="text" class="form-control" id="exampleInputName3" placeholder="Số  Tài Khoản " name="STK">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputName3">Các Dịch Vụ</label>
                      <table class="table table-bordered">
                        <thead bgcolor="#308ee0" style="color: #fff">
                          <tr>
                            <td>Tên DV</td>
                            <td>Giá Người Lớn</td>
                            <td>Giá Trẻ Em</td>
                            <td width="50px"><a class="addDV btn btn-success ">
                                <i class="mdi mdi-plus"></i>
                              </a></td>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                         
                      </table>
                      
                  </div>
                                       
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection
@section('script')
<script src="admin_asset/js/js/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('.addDV').click(function(){
      var tr = '<tr><td><input type="text" class="form-control"  placeholder="Tên Dịch  Vụ " name="TenDV[]"></td>'+
        '<td><input type="text" class="form-control" onKeyPress="return isNumberKey(event)" placeholder="Gía Người Lớn" name="GiaNL[]"></td>'+
        '<td><input type="text" class="form-control" onKeyPress="return isNumberKey(event)" placeholder="Gía Trẻ Em " name="GiaTE[]"></td>'+
        '<td><a class="removeDV btn btn-danger " style="color:#fff">'+
          '<i class="fa fa-window-close"></i>'+
          '</a></td>'+
          '</tr>';
          $('tbody').append(tr);
    });
    $('.removeDV').live('click',function(){
          $(this).parent().parent().remove();
      });
} );
  function isNumberKey(evt)
     {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
     return false;
     return true;
     }

  </script>
@endsection