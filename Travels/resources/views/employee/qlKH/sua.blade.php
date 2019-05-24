@extends('employee.layout.index')

@section('contentNV')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa Thông tin Khách Hàng</h4>
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
                  <form class="forms-sample" action="employee/qlKH/suaKH/{{ $khachhang -> MaKH}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleInputName1">#id</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="id" value="{{ $khachhang -> MaKH}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">UserName</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="user" value="{{ $khachhang -> Username}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Họ Tên</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Họ Tên" name="Ten" value="{{ $khachhang -> TenKH}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="Email" value="{{ $khachhang -> Email}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Password" name='Password' value="{{ $khachhang -> MatKhau}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Quốc Tịch</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3"  name="MaQG">
                      <option value="{{ $khachhang -> MaQG}}">{{ $khachhang -> quocgia-> TenQG}}</option>
                      @foreach(App\quocgia::all() as $qg)
                      <option value="{{ $qg -> MaQG}}">{{ $qg -> TenQG}}</option>

                      @endforeach
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Số điện thoại</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Số điện thoại" name='Tel' value="{{ $khachhang -> Tel}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Địa Chỉ</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="Diachi" value="{{ $khachhang -> DiaChi}}">
                    </div>
                  
                    <button type="submit" class="btn btn-success mr-2">Update</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection