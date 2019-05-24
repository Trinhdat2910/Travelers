@extends('employee.layout.index')

@section('contentNV')

<div class="card">
                <div class="card-body">
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >Danh Sách Đối Tác Dịch Vụ</h4>
                     <a href="employee/qlDoiTac/themDT"><button class="btn btn-success btn-block" style="width: 200px; float: right;" >Thêm Mới Đối Tác
                  <i class="mdi mdi-plus"></i>
                  </button></a>
                  </div>
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    <table class="table table-bordered" id="dsdt">
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr>
                          <th >
                            Loại Dịch Vụ
                          </th>
                          <th >
                            Tên Đối Tác(Mã Đối Tác)
                          </th>
                          <th>
                            Thông Tin
                          </th>
                                                                     
                          <th >
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($doitac as $dt)
                          <tr>
                            <td class="font-weight-medium" >
                              {{ $dt -> loaidoitac -> TenLoaiDT}}
                            </td>
                            <td>
                            {{ $dt -> TenDoiTac}}/({{ $dt -> MaDoiTac}})
                            </td>
                            <td width="100px">
                             <li>{{ $dt -> Email}}</li>
                             <li>{{ $dt -> Tel}}</li>
                             <li>{{ $dt -> DiaChi}}</li>
                             <li>{{ $dt -> tinh -> TenTinh}}</li>
                             <li>{{ $dt -> NganHang}}</li>
                             <li>{{ $dt -> STK}}</li>
                            </td>
                           
                                                        
                            <td>
                              <a class="btn btn-dark btn-fw"  href="employee/qlDoiTac/suaDT/{{$dt -> MaDoiTac}}">Edit</a>
                              <a class="btn btn-danger btn-fw" href="employee/qlDoiTac/xoaDT/{{$dt -> MaDoiTac}}">Delete</a>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

 
 


@endsection

@section('script')

<script type="text/javascript">
  $(document).ready( function () {
    $('#dsdt').DataTable();
} );

  </script>
@endsection