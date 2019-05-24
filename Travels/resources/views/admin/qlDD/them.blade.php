@extends('admin.layout.index')

@section('content')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Địa Điểm</h4>
                  <p class="card-description">
                    Thêm Địa Điểm Du Lịch
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
                  <form class="forms-sample" action="admin/qlDD/themDD" method="POST">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleInputName1">Tên Địa Điểm</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Địa Điểm " name="Ten">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="Tinh">
                      @foreach($tinh as $t)
                      <option value="{{ $t -> MaTinh }}">{{ $t -> TenTinh }}</option>
                      @endforeach
                    </select>
                  </div>
                                       
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection