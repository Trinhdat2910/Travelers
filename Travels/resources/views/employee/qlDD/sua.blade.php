@extends('employee.layout.index')

@section('contentNV')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sửa Thông tin Địa Điểm Du Lịch</h4>
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
                  <form class="forms-sample" action="employee/qlDD/suaDD/{{$diadiemdulich -> MaDD}}" method="POST">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                  	<div class="form-group">
                      <label for="exampleInputName1">Mã Địa Điểm</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="MaNV" value="{{ $diadiemdulich-> MaDD}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Tên Địa Điểm</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Địa Điểm" name="Ten" value="{{ $diadiemdulich -> TenDD}}">
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" value="" name="tinh">
                      <option value="{{ $diadiemdulich -> MaTinh }}" >{{ $diadiemdulich -> Tinh -> TenTinh }}</option>
                       @foreach($tinh as $t)
                      <option value="{{ $t -> MaTinh }}">{{ $t -> TenTinh }}</option>
                      @endforeach
                    </select>
                  </div>
                   
                    
                    <button type="submit" class="btn btn-success mr-2">Update</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection