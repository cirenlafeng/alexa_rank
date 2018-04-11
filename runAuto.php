<?php 
set_time_limit(1800);
//设定页面编码
header("Content-Type:text/html;charset=utf-8");
//设定时区
date_default_timezone_set('Asia/Riyadh');

error_reporting(E_ALL ^ E_NOTICE);

$lingchen = date('Y-m-d H:i:s',strtotime(date('Y-m-d',time())));

$env = file_get_contents('.env');
$config = explode("\n", $env);
foreach ($config as $key => $value) {
	if(strstr($value, 'DB_HOST'))
	{
		$DB_HOST = explode('=', $value);
	}
	if(strstr($value, 'DB_USERNAME'))
	{
		$DB_USERNAME = explode('=', $value);
	}
	if(strstr($value, 'DB_PASSWORD'))
	{
		$DB_PASSWORD = explode('=', $value);
	}
	if(strstr($value, 'DB_DATABASE'))
	{
		$DB_DATABASE = explode('=', $value);
	}
}
$dbms='mysql';     //数据库类型
$host=$DB_HOST[1]; //数据库主机名
if($host == 'localhost')
{
	$host = '127.0.0.1';
}
$dbName=$DB_DATABASE[1];    //使用的数据库
$user=$DB_USERNAME[1];      //数据库连接用户名
$pass=$DB_PASSWORD[1];  //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";


try {
    $pdo = new PDO($dsn, $user, $pass); //初始化PDO
    $pdo->query('set names utf8;');
} catch (PDOException $e) {
    die ("Error!: can not find database");
}

$nowDate = date('Y-m-d H:i:s',time());
$domains = $pdo->query("SELECT * FROM `domains` WHERE `updated_at` < '{$lingchen}' ")->fetchAll(PDO::FETCH_ASSOC);
foreach ($domains as $key => $value) {
	$domainId = $value['id'];
	$info = file_get_contents('https://www.alexa.com/siteinfo/'.$value['domain']);
	preg_match('/{"siteinfo":{"rank":(.*?),"rating":false}}/im',$info,$row1); 
	if($row1)
	{
		$row1 = json_decode($row1[1],true);
	}else{
        $row1['global'] = 0;
    }
	//全球总排名
	$global = $row1['global'];
	preg_match('/<table cellpadding="0" cellspacing="0" id="demographics_div_country_table" class="table  ">(.*?)<\/table>/ims',$info,$row2); 
    if(!$row2)
    {
        $row2[0] = '';
    }
	//各地区排名
	$country_all = str_replace("src='/images", "src='https://www.alexa.com/images", $row2[0]);
	$country_all = str_replace("Rank in Country", "地区排名", $country_all);
	$country_all = str_replace("Country", "地区", $country_all);
	$country_all = str_replace("Percent of Visitors", "占比", $country_all);
	$country_all = str_replace("'", '"', $country_all);
	$country_all = removeHtmlByPregs([],$country_all);
	preg_match('/<div id="rank-rank-rank"><\/div><img src="(.*?)" \/><\/div>/im',$info,$row3); 
	//图片
	$rank_pic = $row3[1];

    preg_match('/<h4 class="metrics-title">Bounce Rate<\/h4>(.*?)<\/strong>/ims',$info,$row4);
    if(!$row4)
    {
        $row4[1] = '';
    }
    $row4[1]  = str_replace('<div>', '', $row4[1]);
    $row4[1]  = str_replace('<strong class="metrics-data align-vmiddle">', '', $row4[1]);
    $tiaochulv = trim($row4[1]);

    preg_match('/<h4 class="metrics-title">Daily Pageviews per Visitor<\/h4>(.*?)<\/strong>/ims',$info,$row5);
    if(!$row5)
    {
        $row5[1] = '';
    }
    $row5[1]  = str_replace('<div>', '', $row5[1]);
    $row5[1]  = str_replace('<strong class="metrics-data align-vmiddle">', '', $row5[1]);
    $liulanliang = trim($row5[1]);

    preg_match('/<h4 class="metrics-title">Daily Time on Site<\/h4>(.*?)<\/strong>/ims',$info,$row6);
    if(!$row6)
    {
        $row6[1] = '';
    }
    $row6[1]  = str_replace('<div>', '', $row6[1]);
    $row6[1]  = str_replace('<strong class="metrics-data align-vmiddle">', '', $row6[1]);
    $chixushijian = trim($row6[1]);

	$domainsCK = $pdo->query("SELECT * FROM `domain_infos` WHERE `domain_id`= '{$domainId}' AND `created_at` >= '{$lingchen}' ")->fetchAll(PDO::FETCH_ASSOC);
	if(empty($domainsCK)){
		if($pdo->exec("INSERT INTO `domain_infos`(domain_id,rank_pic,rank_global,rank_country_all,created_at,tiaochulv,liulanliang,chixushijian) VALUES('{$domainId}','{$rank_pic}','{$global}','{$country_all}','{$nowDate}','{$tiaochulv}','{$liulanliang}','{$chixushijian}')"))
		{
			$pdo->exec("UPDATE `domains` SET `updated_at` = '{$nowDate}' WHERE `id`='{$domainId}' ");
			echo $value['domain'].' save rank success !'.PHP_EOL;
		}else{
			echo '### '.$value['domain'].' Error please check it!'.PHP_EOL;
		}
	}else{
		echo $value['domain'].' have saved continue it !'.PHP_EOL;
	}
}
echo 'finshed !'.PHP_EOL;


function removeHtmlByPregs($patten = array(), $content, $patten3 = null)
{
    //常见规则
    $patten2 = array(
        '/<!--.*?-->/',
        '/ width="[^"]*"| height="[^"]*"/i',
        #过滤各种标签内属性
        '/ id="[^"]*"| class="[^"]*"| alt="[^"]*"| srcset="[^"]*"| sizes="[^"]*"| style="[^"]*"| dir="[^"]*"| start="[^"]*"| itemprop="[^"]*"| align="[^"]*"| title="[^"]*"| rel="[^"]*"|/i',
        '/ id=\'[^\']*\'| class=\'[^\']*\'| alt=\'[^\']*\'| srcset=\'[^\']*\'| sizes=\'[^\']*\'| style=\'[^\']*\'| dir=\'[^\']*\'| start=\'[^\']*\'| itemprop=\'[^\']*\'| align=\'[^\']*\'| title=\'[^\']*\'| width=\'[^\']*\'| height=\'[^\']*\'|/i',
        '/ data-[^=]*="[^"]*"|/i',
        #去除各种标签
        '/<a([^>]*?)>/i',
        '/<\/a>/i',
        '/<strong([^>]*?)>/i',
        '/<\/strong>/i',
        '/<b>/i',
        '/<b ([^>]*?)>/i',
        '/<\/b>/i',
        '/<span([^>]*?)>/i',
        '/<\/span>/i',
        '/<center([^>]*?)>/i',
        '/<\/center>/i',
        '/<div([^>]*?)>/i',
        '/<\/div>/i',
        '/<figure([^>]*?)>/i',
        '/<\/figure>/i',
        '/<font([^>]*?)>/i',
        '/<\/font>/i',
        '/<abbr([^>]*?)>/i',
        '/<\/abbr>/i',
        '/<p> <\/p>/i',
        '/<p><\/p>/i',
    );
    if ($patten3) {
        $patten2 = $patten3;
    }
    foreach ($patten2 as $key => $value) {
        $patten[] = $value;
    }
    foreach ($patten as $key => $value)
    {
        $content = removeHtmlByPreg($value, $content);
    }
    $content = trim($content);
    $content = str_replace("<p>", "\n<p>", $content);
    $patten = array("\n\n<p>");
    for ($i=0; $i < 10; $i++) {
        $content = str_replace($patten, "\n<p>", $content);
    }
    return $content;
}

function removeHtmlByPreg($patten, $content)
{
    return $content = preg_replace($patten,'',$content);
}