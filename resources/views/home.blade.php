<!DOCTYPE html>
<html>
    <head>
        <title>首页</title>
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
<?php
function getDomainById($id)
{
    $domain =  DB::table('domains')->where('id',$id)->first();
    if($domain){
        return $domain->domain;
    }
}
?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <style type="text/css">
        .row{
            width: 1000px;
        }
    </style>
    <body class="bootstrap-admin-with-small-navbar">
    @include('top')

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- left, vertical navbar -->
                @include('left')
                <?php
                    $lingchen = date('Y-m-d',strtotime(date('Y-m-d',time())));
                    $day = Request::input('selectDate',$lingchen);
                    $start = $day.' 00:00:00';
                    $end = $day.' 23:59:59';
                ?>
                <!-- content -->
                <div class="col-md-10">

                    <div class="row bootstrap-admin-no-edges-padding">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">排名信息</div>
                                    <div style="float:right;">
                                        <a class=" btn btn-success" style="margin-top:-8px;" href="/runAuto.php" id="shoudong">手动采集</a>
                                    </div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <form action="" method="get">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            选择要查看的日期：
                                            <input type="text" name="selectDate" id="selectDate" data-date="" data-date-format="yyyy-mm-dd" value="{{$day}}"  placeholder="选择日期" >
                                            <input type="submit" value="提交">
                                        </div>
                                    </form>
                                </div>
                                    <?php
                                        $country = DB::table('domain_infos')->where('created_at','>=',$start)->where('created_at','<=',$end)->orderBy('rank_global','desc')->get();
                                    ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10%">域名</th>
                                                <th width="8%">全球排名</th>
                                                <th width="8%">跳出率</th>
                                                <th width="12%">访问者每日浏览次数</th>
                                                <th width="10%">停留时间</th>
                                                <th width="42%">地区排名</th>
                                                <th width="10%">趋势图</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($country as $val)
                                            <tr>
                                                <td>{{ getDomainById($val->domain_id) }}</td>
                                                <td>{{ $val->rank_global }}</td>
                                                <td>{{ $val->tiaochulv }}</td>
                                                <td>{{ $val->liulanliang }}</td>
                                                <td>{{ $val->chixushijian }}</td>
                                                <td>{!! $val->rank_country_all !!}</td>
                                                <td><img src="{{ $val->rank_pic }}" width="200px;"></td>
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
        <script src="/framework/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(function() {
                // Easy pie charts
                $('.easyPieChart').easyPieChart({animate: 1000});
            });
        </script>
        <script type="text/javascript">
       window.onload = function(){ 

        $('#selectDate').datepicker({
            format: 'yyyy-mm-dd'
        });
    };
        $('#shoudong').click(function(){
            $('#shoudong').html('采集中，请稍等..');
            $('#shoudong').attr("disabled", true); 
        });
    </script>
    </body>
</html>