@extends('employee.layout.index')

@section('contentNV')

<div class="card">
                <div class="card-body">
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >Danh sách Địa điểm du lịch</h4>
                    <a  class="addbtn btn btn-success btn-block" style="width: 200px; float: right; color: white;" >Thêm Địa Điểm
                  <i class="mdi mdi-plus"></i>
                  </a>
                  </div>
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    <table class="table table-striped" id="dstour">
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr>
                          <th >
                            Mã Địa Điểm
                          </th>
                          <th >
                            Tên Địa Điểm
                          </th>
                          <th>
                            Hình Ảnh
                          </th>
                          <th>
                            Tên Tỉnh
                          </th>
                          <th>
                            Quốc gia
                          </th>        
                          <th >
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($diadiemdulich as $dd)
                          <tr>
                            <td class="font-weight-medium" >
                              {{ $dd -> MaDD}}
                            </td>
                            <td>
                            {{ $dd -> TenDD}}
                            </td>
                            <td>
                              <img src="upload/diadiem/{{ $dd -> HinhAnh}}" style="border-radius: 5px; width: 70px; height: 70px;">
                            </td>
                            <td>
                             {{ $dd -> tinh -> TenTinh}}
                            </td>
                            @foreach(App\tinh::where('MaTinh',  $dd -> MaTinh) -> get() as $t )
                            @foreach(App\quocgia::where('MaQG',  $t -> MaQG) -> get() as $qg )
                            <td>
                              
                              {{ $qg ->  TenQG}}
                             
                            </td>
                            
                                                        
                            <td>
                              <a class="editbtn btn btn-dark btn-fw" data-id='{{ $dd -> MaDD}}' data-ten='{{ $dd -> TenDD}}' data-tinh='{{ $dd -> MaTinh}}' data-tentinh='{{ $dd -> tinh -> TenTinh}}' data-idqg='{{ $qg -> MaQG}}' data-tenqg='{{ $qg -> TenQG}}'  style="color: white">
                          <i class="mdi mdi-cloud-download"></i>Edit</a>
                              <a class="deletebtn btn btn-danger btn-fw" data-id='{{ $dd -> MaDD}}' data-ten='{{ $dd -> TenDD}}'>
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                          @endforeach
                            @endforeach
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              {{--ADD--}}
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Địa Điểm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="forms-sample" action="employee/qlDD/themDD" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh</label>
                    <select class="form-control form-control-sm" id="idTinh" name="Tinh">
                      @foreach(App\tinh::all() as $t)
                      <option value="{{ $t -> MaTinh }}">{{ $t -> TenTinh }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputName1">Tên Địa Điểm</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Địa Điểm " name="Ten" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Hình Ảnh</label>
                      <input type="file" class="form-control" id="exampleInputCity1"  name='HinhAnh' required>
                    </div>
                             
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <button type="Reset" class="btn btn-light">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
{{--END ADD--}}

  {{--Edit--}}
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa Thông tin Địa Điểm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="forms-sample"  method="POST" id="editform" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh</label>
                    <select class="form-control form-control-sm" id="ftinh" name="tinhdd">
                      <option id='fmatinh'></option>
                      @foreach(App\tinh::all() as $t)
                      <option value="{{ $t -> MaTinh }}">{{ $t -> TenTinh }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputName1">Tên Địa Điểm</label>
                      <input type="text" class="form-control" id="ften" placeholder="Tên Địa Điểm " name="Tendd">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Hình Ảnh</label>
                      <input type="file" class="form-control" id="exampleInputCity1"  name='HinhAnh'>
                    </div>
                             
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <button type="Reset" class="btn btn-light">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
{{--END Edit--}}
{{--deleye--}}
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Thông tin Địa Điểm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="forms-sample"  method="POST" id="deleteform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    
                    Bạn muốn xóa thông tin Địa Điểm 
                    <h3 id="tendd"></h3>

                             
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">Delete</button>
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
{{--END Edit--}}


@endsection

@section('script')

<script type="text/javascript">
  $(document).ready( function () {
    $('#dstour').DataTable();
} );

  </script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#dstour').on('click', function(){
      $('.addbtn').on('click',function(){
        $('#MaQG').on('click',function(){
              
              var qg = $('#MaQG').val();

        $.get('employee/ajax/tinh/'+ qg  , function(data){
          $('#idTinh').html(data);
        
          });
        });
        $('#addModal').modal('show');
      });
  $('.editbtn').on('click',function(){
    
    
    
    $('#ften').val($(this).data("ten"));
    $('#fmatinh').val($(this).data("tinh"));
    
    var tentinh = $(this).data("tentinh");
    document.getElementById('fmatinh').innerHTML = tentinh ;

    $('#editform').attr('action','employee/qlDD/suaDD/'+ $(this).data("id"));
    $('#editModal').modal('show');
  });
  $('.deletebtn').on('click',function(){
    
    var ten = $(this).data("ten");
    document.getElementById('tendd').innerHTML = ten ;

    // $('#TenNV').val($(this).data("ten"));
    $('#deleteform').attr('action','employee/qlDD/xoaDD/'+ $(this).data("id"));
    $('#deleteModal').modal('show');
  });

});
 
});
</script>
@endsection