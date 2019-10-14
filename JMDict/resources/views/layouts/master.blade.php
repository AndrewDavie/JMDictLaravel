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
                        <form method="GET" action="/wordSearch">
                            <div>
                                <h3>Word Search</h3>
                                <div>
                                    <input type="text" name="wordSearchBegins" placeholder="Begins">
                                </div>
                                <div>
                                    <input type="text" name="wordSearchContains" placeholder="Contains">
                                </div>
                                <div>
                                    <input type="test" name="wordSearchEnds" placeholder="Ends">
                                </div>
                                <div>
                                    <input type="text" name="wordSearchMeans" placeholder="Means">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>

