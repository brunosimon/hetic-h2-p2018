<?php
    $title = 'Psyc\'Hétic | Carte';

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
<section class="bigMap">
   <h1>Carte des Psychopathes</h1>
    <div class="contentMap">
        <div class="googleMap" id="map-canvas"></div>
        <div class="communsPts">
            Points communs :

            <ul class="compare">
                <li><span id="scAlt">223</span>....... alt ....... <span class="span" id="scAltB">100</span></li>
                <li><span id="scSai">120</span>....... sai ....... <span class="span" id="scSaiB">030</span></li>
                <li><span id="scSad">210</span>....... sad ....... <span class="span" id="scSadB">401</span></li>
                <li><span id="scEmo">340</span>....... émo ....... <span class="span" id="scEmoB">378</span></li>
                <li><span id="scEsp">050</span>....... esp ....... <span class="span" id="scEspB">010</span></li>
            </ul>
        </div>
    </div>
</section>
<script>
    var compare = {
        AltL : document.getElementById("scAlt"),
        SaiL : document.getElementById("scSai"),
        SadL : document.getElementById("scSad"),
        EmoL : document.getElementById("scEmo"),
        EspL : document.getElementById("scEsp"),

        AltR : document.getElementById("scAltB"),
        SaiR : document.getElementById("scSaiB"),
        SadR : document.getElementById("scSadB"),
        EmoR : document.getElementById("scEmoB"),
        EspR : document.getElementById("scEspB")
    };
    function compareIt(alt, sain, sad, emo, esp, altE, sainE, sadE, emoE, espE){
        compare.AltL.innerHTML = alt;
        compare.SaiL.innerHTML = sain;
        compare.SadL.innerHTML = sad;
        compare.EmoL.innerHTML = emo;
        compare.EspL.innerHTML = esp;

        compare.AltR.innerHTML = altE;
        compare.SaiR.innerHTML = sainE;
        compare.SadR.innerHTML = sadE;
        compare.EmoR.innerHTML = emoE;
        compare.EspR.innerHTML = espE;

        if(alt>altE){
            compare.AltL.className = "upL";
            compare.AltR.className = "downR";}
        else{
            compare.AltL.className = "downL";
            compare.AltR.className = "upR";}
        if(sain>sainE){
            compare.SaiL.className = "upL";
            compare.SaiR.className = "downR";}
        else{
            compare.SaiL.className = "downL";
            compare.SaiR.className = "upR";}
        if(sad>sadE){
            compare.SadL.className = "upL";
            compare.SadR.className = "downR";}
        else{
            compare.SadL.className = "downL";
            compare.SadR.className = "upR";}
        if(emo>emoE){
            compare.EmoL.className = "upL";
            compare.EmoR.className = "downR";}
        else{
            compare.EmoL.className = "downL";
            compare.EmoR.className = "upR";}
        if(esp>espE){
            compare.EspL.className = "upL";
            compare.EspR.className = "downR";}
        else{
            compare.EspL.className = "downL";
            compare.EspR.className = "upR";}
    }
    function whoIs(id){
        compareIt(user.alt,
                user.sai,
                user.sad,
                user.emo,
                user.esp,
                world[id].ALT,
                world[id].SAI,
                world[id].SAD,
                world[id].EMO,
                world[id].ESP);
    }
    compareIt(user.alt, user.sai, user.sad, user.emo, user.esp, user.alt, user.sai, user.sad, user.emo, user.esp);
</script>