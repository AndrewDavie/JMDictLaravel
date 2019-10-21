<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>JMDict - @yield('title')</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="tab-searchtitle">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#searchtab">Search</a></li>
                    <li><a data-toggle="tab" href="#browsetab">Browse</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active show" id="searchtab">
                        <form method="GET" action="/skipSearch">
                            <div class="container">
                                <h3>Kanji Skip Search</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="skipcode" type="text" name="skipcode" placeholder="Skipcode"
                                               value="{{ old('skipcode') }}" size="5">

                                    </div>
                                    <div class="col-md-3">
                                        <select id="radical" name="radical" placeholder="Radical"
                                               value="{{ old('radical') }}" >

                                        </select>
                                        <!-- TODO : AJAX update the radical list as the skipcode is entered. -->
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit">></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method=""GET" action="kanjiSearch">
                            <div class="container">
                                <h3>Kanji Character Search</h3>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input id="kanjiChar" type="text" name="kanjiChar" placeholder="Char" size="1" value="{{ old('kanjiChar') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input id="kanjiMeaning" type="text" name="kanjiMeaning" placeholder="Meaning" size="5" value="{{ old('kanjiMeaning') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit">></button>
                                    </div>
                                </div>
                            </div>


                        </form>
                        <form method="GET" action="/wordSearch">
                            <div>
                                <h3>Word Search</h3>
                                <div>
                                    <input type="text" name="wordSearchBegins" placeholder="Begins"
                                           value="{{ old('wordSearchBegins') }}">
                                </div>
                                <div>
                                    <input type="text" name="wordSearchContains" placeholder="Contains"
                                           value="{{ old('wordSearchContains') }}">
                                </div>
                                <div>
                                    <input type="text" name="wordSearchEnds" placeholder="Ends"
                                           value="{{ old('wordSearchEnds') }}">
                                </div>
                                <div>
                                    <input type="text" name="wordSearchMeans" placeholder="Means"
                                           value="{{ old('wordSearchMeans') }}">
                                </div>
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="browsetab">
                        <h3>Browse content3</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"

        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script>
    //ASD161019 Initial load of radicals for the skip search dropdown.
    jQuery(document).ready(function(){
        updateRadicalDropdown();
    });
    function updateRadicalDropdown(){
        $.ajax({
            url:"/radicalSearch?skipcode="+$("#skipcode").val(),
            processData: false,
            dataType:"json",
            type: 'GET',
            cache: false,
            success: function (data, textStatus, jqXHR) {
                $.each(data,function(i,rad){
                    $("#radical").append('<option value="'+rad.character+'"'+
                        ((rad.character=='{{ old('radical')}}')?' selected':'')+  //remember old value and set it.
                        '>&#x'+rad.chinese+';</option>');
                });}
        });
    }
</script>
</body>
</html>

