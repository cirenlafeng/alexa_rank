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
        return $domain;
    }
}
function CountryEnToCh($content)
{
    $json = '{"Afghanistan":"\u963f\u5bcc\u6c57","Aland Islands":"\u5965\u5170\u7fa4\u5c9b","Albania":"\u963f\u5c14\u5df4\u5c3c\u4e9a","Algeria":"\u963f\u5c14\u53ca\u5229\u4e9a","American Samoa":"\u7f8e\u5c5e\u8428\u6469\u4e9a","Andorra":"\u5b89\u9053\u5c14","Angola":"\u5b89\u54e5\u62c9","Anguilla":"\u5b89\u572d\u62c9","Antigua and Barbuda":"\u5b89\u63d0\u74dc\u548c\u5df4\u5e03\u8fbe","Argentina":"\u963f\u6839\u5ef7","Armenia":"\u4e9a\u7f8e\u5c3c\u4e9a","Aruba":"\u963f\u9c81\u5df4","Australia":"\u6fb3\u5927\u5229\u4e9a","Austria":"\u5965\u5730\u5229","Azerbaijan":"\u963f\u585e\u62dc\u7586","Bangladesh":"\u5b5f\u52a0\u62c9","Bahrain":"\u5df4\u6797","Bahamas":"\u5df4\u54c8\u9a6c","Barbados":"\u5df4\u5df4\u591a\u65af","Belarus":"\u767d\u4fc4\u7f57\u65af","Belgium":"\u6bd4\u5229\u65f6","Belize":"\u4f2f\u5229\u5179","Benin":"\u8d1d\u5b81","Bermuda":"\u767e\u6155\u5927","Bhutan":"\u4e0d\u4e39","Bolivia":"\u73bb\u5229\u7ef4\u4e9a","Bosnia and Herzegovina":"\u6ce2\u65af\u5c3c\u4e9a\u548c\u9ed1\u585e\u54e5\u7ef4\u90a3","Botswana":"\u535a\u8328\u74e6\u7eb3","Bouvet Island":"\u5e03\u7ef4\u5c9b","Brazil":"\u5df4\u897f","Brunei":"\u6587\u83b1","Bulgaria":"\u4fdd\u52a0\u5229\u4e9a","Burkina Faso":"\u5e03\u57fa\u7eb3\u6cd5\u7d22","Burundi":"\u5e03\u9686\u8fea","Cambodia":"\u67ec\u57d4\u5be8","Cameroon":"\u5580\u9ea6\u9686","Canada":"\u52a0\u62ff\u5927","Cape Verde":"\u4f5b\u5f97\u89d2","Central African Republic":"\u4e2d\u975e","Chad":"\u4e4d\u5f97","Chile":"\u667a\u5229","Christmas Islands":"\u5723\u8bde\u5c9b","Cocos (keeling) Islands":"\u79d1\u79d1\u65af\uff08\u57fa\u6797\uff09\u7fa4\u5c9b","Colombia":"\u54e5\u4f26\u6bd4\u4e9a","Comoros":"\u79d1\u6469\u7f57","Congo (Congo-Kinshasa)":"\u521a\u679c\uff08\u91d1\uff09","Congo":"\u521a\u679c","Cook Islands":"\u5e93\u514b\u7fa4\u5c9b","Costa Rica":"\u54e5\u65af\u8fbe\u9ece\u52a0","Cote D\u2018Ivoire":"\u79d1\u7279\u8fea\u74e6","China":"\u4e2d\u56fd","Croatia":"\u514b\u7f57\u5730\u4e9a","Cuba":"\u53e4\u5df4","Czech":"\u6377\u514b","Cyprus":"\u585e\u6d66\u8def\u65af","Denmark":"\u4e39\u9ea6","Djibouti":"\u5409\u5e03\u63d0","Dominica":"\u591a\u7c73\u5c3c\u52a0","Ecuador":"\u5384\u74dc\u591a\u5c14","Egypt":"\u57c3\u53ca","Equatorial Guinea":"\u8d64\u9053\u51e0\u5185\u4e9a","Eritrea":"\u5384\u7acb\u7279\u91cc\u4e9a","Estonia":"\u7231\u6c99\u5c3c\u4e9a","Ethiopia":"\u57c3\u585e\u4fc4\u6bd4\u4e9a","Faroe Islands":"\u6cd5\u7f57\u7fa4\u5c9b","Fiji":"\u6590\u6d4e","Finland":"\u82ac\u5170","France":"\u6cd5\u56fd","MetropolitanFrance":"\u6cd5\u56fd\u5927\u90fd\u4f1a","French Guiana":"\u6cd5\u5c5e\u572d\u4e9a\u90a3","French Polynesia":"\u6cd5\u5c5e\u6ce2\u5229\u5c3c\u897f\u4e9a","Gabon":"\u52a0\u84ec","Gambia":"\u5188\u6bd4\u4e9a","Georgia":"\u683c\u9c81\u5409\u4e9a","Germany":"\u5fb7\u56fd","Ghana":"\u52a0\u7eb3","Gibraltar":"\u76f4\u5e03\u7f57\u9640","Greece":"\u5e0c\u814a","Grenada":"\u683c\u6797\u7eb3\u8fbe","Guadeloupe":"\u74dc\u5fb7\u7f57\u666e\u5c9b","Guam":"\u5173\u5c9b","Guatemala":"\u5371\u5730\u9a6c\u62c9","Guernsey":"\u6839\u897f\u5c9b","Guinea-Bissau":"\u51e0\u5185\u4e9a\u6bd4\u7ecd","Guinea":"\u51e0\u5185\u4e9a","Guyana":"\u572d\u4e9a\u90a3","Haiti":"\u6d77\u5730","Honduras":"\u6d2a\u90fd\u62c9\u65af","Hungary":"\u5308\u7259\u5229","Iceland":"\u51b0\u5c9b","India":"\u5370\u5ea6","Indonesia":"\u5370\u5ea6\u5c3c\u897f\u4e9a","Iran":"\u4f0a\u6717","Iraq":"\u4f0a\u62c9\u514b","Ireland":"\u7231\u5c14\u5170","Isle of Man":"\u9a6c\u6069\u5c9b","Israel":"\u4ee5\u8272\u5217","Italy":"\u610f\u5927\u5229","Jamaica":"\u7259\u4e70\u52a0","Japan":"\u65e5\u672c","Jersey":"\u6cfd\u897f\u5c9b","Jordan":"\u7ea6\u65e6","Kazakhstan":"\u54c8\u8428\u514b\u65af\u5766","Kenya":"\u80af\u5c3c\u4e9a","Kiribati":"\u57fa\u91cc\u5df4\u65af","Korea (South)":"\u97e9\u56fd","Korea (North)":"\u671d\u9c9c","Kuwait":"\u79d1\u5a01\u7279","Kyrgyzstan":"\u5409\u5c14\u5409\u65af\u65af\u5766","Laos":"\u8001\u631d","Latvia":"\u62c9\u8131\u7ef4\u4e9a","Lebanon":"\u9ece\u5df4\u5ae9","Lesotho":"\u83b1\u7d22\u6258","Liberia":"\u5229\u6bd4\u91cc\u4e9a","Libya":"\u5229\u6bd4\u4e9a","Liechtenstein":"\u5217\u652f\u6566\u58eb\u767b","Lithuania":"\u7acb\u9676\u5b9b","Luxembourg":"\u5362\u68ee\u5821","Macedonia":"\u9a6c\u5176\u987f","Malawi":"\u9a6c\u62c9\u7ef4","Malaysia":"\u9a6c\u6765\u897f\u4e9a","Madagascar":"\u9a6c\u8fbe\u52a0\u65af\u52a0","Maldives":"\u9a6c\u5c14\u4ee3\u592b","Mali":"\u9a6c\u91cc","Malta":"\u9a6c\u8033\u4ed6","Marshall Islands":"\u9a6c\u7ecd\u5c14\u7fa4\u5c9b","Martinique":"\u9a6c\u63d0\u5c3c\u514b\u5c9b","Mauritania":"\u6bdb\u91cc\u5854\u5c3c\u4e9a","Mauritius":"\u6bdb\u91cc\u6c42\u65af","Mayotte":"\u9a6c\u7ea6\u7279","Mexico":"\u58a8\u897f\u54e5","Micronesia":"\u5bc6\u514b\u7f57\u5c3c\u897f\u4e9a","Moldova":"\u6469\u5c14\u591a\u74e6","Monaco":"\u6469\u7eb3\u54e5","Mongolia":"\u8499\u53e4","Montenegro":"\u9ed1\u5c71","Montserrat":"\u8499\u7279\u585e\u62c9\u7279","Morocco":"\u6469\u6d1b\u54e5","Mozambique":"\u83ab\u6851\u6bd4\u514b","Myanmar":"\u7f05\u7538","Namibia":"\u7eb3\u7c73\u6bd4\u4e9a","Nauru":"\u7459\u9c81","Nepal":"\u5c3c\u6cca\u5c14","Netherlands":"\u8377\u5170","New Caledonia":"\u65b0\u5580\u91cc\u591a\u5c3c\u4e9a","New Zealand":"\u65b0\u897f\u5170","Nicaragua":"\u5c3c\u52a0\u62c9\u74dc","Niger":"\u5c3c\u65e5\u5c14","Nigeria":"\u5c3c\u65e5\u5229\u4e9a","Niue":"\u7ebd\u57c3","Norfolk Island":"\u8bfa\u798f\u514b\u5c9b","Norway":"\u632a\u5a01","Oman":"\u963f\u66fc","Pakistan":"\u5df4\u57fa\u65af\u5766","Palau":"\u5e15\u52b3","Palestine":"\u5df4\u52d2\u65af\u5766","Panama":"\u5df4\u62ff\u9a6c","Papua New Guinea":"\u5df4\u5e03\u4e9a\u65b0\u51e0\u5185\u4e9a","Peru":"\u79d8\u9c81","Philippines":"\u83f2\u5f8b\u5bbe","Pitcairn Islands":"\u76ae\u7279\u51ef\u6069\u7fa4\u5c9b","Poland":"\u6ce2\u5170","Portugal":"\u8461\u8404\u7259","Puerto Rico":"\u6ce2\u591a\u9ece\u5404","Qatar":"\u5361\u5854\u5c14","Reunion":"\u7559\u5c3c\u6c6a\u5c9b","Romania":"\u7f57\u9a6c\u5c3c\u4e9a","Rwanda":"\u5362\u65fa\u8fbe","Russian Federation":"\u4fc4\u7f57\u65af\u8054\u90a6","Saint Helena":"\u5723\u8d6b\u52d2\u62ff","Saint Kitts-Nevis":"\u5723\u57fa\u8328\u548c\u5c3c\u7ef4\u65af","Saint Lucia":"\u5723\u5362\u897f\u4e9a","Saint Vincent and the Grenadines":"\u5723\u6587\u68ee\u7279\u548c\u683c\u6797\u7eb3\u4e01\u65af","El Salvador":"\u8428\u5c14\u74e6\u591a","Samoa":"\u8428\u6469\u4e9a","San Marino":"\u5723\u9a6c\u529b\u8bfa","Sao Tome and Principe":"\u5723\u591a\u7f8e\u548c\u666e\u6797\u897f\u6bd4","Saudi Arabia":"\u6c99\u7279\u963f\u62c9\u4f2f","Senegal":"\u585e\u5185\u52a0\u5c14","Seychelles":"\u585e\u820c\u5c14","Sierra Leone":"\u585e\u62c9\u5229\u6602","Singapore":"\u65b0\u52a0\u5761","Serbia":"\u585e\u5c14\u7ef4\u4e9a","Slovakia":"\u65af\u6d1b\u4f10\u514b","Slovenia":"\u65af\u6d1b\u6587\u5c3c\u4e9a","Solomon Islands":"\u6240\u7f57\u95e8\u7fa4\u5c9b","Somalia":"\u7d22\u9a6c\u91cc","South Africa":"\u5357\u975e","Spain":"\u897f\u73ed\u7259","Sri Lanka":"\u65af\u91cc\u5170\u5361","Sudan":"\u82cf\u4e39","Suriname":"\u82cf\u91cc\u5357","Swaziland":"\u65af\u5a01\u58eb\u5170","Sweden":"\u745e\u5178","Switzerland":"\u745e\u58eb","Syria":"\u53d9\u5229\u4e9a","Tajikistan":"\u5854\u5409\u514b\u65af\u5766","Tanzania":"\u5766\u6851\u5c3c\u4e9a","Thailand":"\u6cf0\u56fd","Trinidad and Tobago":"\u7279\u7acb\u5c3c\u8fbe\u548c\u591a\u5df4\u54e5","Timor-Leste":"\u4e1c\u5e1d\u6c76","Togo":"\u591a\u54e5","Tokelau":"\u6258\u514b\u52b3","Tonga":"\u6c64\u52a0","Tunisia":"\u7a81\u5c3c\u65af","Turkey":"\u571f\u8033\u5176","Turkmenistan":"\u571f\u5e93\u66fc\u65af\u5766","Tuvalu":"\u56fe\u74e6\u5362","Uganda":"\u4e4c\u5e72\u8fbe","Ukraine":"\u4e4c\u514b\u5170","United Arab Emirates":"\u963f\u8054\u914b","United Kingdom":"\u82f1\u56fd","United States":"\u7f8e\u56fd","Uruguay":"\u4e4c\u62c9\u572d","Uzbekistan":"\u4e4c\u5179\u522b\u514b\u65af\u5766","Vanuatu":"\u74e6\u52aa\u963f\u56fe","Vatican City":"\u68b5\u8482\u5188","Venezuela":"\u59d4\u5185\u745e\u62c9","Vietnam":"\u8d8a\u5357","Wallis and Futuna":"\u74e6\u5229\u65af\u7fa4\u5c9b\u548c\u5bcc\u56fe\u7eb3\u7fa4\u5c9b","Western Sahara":"\u897f\u6492\u54c8\u62c9","Yemen":"\u4e5f\u95e8","Yugoslavia":"\u5357\u65af\u62c9\u592b","Zambia":"\u8d5e\u6bd4\u4e9a","Zimbabwe":"\u6d25\u5df4\u5e03\u97e6"}';
    $arr = json_decode($json,true);
    foreach ($arr as $key => $value) {
        $content = str_replace($key, $value, $content);
    }
    return $content;
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
                                        <a class=" btn btn-success" style="margin-top:-8px;" href="/runAuto.php" id="shoudong">手动刷新</a>
                                    </div>
                                </div>
                                <!-- <div class="bootstrap-admin-panel-content">
                                    <form action="" method="get">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            选择要查看的日期：
                                            <input type="text" name="selectDate" id="selectDate" data-date="" data-date-format="yyyy-mm-dd" value="{{$day}}"  placeholder="选择日期" >
                                            <input type="submit" value="提交">
                                        </div>
                                    </form>
                                </div> -->
                                    <?php
                                        $country = DB::table('domain_infos')->where('created_at','>=',$start)->where('created_at','<=',$end)->orderBy('rank_global','asc')->get();
                                        $guodu = [];
                                        foreach ($country as $key => $value) {
                                            if($value->rank_global == 0)
                                            {
                                                $guodu[] = $value;
                                                unset($country[$key]);
                                            }
                                        }
                                        foreach ($guodu as $key => $value) {
                                            $country[] = $value;
                                        }
                                    ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10%">域名</th>
                                                <th width="10%">类型</th>
                                                <th width="6%">全球排名</th>
                                                <th width="7%">跳出率</th>
                                                <th width="11%">访问者每日浏览次数</th>
                                                <th width="7%">停留时间</th>
                                                <th width="40%">地区排名</th>
                                                <th width="9%">趋势图</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($country as $val)
                                            <?php
                                                $yuming = getDomainById($val->domain_id);
                                            ?>
                                            <tr>
                                                <td><a href="http://{{ $yuming->domain }}" target="_blank">{{ $yuming->domain }}</a></td>
                                                <td>{{ $yuming->domain_type }}</td>
                                                <td>{{ $val->rank_global }}</td>
                                                <td>{{ $val->tiaochulv }}</td>
                                                <td>{{ $val->liulanliang }}</td>
                                                <td>{{ $val->chixushijian }}</td>
                                                <td>{!! CountryEnToCh($val->rank_country_all) !!}</td>
                                                <td><a href="https://www.alexa.com/siteinfo/{{ $yuming->domain }}" target="_blank"><img src="{{ $val->rank_pic }}" width="200px;"></a></td>
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