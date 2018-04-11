<!DOCTYPE html>
<html>
    <head>
        <title>域名管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

        <!-- Bootstrap Admin Theme -->
        <link href="/css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">

        <!-- Vendors -->
        <link href="/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="/vendors/easypiechart/jquery.easy-pie-chart_custom.css" rel="stylesheet" media="screen">

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
                    <div class="row">
                        <div class="panel panel-default bootstrap-admin-no-table-panel">
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">域名</div>
                            </div>
                            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                                <form class="form-horizontal" action="/domain" method="post">
                                    {{ csrf_field() }}
                                    <fieldset>
                                        <legend>创建域名</legend>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="focusedInput">域名</label>
                                            <div class="col-lg-4">
                                                <input class="form-control" id="focusedInput" type="text" name="domain" value="">
                                                请勿填写http:// 或 https://
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">保存</button>
                                        <button type="reset" class="btn btn-default" onclick="history.go(-1);">取消</button>
                                    </fieldset>
                                </form>
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
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="/vendors/easypiechart/jquery.easy-pie-chart.js"></script>

        <script type="text/javascript">
            $(function() {
                // Easy pie charts
                $('.easyPieChart').easyPieChart({animate: 1000});
            });
        </script>
    </body>
</html>