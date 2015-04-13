function test(){
    //document.querySelectorAll("ptest").innerHTML= document.getElementById('inputtest').value;
    [].slice.call(document.getElementsByClassName('ptest')).forEach(function(div) {
        div.innerHTML = document.getElementById('inputtest').value;
    });
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}


function saveInput(){
    var testContent = document.getElementById('inputtest').value;
    document.cookie = 'cookietest='+testContent;
};

var vote = document.querySelectorAll('.vote');

for(var i = 0; i<=1; i++){   
    vote[i].onclick = saveInput;
}

document.getElementById('inputtest').value = getCookie('cookietest');
test();
document.cookie='cookietest=; expires=Thu, 01 Jan 1970 00:00:00 UTC';