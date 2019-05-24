@extends('admin.layout.index')

@section('content')

<div class="card">
                <div class="card-body">
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >DANH SÁCH TOUR MẪU</h4>
                    <a href="admin/qlTour/themTour"><button class=" btn btn-success btn-block" style="width: 200px; float: right;" >Tạo tour mới
                  <i class="mdi mdi-plus"></i>
                  </button></a>
                  </div>
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    <table class="table table-striped" id="dstour" >
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr>
                          <th >
                            Khu Vực
                          </th>
                          <th >
                            Tên Tour/(Mã Tour)
                          </th>
                          <th>
                            Điểm khởi hành
                          </th> 
                                                 
                          <th>
                            Số Ngày
                          </th>                         
                          <th>
                            Giá 
                          </th>
                          <th >
                            Tình Trạng
                          </th>
                          <th >
                            Nổi Bật
                          </th>
                          <th >
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tour as $t)
                          <tr>
                            <td class="font-weight-medium" >
                              {{ $t ->  khuvuc-> TenKV }}<br>
                              {{ $t -> HinhThucDL-> TenHinhThuc}}
                            </td>
                            <td >
                             
                            <a href="admin/qlTour/danhsachcttour/{{$t -> MaTour}}" >
                              <?php echo $t -> TenTour ?> <br> ({{ $t -> MaTour}})<br>
                            </a>
                            <img src="upload/tour/{{ $t -> HinhAnh}}" style="border-radius: 0; width: 70px; height: 70px;">
                            
                            </td>

                            
                            <td > 
                              {{ $t -> DiemKhoiHanh}}
                            </td>
                            
                            <td>
                              {{ $t -> SoNgay}}
                            </td>
                            
                            <td>
                              NL: {{ number_format($t -> Gia)}}</br>
                              TE: {{ number_format($t -> GiaTE)}}</br>
                              EB: {{ number_format($t -> GiaEB)}}
                            </td>
                            <td>
                              @if( $t -> TinhTrang == 0)
                              <a class="showtt btn btn-rounded btn-outline-primary" data-id="{{ $t -> MaTour }}" data-ten="{{ $t -> TenTour }}">Mở</a>
                              @else
                              <a class="hidett btn btn-rounded btn-outline-warning" data-id="{{ $t -> MaTour }}" data-ten="{{ $t -> TenTour }}">Đóng</a>
                              @endif
                              
                            </td>
                            <td>
                              @if( $t -> NoiBat == 0)
                              <a class="shownoibat btn btn-rounded btn-outline-primary" data-id="{{ $t -> MaTour }}" data-ten="{{ $t -> TenTour }}">Bật</a>
                              @else
                              <a class="hidenoibat btn btn-rounded btn-outline-warning" data-id="{{ $t -> MaTour }}" data-ten="{{ $t -> TenTour }}">Ẩn</a>
                              @endif
                              
                            </td>
                            <td>
                              <a href="admin/qlTour/danhsachcttour/{{$t -> MaTour}}" ><button type="button" class=" btn-primary btn-fw" style="width: 80px; margin-bottom: 5px;" >Detail</button></a>
                              <br>
                              <a href="admin/qlTour/suaTour/{{$t -> MaTour}}"><button type="button" class="btn-dark btn-fw" style="width: 80px; margin-bottom: 5px;"  >
                          <i class="mdi mdi-cloud-download"></i>Edit</button></a>
                            <br>
                              <a href="admin/qlTour/xoaTour/{{$t -> MaTour}}"><button type="button" class=" btn-danger btn-fw" style="width: 80px; margin-bottom: 5px;" >
                          <i class="mdi mdi-alert-outline"></i>Delete</button></a>
                          
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<!-- Button trigger modal -->
<div class="modal fade" id="showNoiBatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hiển Thị Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="showNoiBatform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                                        
                    <h3 id="tentour1"></h3>
                       
      </div>
     <div class="modal-footer">
        <button type="submit"  class="btn btn-success mr-2">Hiển Thị</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="hideNoiBatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ẩn Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="hideNoiBatform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                                        
                    <h3 id="tentour2"></h3>
                       
      </div>
     <div class="modal-footer">
        <button type="submit"  class="btn btn-success mr-2">Ẩn</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="showttModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mở Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="showttform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                                        
                    <h3 id="tentour3"></h3>
                       
      </div>
     <div class="modal-footer">
        <button type="submit"  class="btn btn-success mr-2">Mở</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="hidettModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đóng Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="hidettform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                                        
                    <h3 id="tentour4"></h3>
                       
      </div>
     <div class="modal-footer">
        <button type="submit"  class="btn btn-success mr-2">Đóng</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>


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
        $('.shownoibat').on('click', function(){
          $('#showNoiBatModal').modal('show');
            var ten = $(this).data("ten")
            document.getElementById('tentour1').innerHTML = ten ;
            $('#showNoiBatform').attr('action','admin/qlTour/shownoibat/'+ $(this).data("id"));
        });
        $('.hidenoibat').on('click', function(){
          $('#hideNoiBatModal').modal('show');
            var ten = $(this).data("ten")
            document.getElementById('tentour2').innerHTML = ten ;
            $('#hideNoiBatform').attr('action','admin/qlTour/hidenoibat/'+ $(this).data("id"));
        });
        $('.hidett').on('click', function(){
          $('#hidettModal').modal('show');
            var ten = $(this).data("ten")
            document.getElementById('tentour4').innerHTML = ten ;
            $('#hidettform').attr('action','admin/qlTour/hidett/'+ $(this).data("id"));
        });
        $('.showtt').on('click', function(){
          $('#showttModal').modal('show');
            var ten = $(this).data("ten")
            document.getElementById('tentour3').innerHTML = ten ;
            $('#showttform').attr('action','admin/qlTour/showtt/'+ $(this).data("id"));
        });

    });
  });

      </script>
@endsection