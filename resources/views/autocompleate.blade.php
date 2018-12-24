<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Ajax Autocompleate With Laravel</title>
  </head>
  <body>
    
    <div class="container box">
      <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
          <form>
            <div class="form-group">
              <h2>Laravel Autocompleate With Laravel</h2>
              <input type="text" autocomplete="off" class="form-control" id="country_name" name="country_name"  placeholder="Search Country">
              <div id="countrylist"></div>
            </div>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#country_name').keyup(function(event) {
          var country_name = $(this).val();
          if (country_name != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
              type : 'post',
              url : "{{ route('autocompleate.country_name') }}",
              data : {
                'country_name' : country_name,
                '_token' : _token,
              },
              success:function(response){
                $('#countrylist').fadeIn();
                $('#countrylist').html(response);
              }
            })
          }else{
            $('#countrylist').fadeOut();
          }
        });
      });

      $(document).on('click','#single_country',function(){
        var select_country = $(this).text();
        $('#country_name').val(select_country);
         $('#countrylist').fadeOut();
      });
    </script>
  </body>
</html>