// DÉFINITION DES VARIABLES

function init() {
	var canvas = document.getElementById('canvas'),
		context = canvas.getContext('2d');
		
		draw(context);
}

// DESSIN DU CANVAS

function draw(context) {

// DESSIN DE LA 1ÈRE LIGNE
	context.beginPath();
	context.moveTo(1.5, 1.5);
	context.lineTo(597.5, 1.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.lineWidth = 3;
	context.lineCap = 'round';
	context.lineJoin = 'round';
	context.stroke();

// DESSIN DE LA 2ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 32.5);
	context.lineTo(597.5, 32.5);
	context.stroke();

// DESSIN DE LA 3ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 67.5);
	context.lineTo(225.4, 67.5);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(225.4, 67.5, 284.1, 32.8, 364.8, 67.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(364.8, 67.5);
	context.lineTo(597.5, 67.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 4ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 99.5);
	context.lineTo(170.1, 99.5);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(170.1, 99.5, 283.5, 31.5, 412.8, 99.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(412.8, 99.5);
	context.lineTo(597.5, 99.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 5ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 129.5);
	context.lineTo(149.5, 129.5);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(149.5, 129.5, 288.1, 31.5, 433.5, 129.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(433.5, 129.5);
	context.lineTo(597.5, 129.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 6ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 158.8);
	context.lineTo(138.8, 158.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(138.8, 158.8, 288.8, 36.2, 444.8, 158.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(444.8, 158.8);
	context.lineTo(597.5, 158.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 7ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 188.8);
	context.lineTo(133.5, 188.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(133.5, 188.8, 290.1, 56.2, 450.8, 188.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(450.8, 188.8);
	context.lineTo(597.5, 188.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 8ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 220.8);
	context.lineTo(132.1, 220.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(132.1, 220.8, 287.5, 82.2, 455.5, 220.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(455.5, 220.8);
	context.lineTo(597.5, 220.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 9ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 252.8);
	context.lineTo(137.5, 252.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(137.5, 252.8, 242.8, 153.5, 366.8, 205.5);
	context.bezierCurveTo(410.1, 202.2, 457.5, 232.2, 471.5, 252.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(471.5, 252.8);
	context.lineTo(597.5, 252.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 10ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 287.8);
	context.lineTo(146.1, 287.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(146.1, 287.8, 252.8, 163.5, 381.2, 246.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(381.2, 246.8, 443.5, 212.2, 490.1, 287.8);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(490.1, 287.8);
	context.lineTo(597.5, 287.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 11ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 314.2);
	context.lineTo(152.8, 314.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(152.8, 314.2, 212.1, 230.8, 279.5, 252.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(279.5, 252.8);
	context.bezierCurveTo(322.8, 234.8, 364.8, 250.2, 380.1, 276.8);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(380.1, 276.8);
	context.bezierCurveTo(408.8, 264.2, 445.8, 254.5, 497.5, 314.2);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(497.5, 314.2);
	context.lineTo(597.5, 314.2);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 12ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 341.2);
	context.lineTo(156.8, 341.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(156.8, 341.2, 192.1, 288.0, 253.5, 276.6);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(253.5, 276.6);
	context.bezierCurveTo(299.5, 251.2, 355.5, 263.8, 388.8, 303.2);
	context.bezierCurveTo(442.8, 277.5, 484.1, 317.5, 486.1, 341.2);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(486.1, 341.2);
	context.lineTo(597.5, 341.2);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 13ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 376.2);
	context.lineTo(153.5, 376.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(153.5, 376.2, 192.1, 308.0, 244.8, 307.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(244.8, 307.5);
	context.bezierCurveTo(244.8, 307.5, 308.8, 257.5, 387.5, 335.2);
	context.bezierCurveTo(387.5, 335.2, 475.1, 302.5, 462.1, 376.2);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(462.1, 376.2);
	context.lineTo(597.5, 376.2);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 14ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 406.8);
	context.lineTo(129.5, 406.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(129.5, 406.8, 146.1, 394.2, 164.1, 398.8);
	context.bezierCurveTo(186.8, 364.2, 230.8, 338.2, 247.5, 337.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(247.5, 337.5);
	context.bezierCurveTo(288.8, 313.5, 349.5, 311.5, 374.1, 357.5);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(374.1, 357.5);
	context.bezierCurveTo(412.1, 349.5, 448.8, 350.2, 441.5, 390.2);
	context.bezierCurveTo(452.1, 391.5, 456.8, 400.8, 459.5, 406.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(459.5, 406.8);
	context.lineTo(597.5, 406.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 15ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 438.2);
	context.lineTo(112.1, 438.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(112.1, 438.2, 131.5, 417.5, 150.1, 424.8);
	context.bezierCurveTo(160.8, 410.2, 176.8, 410.8, 182.1, 412.2);
	context.bezierCurveTo(206.1, 376.2, 240.1, 357.5, 257.5, 360.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(257.5, 360.8);
	context.bezierCurveTo(298.1, 342.8, 339.5, 343.5, 354.1, 376.2);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(354.1, 376.2);
	context.bezierCurveTo(390.8, 370.2, 438.1, 380.8, 419.5, 406.8);
	context.bezierCurveTo(438.8, 407.5, 458.8, 430.8, 459.5, 438.2);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(459.5, 438.2);
	context.lineTo(597.5, 438.2);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 16ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 470.2);
	context.lineTo(118.8, 470.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(118.8, 470.2, 136.1, 430.2, 170.8, 441.5);
	context.bezierCurveTo(180.1, 434.2, 190.1, 440.8, 190.1, 443.5);
	context.bezierCurveTo(206.1, 402.2, 269.5, 381.2, 278.8, 381.2);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(278.8, 381.2);
	context.bezierCurveTo(330.8, 371.5, 336.1, 380.8, 342.8, 392.5);
	context.strokeStyle = "rgb(150, 150, 150)";
	context.stroke();
	context.beginPath();
	context.moveTo(342.8, 392.5);
	context.bezierCurveTo(394.1, 389.5, 408.8, 392.8, 394.8, 412.2);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(394.8, 412.2);
	context.bezierCurveTo(428.1, 422.2, 467.5, 456.2, 472.1, 470.2);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(472.1, 470.2);
	context.lineTo(597.5, 470.2);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 17ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 496.8);
	context.lineTo(140.8, 496.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(140.8, 496.8, 148.1, 469.5, 176.1, 473.5);
	context.bezierCurveTo(200.8, 444.8, 265.4, 396.8, 309.4, 414.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(309.4, 414.8);
	context.bezierCurveTo(368.8, 416.8, 428.8, 440.8, 458.8, 491.5);
	context.bezierCurveTo(472.8, 486.8, 484.8, 491.5, 486.8, 503.5);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(486.8, 503.5);
	context.lineTo(597.5, 503.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 18ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 528.2);
	context.lineTo(152.1, 528.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(152.1, 528.2, 206.8, 464.8, 232.8, 463.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(232.8, 463.5);
	context.bezierCurveTo(266.8, 437.5, 366.8, 424.8, 420.1, 498.8);
	context.bezierCurveTo(455.4, 500.8, 462.8, 520.2, 466.1, 530.8);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(466.1, 530.8);
	context.lineTo(597.5, 530.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 19ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 561.5);
	context.lineTo(150.1, 561.5);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(150.1, 561.5, 191.4, 509.5, 216.1, 512.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(216.1, 512.8);
	context.bezierCurveTo(273.4, 436.8, 392.8, 476.7, 418.1, 537.1);
	context.bezierCurveTo(438.1, 542.2, 440.8, 561.5, 440.8, 561.5);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(440.8, 561.5);
	context.lineTo(597.5, 561.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 20ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 594.2);
	context.lineTo(122.1, 594.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(122.1, 594.2, 138.8, 583.5, 145.4, 600.2);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(145.4, 600.2);
	context.bezierCurveTo(165.4, 572.2, 212.1, 550.2, 214.1, 552.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(214.1, 552.8);
	context.bezierCurveTo(242.1, 506.8, 284.8, 501.5, 291.4, 503.5);
	context.bezierCurveTo(309.4, 496.8, 373.4, 512.2, 366.8, 530.8);
	context.bezierCurveTo(394.1, 535.5, 406.8, 556.2, 403.4, 566.8);
	context.bezierCurveTo(418.1, 573.5, 410.8, 591.5, 410.8, 591.5);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(410.8, 591.5);
	context.bezierCurveTo(410.8, 591.5, 418.5, 589.0, 420.0, 594.0);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(420.0, 594.0);
	context.lineTo(597.5, 594.0);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 21ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 626.8);
	context.lineTo(116.1, 626.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(116.1, 626.8, 140.1, 599.5, 164.8, 620.8);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(164.8, 620.8);
	context.bezierCurveTo(184.8, 596.8, 218.8, 579.5, 225.4, 582.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(225.4, 582.8);
	context.bezierCurveTo(281.4, 514.2, 359.7, 517.3, 387.4, 608.6);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(387.4, 608.6);
	context.bezierCurveTo(404.8, 610.2, 410.1, 610.8, 418.8, 622.2);
	context.bezierCurveTo(418.8, 622.2, 439.4, 622.8, 443.4, 626.8);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(443.4, 626.8);
	context.bezierCurveTo(440.8, 608.2, 456.1, 614.2, 469.4, 626.8);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(469.4, 628.8);
	context.lineTo(597.5, 628.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 22ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 659.5);
	context.lineTo(112.1, 659.5);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(112.1, 659.5, 164.8, 622.2, 191.4, 636.8);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(191.4, 636.8);
	context.bezierCurveTo(210.1, 620.2, 246.1, 607.5, 246.1, 607.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(246.1, 607.5);
	context.bezierCurveTo(246.1, 607.5, 320.1, 518.8, 364.1, 620.2);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(364.1, 620.2);
	context.bezierCurveTo(392.1, 628.2, 406.1, 655.5, 406.1, 655.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(406.1, 655.5);
	context.bezierCurveTo(406.1, 655.5, 422.8, 642.8, 426.1, 640.8);
	context.bezierCurveTo(429.4, 638.8, 461.4, 640.2, 477.4, 659.5);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(477.4, 659.5);
	context.lineTo(597.5, 659.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 23ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 692.8);
	context.lineTo(137.5, 692.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(137.5, 692.8, 172.1, 640.2, 224.1, 652.2);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(224.1, 652.2);
	context.bezierCurveTo(243.5, 624.2, 264.8, 622.8, 268.1, 621.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(268.1, 621.5);
	context.bezierCurveTo(300.1, 604.2, 328.1, 610.8, 332.1, 626.8);
	context.strokeStyle = "rgb(215, 177, 96)";
	context.stroke();
	context.beginPath();
	context.moveTo(332.1, 628.8);
	context.bezierCurveTo(358.1, 640.2, 384.1, 667.5, 384.8, 673.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(384.8, 673.5);
	context.bezierCurveTo(406.8, 661.5, 442.1, 662.2, 474.1, 692.8);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(474.1, 692.8);
	context.lineTo(597.5, 692.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 24ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 724.2);
	context.lineTo(187.4, 724.2);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(187.4, 724.2, 217.4, 664.2, 259.4, 670.2);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(259.4, 670.2);
	context.bezierCurveTo(298.8, 654.2, 368.1, 662.2, 374.8, 702.8);
	context.bezierCurveTo(384.8, 704.8, 395.4, 704.2, 395.4, 704.2);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(395.4, 704.2);
	context.bezierCurveTo(395.4, 704.2, 422.8, 692.2, 446.1, 724.2);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(446.1, 724.2);
	context.lineTo(597.5, 724.2);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 25ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 754.8);
	context.lineTo(237.4, 754.8);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(237.4, 754.8, 262.1, 717.5, 272.8, 712.2);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(272.8, 712.2);
	context.bezierCurveTo(283.4, 706.8, 366.8, 722.2, 369.4, 733.5);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(369.4, 733.5);
	context.bezierCurveTo(380.8, 731.5, 403.4, 731.5, 407.4, 737.5);
	context.bezierCurveTo(416.1, 740.2, 421.4, 749.5, 421.4, 754.8);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(421.4, 754.8);
	context.lineTo(597.5, 754.8);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 26ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 785.5);
	context.lineTo(294.8, 785.5);
	context.stroke();
	context.beginPath();
	context.bezierCurveTo(294.8, 785.5, 300.8, 774.8, 313.5, 773.5);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(313.5, 773.5);
	context.bezierCurveTo(326.1, 772.2, 326.1, 776.2, 334.8, 776.2);
	context.bezierCurveTo(343.5, 776.2, 357.4, 771.9, 364.8, 773.2);
	context.strokeStyle = "rgb(248, 230, 86)";
	context.stroke();
	context.beginPath();
	context.moveTo(364.8, 773.2);
	context.bezierCurveTo(380.8, 774.8, 384.8, 778.7, 384.8, 778.7);
	context.bezierCurveTo(384.8, 778.7, 392.1, 781.5, 392.8, 785.5);
	context.strokeStyle = "rgb(0, 195, 255)";
	context.stroke();
	context.beginPath();
	context.moveTo(392.8, 785.5);
	context.lineTo(597.5, 785.5);
	context.strokeStyle = "rgb(20, 84, 185)";
	context.stroke();

// DESSIN DE LA 27ÈME LIGNE
	context.beginPath();
	context.moveTo(1.5, 820.8);
	context.lineTo(597.5, 820.8);
	context.stroke();

// DESSIN DES CHEVEUX DU HAUT
    context.beginPath();
    context.moveTo(190.8, 105.7);
    context.bezierCurveTo(190.8, 105.7, 228.7, -74.6, 343.7, 57.8);
    context.strokeStyle = "rgb(0, 0, 0)";
    context.lineWidth = 5;
    context.stroke();
    context.beginPath();
    context.moveTo(388.0, 76.0);
    context.bezierCurveTo(342.8, -62.5, 232.8, 39.5, 227.6, 93.1);
    context.stroke();

// DESSIN DES CHEVEUX DU BAS
    context.beginPath();
    context.moveTo(124.5, 374.2);
    context.lineTo(138.7, 297.2);
    context.lineTo(162.7, 374.2);
    context.lineTo(184.7, 290.8);
    context.lineTo(204.0, 369.2);
    context.stroke();

// DESSIN DES YEUX
    context.beginPath();
    context.arc(326.2, 311.0, 8, 0, Math.PI * 2);
    context.arc(446.2, 315.0, 8, 0, Math.PI * 2);
	context.fill();

// ÉCRITURE DU TEXTE À CÔTÉ DU DESSIN
    context.font = "25pt Courier New";
    context.fillText("Quitte à faire", 690, 200);
    context.fillText("des lignes de code,", 690, 260);
    context.fillText("Autant faire", 690, 400);
    context.fillText("des lignes de design !", 690, 460);
}