<?php

mb_http_output('utf-8');
mb_internal_encoding('utf-8');
// header('Content=Type: text/xml;charset=UTF-8');

$key = "7c32cebda785eda6";
$address = $_GET["address"];
$category = $_GET["category"];

$url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=".$key."&address=".$address."&keyword=".$category."&count=100&format=json";

//渡したいパラメータ
// $params = [
//     'query' => [
//         'key' => $key,
//         'address' => $address,
//         'keyword' => $category,
//         'format' => 'json',
//     ],
// ];
// $json_param = json_encode($params);

$headers = [
    'Content-Type: application/json',
    'Accept-Charset: UTF-8',
];

/* curlセッションを初期化する*/
$ch = curl_init();

/* curlオプションを設定する */
// curl_setopt(セッション, 項目名, 設定値);
curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, TRUE);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $json_param);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* curlを実行し、その内容を$result変数に保存 */
$result = curl_exec($ch);

//PHPで扱えるようにJson文字列をデコードする
$data = json_decode($result, true);
/* curlセッションを終了する */
curl_close($ch);

//$result内のresults.shopをjQUeryに渡す
$shops_json = json_encode($data['results']['shop']);

// echo json_encode($result);
// $length = count($result);
// echo '<script>console.log(' . json_encode($result) . ');</script>';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>randomlunch</title>
    <style>
        #view{
            padding: 10px;
            border: 4px solid #6f28bb;
            width: 50%px;
            background-color: aliceblue;
            height:500px;
            overflow: auto;
        }
        img{
            width:50px;
        }
        #view>div{
            border-bottom: 1px dotted #3838ab;
            font-size:medium;
        }
        .bold{
            font-weight: bold;
        }
        h2{
            font-size:x-large;
            color:#f1071e;
        }
    </style>
</head>
<body>
    <div>
        <h1>
           <span id="area"></span> 今日のランチはこれ！
        </h1>
        <div id="view"></div>
    </div>
    <!-- div>div*5でdivの中にdivを5つ作成できる -->
    <!-- <div> 
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        console.log(<?=$shops_json?>);
        let shops = <?=$shops_json?>;
        console.log(shops);

        if(shops.length > 0){
            // const array = [shops];
            // const selected = randomSelect(array.slice(), 3);
 
            // // 配列shopsからランダムにnum個の要素を取り出す          
            // function randomSelect(array, num){
            //     let new_shops = [];
                
            //     if(new_shops.length < 3 && array.length > 0){
            //         // 配列からランダムな要素を選ぶ
            //         const rand = Math.floor(Math.random() * array.length);
            //         // 選んだ要素を別の配列に登録する
            //         new_shops.push(shops[rand]);
            //         // もとの配列からは削除する
            //         shops.splice(rand, 1);
            //     };
            //     return new_shops;
            //     console.log(new_shops);

                $(function(){
                let html = ""; //HTML文字を追加していく
                for(let i=0; i<shops.length; i++){
                    html += `
                        <div> 
                            <div>店名：${shops[i].name}</div>
                            <div>住所：${shops[i].address}</div>
                            <div>アクセス：${shops[i].access}</div>
                            <div>おすすめ：${shops[i].catch}</div>
                            <div>価格帯：${shops[i].budget.name}</div>
                            <div>URL：${shops[i].urls.pc}</div>
                        </div>
                    `;//「Shit+@」 バッククォート
                }
                $("#view").append(html);
                });
            };





            // function randomSelected(shops, num) {
            //     const copyArray = [shops];
            //     const new_shops = [copyArray(3)].map(() => {
            //         const randomStartIndex = Math.floor(Math.random() * copyArray.length);
            //         return copyArray.splice(randomStartIndex, 1).at();
            //     });

            //     console.log(new_shops);
                



    </script>
</body>
</html>


