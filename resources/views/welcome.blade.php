<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies using jQuery</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-4.5.0/bootstrap.min.css') }}">
    <style rel="stylesheet">
        .item_title{text-decoration: underline;}
        .list-by-id,.close{ display:none; }
        .popular{ color: orange !important; }
    </style>
</head>
<body>
    <div class="wrapper container">
       
       <!-- <button class="getlist btn btn-warning">Get Movie Lists</button> -->
       <div id="list">
            <h2>All Movies</h2>
            <table class="table table-striped">
                <thead>
                    <th scope="col">Title</th>
                    <th scope="col">Vote Average</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Release Date</th>
                </thead>
                <tbody></tbody>
            </table>

            <ul class="list-group list-by-id">
                <li class="list-group-item"><a href="javascript:void(0)" class="close">Close</a></li>
            </ul>  
       </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-4.5.0/bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/style.js') }}"></script> -->

    <script>
        $(function(){

            $.get("/api/movies", function(results, status){
                var res = JSON.stringify(results);
                var obj = JSON.parse(res);
                $.each(obj, function(key, item){
                    var popular = "";
                    $("table").append("<tr><td><a id='movie_id' data-key='"+item.id+"' href='javascript:void(0)' class='item_title'>"+ item.title +"</a></td><td>"+ item.vote +"</td><td>"+ item.user.firstname +"</td><td>"+ item.release_at +"</td></tr>");
                    if(item.vote === 5) { 
                        $('a').addClass("popular");
                    } 
                });

                $('.item_title').click(function(){
                    var movieId = $(this).data('key');
                    $.get("/api/movies/"+ movieId, function(data, status){
                        var eachData = JSON.stringify(data);
                        var v = JSON.parse(eachData);
                        $(".list-by-id").html("<li class='list-group-item active'>"+v.title+"</li><li class='list-group-item'>"+v.overview+"</li><li class='list-group-item'>"+v.user.firstname+"</li><li class='list-group-item'>"+v.vote+"</li><li class='list-group-item'>"+v.release_at+"</li>");
                        if(v.vote === 5) { 
                            $('.active').addClass("popular");
                        } 
                    });
                    $(".list-by-id,.close").show();
                    $(".close").click(function(){
                        $(".list-by-id").hide();
                    });
                });

            });
            
        });
    </script>

</body>
</html>