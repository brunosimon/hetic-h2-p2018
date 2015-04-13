<?php
session_start();
$folie = $_COOKIE['myScore'];
?>
<script type="text/javascript">
    var world = <?php echo json_encode($_SESSION['donnees'], JSON_PRETTY_PRINT) ?>;
    console.log(world);
    var user = {
        long : JSON.parse(<?php echo $_COOKIE['long'] ?>),
        lat : JSON.parse(<?php echo $_COOKIE['lat'] ?>),
        alt : JSON.parse(<?php echo $_COOKIE['alt'] ?>),
        sai : JSON.parse(<?php echo $_COOKIE['sai'] ?>),
        sad : JSON.parse(<?php echo $_COOKIE['sad'] ?>),
        emo : JSON.parse(<?php echo $_COOKIE['emo'] ?>),
        esp : JSON.parse(<?php echo $_COOKIE['esp'] ?>),
        sain : JSON.parse(<?php echo $_COOKIE['sain'] ?>),
        normal : JSON.parse(<?php echo $_COOKIE['normal'] ?>),
        fou : JSON.parse(<?php echo $_COOKIE['fou'] ?>)
    }
</script>
<div class="folie">
    <h1>votre degré de <span class="big">folie</span> est de <span class="big"><?php echo floor($folie) ?></span>%</h1>
    <?php
        if($folie<29){
    ?>
    <h2>vous êtes sein! Mais pas les autres ...</h2>
    <?php
        }
        else if($folie>= 29 && $folie<49){
    ?>
    <h2>encore quelques efforts et vous serez complètement guéris</h2>
    <?php
        }
        else if($folie>=49 && $folie<69){
    ?>
    <h2>faut se faire soigner hein...</h2>
    <?php
        }
        else if($folie>=69 && $folie<100){
    ?>
    <h2>arrêtez le justin bieber</h2>
    <?php
        }
        else if($folie==100){
    ?>
    <h2>j'imagine que les calmants ne serviront à rien dans votre cas...</h2>
    <?php
        }
    ?>
</div>
<div class="statsContent">
    <div class="tableau">
        <div class="yourScore"><h1>votre <span class="big">score</span></h1></div>
        <ul class="curve" id="curve">
            <li><h3>Altruiste</h3><div class="points positif" id="Altruiste">223</div></li>
            <li><h3>sain</h3><div class="points negatif" id="Sain">120</div></li>
            <li><h3>sadique</h3><div class="points negatif" id="Sadique">210</div></li>
            <li><h3>émotion</h3><div class="points negatif" id="Emotion">340</div></li>
            <li><h3>esprit</h3><div class="points negatif" id="Esprit">050</div></li>
            <canvas id="mon_canvas" width="560" height="145"></canvas>
        </ul>
        <div class="verdict"><p>La raison à voulu que vous soyez fou. vous êtes plusieurs dans votre tête et vous ne réfléchissez pas comme les autres. Et c'est bizarre.</p></div>
        <div class="yourFolie"><h1>la jauge de <span class="big">folie</span></h1></div>
        <ul class="category">
            <li id="statsSain"><h3>sain</h3><div class="catScore" id="StatsSainSc">20%</div></li>
            <li id="statsNormal"><h3>normal</h3><div class="catScore" id="statsNormalSc">30%</div></li>
            <li id="statsFou"><h3>fou à lier</h3><div class="catScore" id="statsFouSc">50%</div></li>
        </ul>
    </div>
    <div class="map">
        <h2>Ne vous <span class="big">inquiétez pas...</span></br>vous n'êtes pas seuls</h2>
        <div class="contentMap">
            <div class="googleMap" id="map-canvas"></div>
            <div class="compareStats">
                <div class="status">status : schizophrénie</div>
            </div>
            <div class="communsPts">
                Points communs :
                <ul class="communList">
                    <li>aime tuer des chats</li>
                    <li>adore la violence gratuite</li>
                    <li>amateur de sang frais</li>
                </ul>
                <ul class="compare">
                    <li><span id="scAlt">223</span>....... alt ....... <span class="span" id="scAltB">100</span></li>
                    <li><span id="scSai">120</span>....... sai ....... <span class="span" id="scSaiB">030</span></li>
                    <li><span id="scSad">210</span>....... sad ....... <span class="span" id="scSadB">401</span></li>
                    <li><span id="scEmo">340</span>....... émo ....... <span class="span" id="scEmoB">378</span></li>
                    <li><span id="scEsp">050</span>....... esp ....... <span class="span" id="scEspB">010</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="js/stats.js"></script>