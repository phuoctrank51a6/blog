<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Autocomplete Search Using Typeahead JS - Tutsmake.com</title>


</head>
<body>
    <div class="container">


        <h1>Laravel 5 Autocomplete using Bootstrap Typeahead JS</h1>
        <input class="typeahead form-control" style="margin:0px auto;width:300px;" type="text">


    </div>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>

</body>
</html>
