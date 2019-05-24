@extends('admin.layout.index')

@section('content')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nhân Viên</h4>
                  <p class="card-description">
                    Thêm Nhân Viên
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
                  <form class="forms-sample" action="admin/qlNV/themNV" method="POST">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleInputName1">Họ Tên</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Họ Tên" name="Ten">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name='Password'>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Chức Vụ</label>
                    
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="Chucvu">
                      @foreach($chucvu as $cv)
                      <option value="{{ $cv -> MaChucVu }}">{{ $cv -> TenChucVu }}</option>
                      @endforeach
                    </select>
                   
                  </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Số điện thoại</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Số điện thoại" name='Tel'>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Địa Chỉ</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2" name='Diachi'></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Trình độ</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="Trinhdo">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Phạm Vi Hướng Dân</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="Phamvi">
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection