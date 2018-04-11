<!DOCTYPE html>
<html>
    <head>
        <title>域名管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

        <!-- Bootstrap Admin Theme -->
        <link href="css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">

        <!-- Vendors -->
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart_custom.css" rel="stylesheet" media="screen">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="/js/html5shiv.js"></script>
           <script type="text/javascript" src="/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-with-small-navbar">
    @include('top')

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
                @include('left')

                <!-- content -->
                <div class="col-md-10">

                    <div class="row bootstrap-admin-no-edges-padding">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">域名</div>
                                    <div style="float:right;margin-right:15px">
                                        <a href="/domain/create" class="">新建域名</a>
                                    </div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>域名</th>
                                                <th>创建时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($domain as $val)
                                            <tr>
                                                <td>{{$val->id}}</td>
                                                <td>{{$val->domain}}</td>
                                                <td>{{$val->created_at}}</td>
                                                <td>
                                                    <div style="float:left;margin-right:15px">
                                                        <form action="/domain/{{ $val->id }}" method="post">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <input type="submit" name="del" class="btn btn-danger" value="删除" onclick="return confirm('Make sure?');" />
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <hr>
                <footer role="contentinfo">
                    <p>&copy; 2018 onemena</p>
                </footer>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>

        <script type="text/javascript">
            $(function() {
                // Easy pie charts
                $('.easyPieChart').easyPieChart({animate: 1000});
            });
        </script>
    </body>
</html>