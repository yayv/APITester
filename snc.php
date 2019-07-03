<?php

// security net cat

#$url = 'https://10.129.92.19:1443/login.html';
function loaddata($project, $api)
{
	$req = new stdClass();
	$req->url = trim(file_get_contents("./data/$project/$api/$api.url"),"\n\t ");
	$headers = file("./data/$project/$api/$api.headers");

	$topline = array_shift($headers);
	$req->method = strstr($topline," ", true);

	$req->uri = strstr(substr($topline,strlen($req->method)+1), " ", true);

	$req->httpversion = strstr(substr($topline, strlen($req->method.$req->uri)+1), " ");
	
	$req->headers= array();
	foreach($headers as $k=>$v)
	{
		if(trim($v)=='')
		{
			unset($headers[$k]);
		}
		else if(0==strpos($v,'Host:'))
		{
			unset($headers[$k]);
		}
		else
		{
			$req->headers[] = $v;
		}
	}

	$pu = parse_url($req->url);
	
	if(isset($pu['port'])) 
		$pu['port'] = ":".$pu['port'];

	$req->headers[] = "Host:".$pu['host'].$pu['port'];

	$req->body = file_get_contents("./data/$project/$api/$api.body");

	return $req;
}

if(isset($_SERVER['argv'][2]))
{
	$project = $argv[1];
	$api = $argv[2];
}
else
{
	$project = "warroom";
	$api = "group_create";
}

$req = loaddata($project, $api);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $req->url);

if($req->method=='POST')
{
	curl_setopt($curl, CURLOPT_POST, 1); 
}
else if($req->method=='GET')
{
	curl_setopt($curl, CURLOPT_HTTPGET, 1); 
}
else if($req->method=='PUT')
{
	curl_setopt($curl, CURLOPT_PUT, 1); 
}
else
{
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $req->method);
}
curl_setopt($curl, CURLOPT_HEADER, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, $req->headers);
if(true)
{
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
}


if($req->method=='POST')
{
	curl_setopt($curl, CURLOPT_POSTFIELDS, $req->body);
}

$data = curl_exec($curl);

if($data)
{
	echo "result:\n";
	print_r($data);
}
else
{
	print_r(curl_error($curl));
}

curl_close($curl);
