@extends('admin.layout.index')

@section('content')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm Dịch Vụ Cho Tour</h4>
                  <p class="card-description">
                    {{ $chitiettour -> MaCTTour}}
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
                  <form class="forms-sample" action="admin/qlTour/themDVTour" method="POST">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="hidden" name="macttour" value="{{ $chitiettour-> MaCTTour}}">
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Loại Dịch Vụ</label>
                    <select class="form-control form-control-sm" id="idDV" name="LoaiDV">
                     @foreach(App\loaidoitac::all() as $dt)
                            	<option value="{{ $dt -> MaLoaiDT}}">{{ $dt -> TenLoaiDT}}</option>	
                            	
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Địa Điểm</label>
                    <select class="form-control form-control-sm" id="idTinh" name="tinh">
                     @foreach(App\tinh::all() as $dt)
                            	<option value="{{ $dt -> MaTinh}}">{{ $dt -> TenTinh}}</option>	
                            	
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tên Đối Tác</label>
                    <select class="form-control form-control-sm" id="doitac" name="doitac">
                     @foreach(App\doitac::all() as $dt)
                            	<option value="{{ $dt -> MaDoiTac}}">{{ $dt -> TenDoiTac}}</option>	
                            	
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tên Dịch Vụ</label>
                    <select class="form-control form-control-sm" id="tendichvu" name="tendichvu">
                     
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail3">Ngày Check In</label>
                      <input type="date" class="form-control" id="dateCI" name="NgayCI">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Ngày Check Out</label>
                      <input type="date" class="form-control" id="dateCO" name="NgayCO">
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">Số Lượng</label>
                      <input type="number" class="form-control" id="SL" placeholder="Số lượng" name='SL'>
                    </div>
 
                    <div class="form-group" >
                      <label for="exampleInputCity1">Đơn Giá</label>
                      <input type="text" class="form-control" id="dongia" name="Gia">
                    </div>
                    <div class="form-group" >
                      <label for="exampleInputCity1">Thành tiền</label>
                      <input type="text" class="form-control" id="thanhtien" name="thanhtien" readonly>
                    </div>

                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button type="Reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
@endsection

@section('script')
	<script >
		$(document).ready(function(){
      
			 $('#idDV').on('click',function(){
        //   $.get('admin/ajax/doitac1/' + dv, function(data){
        //   $('#doitac').html(data);
        // }
				  $('#idTinh').on('click',function(){
							var dv=$('#idDV').val();
              var tinh = $('#idTinh').val();

				$.get('admin/ajax/doitac/'+ tinh  + dv, function(data){
					$('#doitac').html(data);
        
					
				});
			});
				
			});
       $('#idTinh').on('click',function(){
        //   $.get('admin/ajax/doitac1/' + dv, function(data){
        //   $('#doitac').html(data);
        // }
          $('#idDV').on('click',function(){
              var dv=$('#idDV').val();
      var tinh = $('#idTinh').val();

        $.get('admin/ajax/doitac/'+ tinh  + dv, function(data){
          $('#doitac').html(data);
        
          
        });
      });
        
      });
      
      // $('#doitac').on('click',function(){
      //   var dt=$('#doitac').val();
      //   $.get('admin/ajax/tendichvu/'+ dt, function(data){
      //     $('#tendichvu').html(data);
      // });
		});

	</script>
  <script >
    $(document).ready(function(){

      $('#doitac').on('click',function(){
        var dt=$('#doitac').val();
        $.get('admin/ajax/tendichvu/'+ dt, function(data){
          $('#tendichvu').html(data);
      });
    });
    });
  </script>
  <script >
    $(document).ready(function(){

      $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
      });
    });
      $('#SL').on('input',function(){
        $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);  
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
      });
      });
    // end1
    $('#SL').on('input',function(){
        $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
           $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);      
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        });
        });
        }
      });
      });

    // end11
   

    $('#SL').on('input',function(){
        $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          var date=1;
          var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
        else{
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
              
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
      });
      });
    // end3
    $('#SL').on('input',function(){
        $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
          var date=1;
          var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
        }
        else{
          $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
              
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
        }
      });
      });
    // end4
   
      $('#SL').on('input',function(){
        $('#dongia').on('input',function(){
          $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          var date=1;
          var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
        else{
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
              
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
      });
        
      });
      });
      // end5
      $('#SL').on('input',function(){
        $('#dongia').on('input',function(){
          $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
        
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);

      }
      });
        
      });
      });
      // end6
      $('#SL').on('input',function(){
        $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
        $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
        
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);

      }
      });
      });
      });
      });
      // end7
      $('#SL').on('input',function(){
        $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
        $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          var date=1;
          var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
        else{
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
              
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
      });
      });
      });
      });
      // end8
      $('#dongia').on('input',function(){
        $('#SL').on('input',function(){
        $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          var date=1;
          var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
        else{
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
              
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
        }
      });
      });
      });
      // end9


        $('#SL').on('input',function(){
        $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          $('#dongia').on('input',function(){
          var date=1;
          var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
        }
        else{
          $('#dongia').on('input',function(){
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
              
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
        }
      });
      });
      
      // end9
      $('#dongia').on('input',function(){

        $('#SL').on('input',function(){
        $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{

        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
        
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);

      }
      });
      });
      });
      // end10


        $('#SL').on('input',function(){
        $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
          $('#dongia').on('input',function(){
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
        
        var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      }
      });
      });
    
      // end10
      $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
          $('#SL').on('input',function(){
            $('#dongia').on('input',function(){
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
      }
      });
      // end14
      $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
          $('#dongia').on('input',function(){
          $('#SL').on('input',function(){
            
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
      }
      });
      // end16
      $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
          $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
          $('#SL').on('input',function(){
            
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
         });
      });
      });
      }
      });
      // end16
      $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
          $('#SL').on('input',function(){
          $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
          
            
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
         });
      });
      });
      }
      });
      // end16

      $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          $('#SL').on('input',function(){
            $('#dongia').on('input',function(){
                var date= 1;
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
        }
        else{
          $('#SL').on('input',function(){
            $('#dongia').on('input',function(){
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
        
      }

      });
 
    // end15
    $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          $('#SL').on('input',function(){
            $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
                var date= 1;
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
      });
    
        }
        else{
          $('#SL').on('input',function(){
            $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
      });
        
      }

      });
   
    // end15
    $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          
            $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
          $('#SL').on('input',function(){
                var date= 1;
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
      });
    
        }
        else{
          
            $('#tendichvu').change(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
          $('#SL').on('input',function(){
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      });
      });
      });
        
      }

      });
   
    // end15
    $('#dateCI').on('change', function(){
        if ($('#dateCO').val()=="") {
          
            
          $('#SL').on('input',function(){
                var date= 1;
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      
      });
    
        }
        else{
          
            
          $('#SL').on('input',function(){
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
      
      });
        
      }

      });
   
    // end15
    $('#dateCO').on('change', function(){
        if ($('#dateCI').val()=="") {
          alert('Bạn chưa chọn ngày check in');
        }
        else{
          $('#SL').on('input',function(){
          
            
        var ci = new Date($('#dateCI').val());
        var co = new Date($('#dateCO').val());

        var date= (co.getTime() - ci.getTime())/ (1000*60*60*24);
         var sl=$('#SL').val();
        var gia=$('#dongia').val();
        var tt=sl*gia*date;
        $('#thanhtien').val(tt);
         
      });
      }
      });
      // end16
 });
    
  </script>
@endsection