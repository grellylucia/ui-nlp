<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KLASIFIKASI ARTIKEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm mb-5 navbar-dark fixed-top">
    <a class="navbar-brand" href="#">Pengolan Bahasa Alami - Kelompok C</a>
    </nav>

    <div class="container pt-5">
        <div class="mt-5">
            
            
            <h2>Klasifikasi Artikel</h2>
            
            <h4>Klasifikasi kategori artikel berbahasa Indonesia berdasarkan judul artikel</h4>
            

            <form id="input_artikel" action="{{url('submit_text.store')}}">
                <meta name="csfr-token" content="{{ csrf_token() }}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="wrap">
                        <div class="form-group">
                            <input type="text" class="input-artikel" name="textArticle" id="text_article"  placeholder="Masukan judul artikel"></textarea>
                        </div>
                        <input class="form-group" type="hidden" name="categoryPredict" id="category_predict" />
                        <button type="button" class="btn btn-primary" id="submit_text">Submit</button>
                    </div>
                    
            </form>

        </div>
        <br>
        <br>
        <br>
        <div class="mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kategori Artikel : <label class="result" for="testResult" id="predictResult"></label> </th>
                    </tr>
                </thead>
            </table>
        </div>       
    </div>
    
</body>

 <script src="https://code.jquery.com/jquery-1.8.0.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit_text').click(function(){
                    $('#predictResult').empty();
                    var text=$('#text_article').val();
                    
                    $.ajax({
                    type: "POST",
                    url:"https://sgd-classifier.herokuapp.com/input/task",
                    data:'{"textArtikel":"'+text+'"}',
                    contentType: 'application/json; charset=utf-8',
                    dataType: "json",
                    success:function(data){
                        console.log(data);
                        var dataTemp=data['message'];
                        $('#predictResult').append(dataTemp);
                        $('#category_predict').val(dataTemp);
                    }
                });
            });
        });
 </script>


<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700|Roboto:400,700|Roboto+Condensed');
h2{
    font-family: 'Raleway', sans-serif;
    font-size: 400%;
    color:#FFFFFF;
    word-wrap: break-word;
     -webkit-hyphens: auto;
     -moz-hyphens: auto;
     -ms-hyphens: auto;
     -o-hyphens: auto;
     hyphens: auto;
     margin-left: 26%;
     margin-top: 10%;
}

h4{
    font-family: 'Roboto', sans-serif;
    font-size: 125%;
    color:#FFFFFF;
    word-wrap: break-word;
     -webkit-hyphens: auto;
     -moz-hyphens: auto;
     -ms-hyphens: auto;
     -o-hyphens: auto;
     hyphens: auto;
     margin-left:20%;
     margin-bottom: 5%;
}
body{
    background: url('nikita-kachanovsky-445394-unsplash.jpg') no-repeat center center fixed;
    background-size: cover;
}

.input-artikel{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    float: left;
    outline: none;
}

.row-heading{
    margin-left: 27%;
    margin-top: 10%;
}

.row-subheader{
    margin-left:20%;
    margin-bottom: 5%;
}

.result{
    color:#FFFFFF;
}

.btn-primary {
    font-size: 16px;
    border: none;
    display: inline-block;
    margin-right: 3px;
    width: 100px;
    height: 45px;
}

th{
    color:#FFFFFF;
    font-size: 30px;
    font-family: 'Roboto Condensed', sans-serif;
}
.predict-view{
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
.form-group{
    width: 100%;
    position: relative
}

.btn{
    position: absolute;
    right: 0%;
    bottom: 15%;
    
}
.wrap{
  width: 80%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
@media screen and (max-width:800px) {
  h2{
    font-size:300%;
  }
  h4{
    font-size:90%;
  }
}

</style>

</html>