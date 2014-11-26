 var canvas_bg  = document.getElementById('canvas_bg'),
     context_bg = canvas_bg.getContext('2d'); 
	 canvas_draw  = document.getElementById('canvas_draw'),
     context = canvas_draw.getContext('2d');

//-------------------------- BACKGROUND IMAGE -------------------------//

var image = new Image();

image.onload = function()
{
    // Dessine l'image
    context_bg.drawImage(image,0,0,image.width / 1,image.height / 1);
};

image.src = 'src/img/background.jpg';

//----------------------------------------------------------------------//


//-------------------------- BACKGROUND BUILDINGS -------------------------//

//LEFT ANTENNAS
context.strokeStyle="rgb(239,244,242)";
context.lineWidth=2;
context.beginPath();
context.moveTo(137,268);
context.lineTo(137,163);
context.stroke();

context.beginPath();
context.moveTo(149,268);
context.lineTo(149,233);
context.stroke();

context.beginPath();
context.moveTo(121,287);
context.lineTo(121,234);
context.stroke();

//LEFT BUILDING
context.fillStyle="rgb(218,229,226)";
context.lineWidth=2;
context.beginPath();
context.moveTo(173,307);
context.lineTo(173,850);
context.lineTo(61,850);
context.lineTo(61,382);
context.lineTo(89,359);
context.lineTo(92,292);
context.lineTo(140,265);
context.lineTo(152,265);
context.lineTo(173,307);
context.fill();

//RIGHT ANTENNAS
context.strokeStyle="rgb(239,244,242)";
context.lineWidth=2;
context.beginPath();
context.moveTo(1096,231);
context.lineTo(1096,163);
context.stroke();

context.beginPath();
context.moveTo(1113,228);
context.lineTo(1113,139);
context.stroke();

context.beginPath();
context.moveTo(1140,228);
context.lineTo(1140,139);
context.stroke();

context.beginPath();
context.moveTo(1172,242);
context.lineTo(1172,191);
context.stroke();

//SUPPORT RIGHT ANTENNAS
context.fillStyle="rgb(218,229,226)";
context.beginPath();
context.moveTo(1084,244);
context.lineTo(1084,233);
context.lineTo(1130,224);
context.lineTo(1210,244);
context.lineTo(1210,264);
context.fill();

//RIGHT BUILDING
context.beginPath();
context.moveTo(1244,272);
context.lineTo(1244,850);
context.lineTo(1036,850);
context.lineTo(1036,254);
context.lineTo(1109,238);
context.lineTo(1244,272);
context.fill();

//MID BUILDING
context.beginPath();
context.moveTo(934,565);
context.lineTo(934,850);
context.lineTo(715,850);
context.lineTo(715,440);
context.lineTo(803,425);
context.lineTo(899,443);
context.lineTo(899,512);
context.lineTo(910,515);
context.lineTo(910,559);
context.lineTo(934,565);
context.fill();

//------------------------------------------------------------------//

//-------------------------- 2ND PLAN BUILDINGS -------------------------//

//LEFT BUILDING
context.fillStyle="rgb(148,168,167)";
context.beginPath();
context.moveTo(118,503);
context.lineTo(0,488);
context.lineTo(0,850);
context.lineTo(118,850);
context.lineTo(118,503);
context.fill();

//2ND BUILDING
context.beginPath();
context.moveTo(137,715);
context.lineTo(137,850);
context.lineTo(674,850);
context.lineTo(674,832);
context.lineTo(715,803);
context.lineTo(677,763);
context.lineTo(677,737);
context.lineTo(209,704);
context.lineTo(137,715);
context.fill();

//BATMAN LOGO PROJECTOR
context.fillStyle="rgb(83,102,103)";
context.beginPath();
context.moveTo(760,721);
context.lineTo(760,669);
context.lineTo(811,663);
context.lineTo(811,714);
context.lineTo(760,721);
context.fill();

//3RD BUILDING
context.fillStyle="rgb(148,168,167)";
context.beginPath();
context.moveTo(752,850);
context.lineTo(752,722);
context.lineTo(875,704);
context.lineTo(1054,725);
context.lineTo(1054,850);
context.lineTo(752,850);
context.fill();


//RIGHT BUILDING
context.fillStyle="rgb(148,168,167)";
context.beginPath();
context.moveTo(1241,850);
context.lineTo(1241,637);
context.lineTo(1412,476);
context.lineTo(1450,502);
context.lineTo(1450,850);
context.lineTo(1241,850);
context.fill();

//CLOCK
context.fillStyle="rgb(220,231,227)";
context.beginPath();
context.arc(1368,633,41.5,0,2*Math.PI);
context.fill();

//HAND CLOCK
context.strokeStyle="rgb(53,67,69)";
context.lineWidth=3;
context.beginPath();
context.moveTo(1342,614);
context.lineTo(1369,634);
context.lineTo(1387,624);
context.stroke();

//------------------------------------------------------------------//

//----------------------- BATMAN LOGO + PROJECTOR LIGHT ------------//

//LIGHT
context.fillStyle="rgb(100,103,153)";
context.beginPath();
context.moveTo(760,669);
context.lineTo(461,26);
context.lineTo(674,83);
context.lineTo(1003,26);
context.lineTo(811,663);
context.fill();

//LOGO
context.fillStyle="rgb(255,255,255)";
context.shadowBlur=40;
context.shadowColor="black";
context.beginPath();
context.moveTo(461,26);
context.lineTo(638,26);
context.lineTo(656,56);
context.lineTo(688,65);
context.lineTo(707,65);
context.lineTo(715,37);
context.lineTo(725,52);
context.lineTo(739,52);
context.lineTo(746,32);
context.lineTo(752,65);
context.lineTo(773,65);
context.lineTo(803,53);
context.lineTo(818,26);
context.lineTo(1003,26);
context.lineTo(922,95);
context.lineTo(920,139);
context.lineTo(811,149);
context.lineTo(732,224);
context.lineTo(649,145);
context.lineTo(542,139);
context.lineTo(541,94);
context.lineTo(461,26);
context.fill();

//------------------------------------------------------------------//


//-------------------------- 1ST PLAN BUILDING -------------------------//

context.fillStyle="rgb(53,67,69)";
context.shadowBlur=0;
context.beginPath();
context.fillRect(0,827,649,22);
context.fill();

//------------------------------------------------------------------//

//------------------------------ BATMAN -------------------------------//

context.fillStyle="rgb(255,255,255)";
context.shadowBlur=20;
context.shadowColor="black";
context.beginPath();
context.moveTo(166,458);
context.lineTo(166,430);
context.lineTo(172,384);
context.lineTo(178,403);
context.lineTo(186,401);
context.lineTo(198,407);
context.lineTo(198,384);
context.lineTo(208,425);
context.lineTo(208,455);
context.lineTo(220,465);
context.lineTo(245,460);
context.lineTo(300,447);
context.lineTo(357,413);
context.lineTo(423,384);
context.lineTo(478,365);
context.lineTo(565,371);
context.lineTo(526,384);
context.lineTo(513,406);
context.lineTo(565,418);
context.lineTo(514,452);
context.lineTo(525,488);
context.lineTo(546,501);
context.lineTo(495,496);
context.lineTo(445,515);
context.lineTo(473,542);
context.lineTo(426,542);
context.lineTo(423,557);
context.lineTo(426,571);
context.lineTo(406,571);
context.lineTo(393,571);
context.lineTo(400,608);
context.lineTo(379,618);
context.lineTo(377,645);
context.lineTo(298,610);
context.lineTo(303,623);
context.lineTo(299,632);
context.lineTo(275,637);
context.lineTo(272,611);
context.lineTo(243,581);
context.lineTo(244,617);
context.lineTo(259,659);
context.lineTo(258,704);
context.lineTo(277,738);
context.lineTo(283,813);
context.lineTo(308,813);
context.lineTo(316,827);
context.lineTo(263,827);
context.lineTo(231,746);
context.lineTo(235,721);
context.lineTo(197,646);
context.lineTo(149,731);
context.lineTo(137,761);
context.lineTo(111,813);
context.lineTo(137,813);
context.lineTo(142,827);
context.lineTo(94,827);
context.lineTo(94,774);
context.lineTo(100,733);
context.lineTo(117,717);
context.lineTo(130,669);
context.lineTo(162,608);
context.lineTo(160,576);
context.lineTo(137,550);
context.lineTo(126,582);
context.lineTo(137,583);
context.lineTo(117,596);
context.lineTo(128,596);
context.lineTo(110,609);
context.lineTo(129,610);
context.lineTo(112,619);
context.lineTo(117,632);
context.lineTo(117,649);
context.lineTo(94,657);
context.lineTo(83,641);
context.lineTo(94,596);
context.lineTo(91,572);
context.lineTo(105,535);
context.lineTo(121,478);
context.lineTo(137,473);
context.lineTo(166,458);
context.fill();

//---------------------------------------------------------------------//