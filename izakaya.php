<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>居酒屋比較サイト</title>
</head>
<body>
    <form action="izakaya_confirm.php" method="get" accept-charset="UTF-8">
        <div>
            お店を探す<br>
            地名：<input type="text" name="address">
            ジャンル：<input type="text" name="category">
            <input type="submit" value="送信">
        </div>
    </form>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        //＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        //APIリクエストに記載するデータ群
        //＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        const key = "7c32cebda785eda6"; //自分のAPIキー
        const address = "赤坂"; //地名
        const keyword = "居酒屋"; //お店のジャンル


        //＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        //ホットペッパーから情報を取得
        //＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        const url = 'https://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key='+key+'&address='+address+'&keyword='+keyword;
        $.ajax({//送信処理
            url:url,
            type:'get',
            cache:false,
            datatype:'json'
        }).done(function(data){
            console.log(data);
        });
    </script> -->
</body>
</html>
<!-- https://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=7c32cebda785eda6&address=赤坂&keyword=居酒屋 -->