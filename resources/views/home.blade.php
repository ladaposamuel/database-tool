<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Database Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: #f9f9f9;
        }

        #wrapper {
            padding: 90px 15px;
        }

        .navbar-expand-lg .navbar-nav.side-nav {
            flex-direction: column;
        }

        .card {
            margin-bottom: 15px;
            border-radius: 0;
            box-shadow: 0 3px 5px rgba(0, 0, 0, .1);
        }

        .header-top {
            box-shadow: 0 3px 5px rgba(0, 0, 0, .1)
        }

        .leftmenutrigger {
            display: none
        }

        @media (min-width: 992px) {
            .leftmenutrigger {
                display: block;
                display: block;
                margin: 7px 20px 4px 0;
                cursor: pointer;
            }

            #wrapper {
                padding: 90px 15px 15px 15px;
            }

            .navbar-nav.side-nav.open {
                left: 0;
            }

            .navbar-nav.side-nav {
                background: #585f66;
                box-shadow: 2px 1px 2px rgba(0, 0, 0, .1);
                position: fixed;
                top: 56px;
                flex-direction: column !important;
                left: -220px;
                width: 200px;
                overflow-y: auto;
                bottom: 0;
                overflow-x: hidden;
                padding-bottom: 40px
            }
        }

        .animate {
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out
        }    </style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function () {
        };
        var defaultCSS = document.getElementById('bootstrap-css');

        function changeCSS(css) {
            if (css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }

        $(document).ready(function () {
            var iframe_height = parseInt($('html').height());
            window.parent.postMessage(iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>
<div id="wrapper" class="animate">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Search</h5>
                        <form action="{{route('search')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="search">Enter search term </label>
                                    <input type="text" class="form-control" name="term">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Select a category</label>
                                    <select name="term_p" id="" class="form-control">
                                        <option value="firstname">Firstname</option>
                                        <option value="lastname">Lastname</option>
                                        <option value="phone">phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <select name="state" id="" class="form-control">
                                        <option value="Ogun">Ogun</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lga">LGA</label>
                                    <select name="lga" id="" class="form-control">
                                        <option value="IFO">IFO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="network">Network</label>
                                    <select name="network" id="" class="form-control">
                                        <option value="MTN">MTN</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Import </h5>
                        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="upload">File</label>
                                <input type="file" name="excel_file" class="form-control">
                            </div>
                            <button class="btn btn-primary" type="submit">Upload</button>

                        </form>
                    </div>
                </div>
            </div>

            @if($data['results'] !== '')
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Search Results</h5>
                            <table id="myTable" class="table">
                                <thead>
                                <tr>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Network</th>
                                    <th scope="col">State</th>
                                    <th scope="col">LGA</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data['results'] as $res)
                                    <tr>
                                        <td>{{$res->firstname}}</td>
                                        <td>{{$res->lastname}}</td>
                                        <td>{{$res->phone}}</td>
                                        <td>{{$res->sex}}</td>
                                        <td>{{$res->network}}</td>
                                        <td>{{$res->state}}</td>
                                        <td>{{$res->lga}}</td>
                                    </tr>
                                @empty
                                    nothing found
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            @else
                <hr>
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        Search results will show here.
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</html>
