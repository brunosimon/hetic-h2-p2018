var canvas = document.getElementById('mon_canvas'),
    context = canvas.getContext('2d');
    
var curve = {
        Main : document.getElementById("curve"),
        Alt : document.getElementById("Altruiste"),
        Sai : document.getElementById("Sain"),
        Sad : document.getElementById("Sadique"),
        Emo : document.getElementById("Emotion"),
        Esp : document.getElementById("Esprit")
    },
    category = {
        Sain : document.getElementById("statsSain"),
        Normal : document.getElementById("statsNormal"),
        Fou : document.getElementById("statsFou"),

        SainSc : document.getElementById("StatsSainSc"),
        NormalSc : document.getElementById("statsNormalSc"),
        FouSc : document.getElementById("statsFouSc")
    },
    compare = {
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

function Stats(alt, sain, sad, emo, esp){
    
    
    //Draw the curve
    context.fillStyle ="rgba(131, 205, 188, 0.75)";
    context.beginPath();
    context.moveTo(0, 72);
    context.lineTo(55.5, 72-(14.5*(alt/15)));
    context.lineTo(167.5, 72-(14.5*(sain/15)));
    context.lineTo(279.5, 72-(14.5*(sad/15)));
    context.lineTo(391.5, 72-(14.5*(emo/15)));
    context.lineTo(503.5, 72-(14.5*(esp/15)));
    context.lineTo(560, 72);
    context.lineTo(560, 145);
    context.lineTo(0, 145);
    context.fill();
    context.closePath();
    
    //Place Data
    curve.Alt.innerHTML = Math.abs(alt);
    curve.Sai.innerHTML = Math.abs(sain);
    curve.Sad.innerHTML = Math.abs(sad);
    curve.Emo.innerHTML = Math.abs(emo);
    curve.Esp.innerHTML = Math.abs(esp);
    
    if(alt>0) curve.Alt.className = "positif"; else curve.Alt.className = "negatif";
    if(sain>0) curve.Sai.className = "positif"; else curve.Sai.className = "negatif";
    if(sad>0) curve.Sad.className = "positif"; else curve.Sad.className = "negatif";
    if(emo>0) curve.Emo.className = "positif"; else curve.Emo.className = "negatif";
    if(esp>0) curve.Esp.className = "positif"; else curve.Esp.className = "negatif";

    //Best one
         if(alt>=sain && alt>=sad && alt>=emo && alt>=esp) curve.Main.childNodes[0].className = "topScore";
    else if(sain>=alt && sain>=sad && sain>=emo && sain>=esp) curve.Main.childNodes[1].className = "topScore";
    else if(sad>=sain && sad>=alt && sad>=emo && sad>=esp) curve.Main.childNodes[2].className = "topScore";
    else if(emo>=sain && emo>=sad && emo>=alt && emo>=esp) curve.Main.childNodes[3].className = "topScore";
    else if(esp>=sain && esp>=sad && esp>=emo && esp>=alt) curve.Main.childNodes[4].className = "topScore";
    
    compareIt(alt, sain, sad, emo, esp, alt, sain, sad, emo, esp);
}
function jauge(sain, normal, fou){
    category.Sain.style.width = sain+"%";
    category.Normal.style.width = normal+"%";
    category.Fou.style.width = fou+"%";
    
    category.SainSc.innerHTML = sain+"%";
    category.NormalSc.innerHTML = normal+"%";
    category.FouSc.innerHTML = fou+"%";
}
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

Stats(user.alt, user.sai, user.sad, user.emo, user.esp);
jauge(user.sain, user.normal, user.fou);
compareIt(user.alt, user.sai, user.sad, user.emo, user.esp, user.alt, user.sai, user.sad, user.emo, user.esp);