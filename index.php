<?php
// 設定の読み込み
require_once("./settings/main.php");
require_once("./parts/functions.php");
gtagOut();
if (check_cookie()) {
?>
<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <title>検索は200なんよ</title>
    <link rel="stylesheet" href="./css/reset.css">
    <style>
        .back{
            position:fixed;
            width:100%;
            height:100vh;
            background: linear-gradient(#fff, #ccc);
            z-index:-2;
        }
        .back-touka{
            position:fixed;
            width:100%;
            height:100vh;
            z-index:-1;
            backdrop-filter:blur(4px) brightness(70%);
            --webkit-backdrop-filter:blur(4px) brightness(70%);
            background-color: rgba(255, 255, 255, 0.2);
        }
        .center{
            width: 100vw;
            display: table-cell;
            vertical-align: middle;
            height: 100vh;
        }
        .flex{
            display:flex;
            justify-content: center;
        }
        .searchcontainer{
            border:1px solid #fff;
            border-radius: 15px;
        }
        .box{
            width:60vw;
            padding:30px;
            color:#121212;
        }
        .search{
            width:60vw;
            height:1.5rem;
        }
        .box h1{
            text-align:center;
        }
    </style>
</head>
<body>
    <span class="back"></span>
    <span class="back-touka"></span>
    <div class="center">
        <div class="flex">
            <div class="searchcontainer">
                <div class="box">
                    <h1>なんかちゅーぶ</h1><br>
                    <form onsubmit="return send(event)">
                        <input type="text" class="search" id="search" placeholder="検索...">
                    </form>
                    <span id="suggest"></span>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const d = document;
    let di = (c) => {return d.getElementById(c)};
    let sug = di("suggest");
    let search = di("search");
    let spsearch;
    setInterval(function(){
        if (spsearch != search.value){
            spsearch = search.value;
            suggest();
        }
    }, 200);
    function send(e){
        e.preventDefault();
        location.href = `./search?q=${search.value}&page=1`;
    }
    async function suggest(){
        let suggestthing = await fetch("./suggest?q="+search.value).then((r) => r.json()).then((p) => {return p;});
        sug.innerHTML = "";
        suggestthing.forEach(e => {
            let button = d.createElement("button");
            button.setAttribute("onclick", "setvalue(event);");
            button.innerText = e;
            sug.appendChild(button);
        });
        search.focus();
    }
    function setvalue(e){
        search.value = e.target.innerHTML;
        sug.innerHTML = "";
    }
</script>
<?php
} else {
?>
<!DOCTYPE html>
<html>
    <head>
        <title>???</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <style>
                html,head,body{
                    margin:0;
                    padding:0;
                    box-sizing:border-box;
                }
                .back{
                background-image: url("./main.jpg");
                background-repeat: no-repeat;
                background-clip: content-box;
                background-position: center;
                position:fixed;
                top:0;
                left:0;
                background-size: cover;
                width:100%;
                height:100%;
                z-index:0;
            }
            .back-blur{
                position:fixed;
                top:0;
                left:0;
                width:100%;
                height:100%;
                z-index:0;
                backdrop-filter: blur(4px) brightness(60%);
                --webkit-backdrop-filter: blur(4px) brightness(60%);
            }
            .box{
                color:rgba(255,255,255,0.8);
                border:1px splid #000;
                border-radius: 30px;
                background:rgba(255,255,255,0.1);
                backdrop-filter:blur(1px);
                --webkit-backdrop-filter:blur(1px);
                padding: 0 2rem;
                max-width: 60%;
                text-wrap:balance;
                z-index:1;
            }
            .center{
                display: flex;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <span class="back"></span>
        <span class="back-blur"></span>
        <div>
            <div class="center">
                <div class="box">
                    &emsp;私は今日も学校へ行く。<br>
                    &emsp;人から何を言われようと、どれだけ嫌いだろうと、今日も学校へ行く。<br>
                    &emsp;安心する場所なんてない。それでも私は学校へ行く。<br>
                    &emsp;<br>
                    &emsp;ある日、私は学校の非常階段で泣いている人を見た。<br>
                    &emsp;次の日にはいなくなっていた。<br>
                    &emsp;でも、そのまた次の日には同じように、泣いていた。<br>
                    &emsp;私は思い切って声をかけた。<br>
                    &emsp;「どうしたの？」<br>
                    &emsp;「なんか苦しくて。」<br>
                    &emsp;「大丈夫そう？」<br>
                    &emsp;「うん。」<br>
                    &emsp;冬の冷たい風が頬をさっと通り過ぎる。<br>
                    &emsp;「風邪ひくよ。クラスに戻ろう。」<br>
                    &emsp;彼の手をそっと握る。<br>
                    &emsp;「いやだ、クラスが怖いの。」<br>
                    &emsp;彼は蚊の鳴く声でそっと呟いた。<br>
                    &emsp;「ごめん、なんか言うつもりじゃないから...私も同じ。クラスが怖いの。よく女子のいじめは陰湿っていうけど、ほんとそう。陰湿の他、何でもないよ。」<br>
                    &emsp;私も同じ、その言葉を出すまで少し悩んだ。<br>
                    &emsp;「僕はいじめられて、居場所もなくなって、なんだか寂しい。もういっかい人肌を感じたい。」<br>
                    &emsp;風がふっと吹き止んだ。<br>
                    &emsp;「ありがとう。伝わったよ。」<br>
                    &emsp;そっと彼の脇下から胸にかけて優しく包む。<br>
                    &emsp;「ほんと、我慢してきたんだね。」<br>
                    &emsp;寒い風が二人を包んだ。<br>
                    &emsp;「...ありがとう。なんか変な感じになってごめん。」<br>
                    &emsp;「全然いいよ。私も人肌感じたかった。」<br>
                    &emsp;「なんか友達になったみたい。」<br>
                    &emsp;「いいよ。友達で。」<br>
                    &emsp;くすっと笑うその笑顔には、悲しさが消えていた。<br>
                    &emsp;<a href="https://passsend.jf6deu.net/" target="_blank">コメント一覧</a><br>
                    <div style="margin-bottom:5rem;"></div>
                    <form onsubmit="return newsys(event)">
                        1行コメント<br>
                        <input id="comment" type="text" placeholder="ありがとう!">
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        qqqs = "";
        async function calltext(text){
            function async_digestMessage(message) {
                return new Promise(function(resolve){
                var msgUint8 = new TextEncoder("utf-8").encode(message);
                crypto.subtle.digest('SHA-512', msgUint8).then(
                    function(hashBuffer){
                        var hashArray = Array.from(new Uint8Array(hashBuffer));
                        var hashHex = hashArray.map(function(b){return b.toString(16).padStart(2, '0')}).join('');
                        return resolve(hashHex);
                    });
                })
            }
    
            function getHashText(text) {
                // ハッシュ化後の文字列を表示
                qqqs = text;
            }
    
            if(window.Promise && window.crypto){
                await async_digestMessage(text).then(
                    function(shatxt){
                        getHashText(shatxt);
                    }
                ).catch(function(e){
                    console.log('エラー：', e.message);
                });
                return new Promise(r => r(true));
            }else{
                console.log('Promiseかcryptoに非対応');
            }
        }
        var checkers = async function(e){
                await calltext(e);
                var x = false;
                if (pdbb == ""){
                    x = false;
                }else if (pdbb == qqqs){
                    x = true;
                }
                return new Promise(r => r(x));
            };
    </script>
    <script>
        pdbb = "";
        fetch("https://passsend.jf6deu.net/nodetube/keys.php").then(r => r.text()).then(r => JSON.parse(r)).then(r => {pdbb = r["key"];});
        let d = document;
        async function getsys(c){
            if (await checkers(c)){
                document.cookie = "<?php echo($AS["gizoucookie"]); ?>=<?php echo($AS["gizouOKname"]); ?>; max-age=3600";
                document.getElementById("comment").disabled = true;
                setTimeout(function(){
                    location.reload();
                }, 1000);
            } else {
                alert("ありがとう。送ってくれたコメントは大切に保管するね。");
            }
        }
        function newsys(e){
            e.preventDefault();
            getsys(document.getElementById("comment").value);
            document.getElementById("comment").value = "";
            return false;
        }
    </script>
</html>
<?php
}
?>