
@extends('employee.layout.index')

@section('contentNV')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa Thông tin Nhân Viên</h4>
                  <p class="card-description">
                    <h4>{{$nhanvien -> TenNV}}</h4>
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
                  <form class="forms-sample" action="employee/qlNV/suaNV/{{$nhanvien -> MaNV}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleInputName1">Mã Nhân Viên</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="MaNV" value="{{ $nhanvien -> MaNV}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Họ Tên</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Họ Tên" name="Ten" value="{{ $nhanvien -> TenNV}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="Email" value="{{ $nhanvien -> Email}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name='Password' value="{{ $nhanvien -> MatKhau}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Chức Vụ</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" value="{{ $nhanvien -> MaChucVu}}" name="Chucvu">
                      <option value="{{ $nhanvien -> MaChucVu }}">{{ $nhanvien -> ChucVu-> TenChucVu }}</option>
                      @foreach($chucvu as $cv)
                      <option value="{{ $cv -> MaChucVu }}">{{ $cv -> TenChucVu }}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Số điện thoại</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Số điện thoại" name='Tel' value="{{ $nhanvien -> Tel}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Địa Chỉ</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="Diachi" value="{{ $nhanvien -> DiaChi}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Trình độ</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="Trinhdo" value="{{ $nhanvien -> TrinhDo}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Phạm Vi Hướng Dân</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="Phamvi" value="{{ $nhanvien -> PhamViHD}}">
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Update</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection