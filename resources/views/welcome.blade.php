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
            <a href="javascript:void(0)" class="close">Close</a>
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
                // console.log(obj);
                $.each(obj, function(key, item){
                    $("table").append("<tr><td><a id='movie_id' data-key='"+item.id+"' href='javascript:void(0)' class='item_title'>"+ item.title +"</a></td><td>"+ item.vote +"</td><td>"+ item.user_id +"</td><td>"+ item.release_at +"</td></tr>");
                });

                $('.item_title').one('click',function(e){

                    var movieId = $("#movie_id").data('key');

                    $(".list-by-id").show();

                    $.get("/api/movies/"+ movieId, function(data, status){
                        var eachData = JSON.stringify(data);
                        var v = JSON.parse(eachData);

                        $(".list-by-id").html("<li class='list-group-item active'>"+v.title+"</li><li class='list-group-item'>"+v.overview+"</li><li class='list-group-item'>"+v.user_id+"</li><li class='list-group-item'>"+v.vote+"</li><li class='list-group-item'>"+v.release_at+"</li>");

                        $(".close").click(function(){
                            $(".list-by-id").hide();
                        });

                    });

                    e.preventDefault();

                });

            });
            
        });
    </script>

</body>
</html>