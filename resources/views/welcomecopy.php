<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies using jQuery</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-4.5.0/bootstrap.min.css') }}">
</head>
<body>
    <div class="wrapper container">
       <h2>Welcome Page</h2>
       <button class="getlist btn btn-warning">Get Movie Lists</button>
       <div id="list">
            <ul class="title">
            </ul>
       </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-4.5.0/bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/style.js') }}"></script> -->

    <script>
        $(document).ready(function(){
            var res = "";
            var title = $('.title').html();
                $.get("/api/movies", function(results, status){
                    res = JSON.stringify(results);
                    var obj = JSON.parse(res);
                    // obj.map(function(item){
                    //     for(var key in item){
                    //         console.log(item);
                    //         console.log(key);
                    //         $('.title').html(item.title + item[key]);
                    //     }
                    // }).join(" ");

                    $.each(obj, function(kay, item){
                        $('.title').append("<li>"+ item.title +"</li>");
                    });

                    // for(var i = 0; i < obj.length; i++){
                    //     $('.title').append("<li>" + obj[0].title + "</li>");
                    // }
    
            });




        });
    </script>

</body>
</html>