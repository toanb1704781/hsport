
    <div class="container">
        <h1>Laravel 7 Ajax Request example</h1>
  
        <form >
  
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
   
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
   
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
  
        </form>
        <select name="" id="select1">
            <option value="1">mot</option>
            <option value="2">hai</option>
            <option value="3">ba</option>
        </select>
        <div id="test"> dsafasdfsdf</div>
    </div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var name = $("input[name=name]").val();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('test.post') }}",
           data:{names:name, password:password, email:email},
           success:function(data){
              alert(data.success);
           }
        });
  
	});
    $("#select1").change(function(e){
  
        e.preventDefault();
   
        var month = $('#select1').val();
        
        $.ajax({
           type:'POST',
           url:"{{ route('test.post') }}",
           data:{month:month},
           success:function(data){
              alert(data.success);
           }
        });
  
	});
</script>
