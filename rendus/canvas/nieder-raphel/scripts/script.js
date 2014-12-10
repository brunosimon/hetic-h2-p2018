 function init() {

      var canvas = document.getElementById("canvas");
      var context = canvas.getContext("2d");

      draw(context);
    }

    function draw(context) {

      // Herbe
      context.save();
      context.beginPath();
      context.moveTo(800.4, 337.7);
      context.lineTo(0.5, 337.7);
      context.lineTo(0.5, 0.0);
      context.lineTo(800.4, 0.0);
      context.lineTo(800.4, 337.7);
      context.closePath();
      context.fillStyle = "rgb(31, 84, 38)";
      context.fill();

      // Bitume
      context.beginPath();
      context.moveTo(800.4, 509.9);
      context.lineTo(0.5, 509.9);
      context.lineTo(0.5, 337.7);
      context.lineTo(800.4, 337.7);
      context.lineTo(800.4, 509.9);
      context.closePath();
      context.fillStyle = "rgb(50, 60, 57)";
      context.fill();
      context.strokeStyle = "rgb(2, 4, 5)";
      context.stroke();

      // Neige
      context.beginPath();
      context.moveTo(0.5, 337.7);
      context.bezierCurveTo(0.5, 337.7, -4.5, 355.0, 32.5, 375.0);
      context.bezierCurveTo(32.5, 375.0, 54.7, 385.0, 78.1, 375.0);
      context.bezierCurveTo(78.1, 375.0, 119.0, 374.5, 137.2, 375.5);
      context.bezierCurveTo(137.2, 375.5, 190.1, 379.5, 196.3, 382.5);
      context.bezierCurveTo(196.3, 382.5, 304.0, 402.5, 310.7, 400.5);
      context.bezierCurveTo(310.7, 400.5, 421.0, 424.0, 436.5, 420.5);
      context.bezierCurveTo(436.5, 420.5, 475.5, 428.2, 510.5, 420.9);
      context.bezierCurveTo(510.5, 420.9, 583.7, 403.5, 598.6, 395.0);
      context.bezierCurveTo(598.6, 395.0, 629.3, 386.0, 646.6, 383.5);
      context.bezierCurveTo(646.6, 383.5, 779.0, 388.5, 784.5, 374.0);
      context.bezierCurveTo(784.5, 374.0, 795.5, 378.5, 800.5, 349.5);
      context.bezierCurveTo(800.5, 349.5, 801.0, 317.2, 791.0, 312.3);
      context.bezierCurveTo(791.0, 312.3, 763.0, 291.2, 769.5, 272.6);
      context.bezierCurveTo(769.5, 272.6, 740.9, 243.3, 711.5, 248.4);
      context.lineTo(540.9, 245.5);
      context.bezierCurveTo(540.9, 245.5, 519.3, 241.7, 518.1, 241.6);
      context.bezierCurveTo(516.9, 241.6, 499.8, 235.7, 497.4, 239.6);
      context.bezierCurveTo(495.1, 243.4, 391.2, 247.0, 391.2, 247.0);
      context.bezierCurveTo(391.2, 247.0, 370.5, 254.7, 340.0, 256.6);
      context.lineTo(222.2, 247.4);
      context.bezierCurveTo(222.2, 247.4, 185.6, 248.9, 177.6, 250.9);
      context.lineTo(84.4, 259.9);
      context.bezierCurveTo(84.4, 259.9, 73.5, 254.3, 67.0, 259.9);
      context.bezierCurveTo(67.0, 259.9, -1.5, 296.0, 0.5, 337.7);
      context.fillStyle = "rgb(255, 255, 255)";
      context.fill();
      context.restore();

      // Bande jaune bonnet
      context.save();
      context.beginPath();
      context.moveTo(339.6, 234.6);
      context.lineTo(342.6, 234.6);
      context.bezierCurveTo(342.6, 234.6, 372.6, 213.4, 417.0, 212.0);
      context.bezierCurveTo(417.0, 212.0, 463.7, 210.2, 489.5, 224.5);
      context.bezierCurveTo(489.5, 224.5, 491.4, 225.1, 491.6, 224.2);
      context.bezierCurveTo(491.6, 224.2, 493.9, 221.9, 491.6, 220.7);
      context.lineTo(489.5, 219.5);
      context.bezierCurveTo(489.5, 219.5, 451.5, 203.4, 416.1, 206.0);
      context.bezierCurveTo(416.1, 206.0, 372.1, 208.9, 341.7, 228.9);
      context.lineTo(339.6, 230.6);
      context.bezierCurveTo(339.6, 230.6, 338.0, 231.7, 339.6, 234.6);
      context.closePath();
      context.fillStyle = "rgb(243, 220, 2)";
      context.fill();
      context.strokeStyle = "rgb(4, 6, 5)";
      context.stroke();

      // Partie bleue bonnet
      context.beginPath();
      context.moveTo(341.7, 228.9);
      context.bezierCurveTo(341.7, 228.9, 345.1, 190.1, 391.1, 177.4);
      context.bezierCurveTo(391.1, 177.4, 422.9, 169.4, 437.2, 176.0);
      context.bezierCurveTo(437.2, 176.0, 481.4, 185.7, 489.5, 219.5);
      context.bezierCurveTo(489.5, 219.5, 443.7, 201.5, 420.1, 205.7);
      context.bezierCurveTo(420.1, 205.7, 364.9, 209.9, 341.7, 228.9);
      context.closePath();
      context.fillStyle = "rgb(61, 172, 182)";
      context.fill();
      context.stroke();

      // ponpon
      context.beginPath();
      context.moveTo(391.8, 177.2);
      context.bezierCurveTo(391.8, 177.2, 390.4, 180.0, 393.7, 180.7);
      context.lineTo(399.6, 181.3);
      context.lineTo(403.9, 176.1);
      context.lineTo(404.4, 176.1);
      context.lineTo(404.7, 176.1);
      context.lineTo(404.7, 179.7);
      context.bezierCurveTo(404.7, 179.7, 405.7, 184.2, 410.7, 180.9);
      context.bezierCurveTo(410.7, 180.9, 412.4, 180.0, 412.0, 179.1);
      context.lineTo(414.7, 179.4);
      context.bezierCurveTo(414.7, 179.4, 415.1, 178.5, 417.2, 181.7);
      context.bezierCurveTo(417.2, 181.7, 420.1, 182.5, 422.2, 181.6);
      context.bezierCurveTo(422.2, 181.6, 423.5, 181.4, 424.5, 179.4);
      context.bezierCurveTo(424.5, 179.4, 424.9, 178.0, 427.8, 179.9);
      context.bezierCurveTo(427.8, 179.9, 435.5, 181.7, 436.7, 176.1);
      context.bezierCurveTo(436.7, 176.1, 437.4, 172.9, 434.2, 171.1);
      context.bezierCurveTo(434.2, 171.1, 430.9, 169.7, 428.7, 171.6);
      context.bezierCurveTo(428.7, 171.6, 427.4, 169.9, 426.9, 169.9);
      context.bezierCurveTo(426.9, 169.9, 426.1, 169.0, 425.0, 169.9);
      context.bezierCurveTo(425.0, 169.9, 422.9, 169.0, 423.1, 167.2);
      context.bezierCurveTo(423.1, 167.2, 417.1, 165.7, 416.0, 167.2);
      context.bezierCurveTo(416.0, 167.2, 416.6, 167.0, 415.6, 167.8);
      context.bezierCurveTo(415.6, 167.8, 412.9, 166.7, 411.3, 167.7);
      context.bezierCurveTo(411.3, 167.7, 410.6, 168.2, 410.0, 168.8);
      context.bezierCurveTo(410.0, 168.8, 403.9, 167.9, 403.9, 168.7);
      context.bezierCurveTo(403.9, 168.7, 400.5, 169.4, 400.5, 170.6);
      context.bezierCurveTo(400.5, 170.6, 400.0, 171.3, 400.0, 171.9);
      context.bezierCurveTo(400.0, 171.9, 400.2, 172.4, 399.5, 172.6);
      context.lineTo(395.5, 172.7);
      context.bezierCurveTo(395.5, 172.7, 391.9, 171.7, 391.8, 177.2);
      context.closePath();
      context.fillStyle = "rgb(209, 199, 18)";
      context.fill();
      context.strokeStyle = "rgb(211, 199, 56)";
      context.stroke();

      // Visage
      context.beginPath();
      context.moveTo(341.7, 235.3);
      context.bezierCurveTo(341.7, 235.3, 339.5, 246.0, 346.5, 258.8);
      context.bezierCurveTo(346.5, 258.8, 359.9, 285.8, 389.7, 293.3);
      context.bezierCurveTo(389.7, 293.3, 420.2, 304.0, 448.4, 291.8);
      context.bezierCurveTo(448.4, 291.8, 476.0, 282.3, 486.5, 258.8);
      context.bezierCurveTo(486.5, 258.8, 494.9, 240.7, 491.1, 224.7);
      context.bezierCurveTo(491.1, 224.7, 457.5, 210.3, 425.9, 212.0);
      context.bezierCurveTo(425.9, 212.0, 376.1, 210.2, 341.7, 235.3);
      context.closePath();
      context.fillStyle = "rgb(218, 182, 140)";
      context.fill();
      context.strokeStyle = "rgb(4, 6, 5)";
      context.stroke();

      // Bouche
      context.beginPath();
      context.moveTo(414.1, 273.7);
      context.bezierCurveTo(414.1, 273.7, 422.2, 279.5, 431.5, 275.5);
      context.stroke();

      // 1er menton
      context.beginPath();
      context.moveTo(408.7, 284.0);
      context.bezierCurveTo(408.7, 284.0, 423.4, 289.0, 434.7, 284.0);
      context.stroke();

      // 2eme menton
      context.beginPath();
      context.moveTo(358.9, 269.0);
      context.bezierCurveTo(358.9, 269.0, 376.2, 292.3, 417.7, 291.5);
      context.bezierCurveTo(417.7, 291.5, 445.4, 295.0, 478.2, 265.5);
      context.stroke();

      // Oeil gauche
      context.beginPath();
      context.moveTo(386.8, 225.3);
      context.bezierCurveTo(393.4, 215.4, 405.3, 211.7, 413.5, 217.1);
      context.bezierCurveTo(421.6, 222.6, 422.9, 235.0, 416.4, 244.9);
      context.bezierCurveTo(409.8, 254.8, 397.9, 258.4, 389.7, 253.0);
      context.bezierCurveTo(381.5, 247.6, 380.2, 235.1, 386.8, 225.3);
      context.closePath();
      context.fillStyle = "rgb(255, 255, 255)";
      context.fill();

      // Oeil droit
      context.beginPath();
      context.moveTo(454.3, 225.3);
      context.bezierCurveTo(447.7, 215.4, 435.8, 211.7, 427.6, 217.1);
      context.bezierCurveTo(419.5, 222.6, 418.2, 235.0, 424.7, 244.9);
      context.bezierCurveTo(431.3, 254.8, 443.2, 258.4, 451.4, 253.0);
      context.bezierCurveTo(459.6, 247.6, 460.9, 235.1, 454.3, 225.3);
      context.closePath();
      context.fill();

      // Pupille gauche
      context.beginPath();
      context.moveTo(405.4, 234.6);
      context.bezierCurveTo(405.4, 235.8, 406.3, 236.8, 407.5, 236.8);
      context.bezierCurveTo(408.7, 236.8, 409.7, 235.8, 409.7, 234.6);
      context.bezierCurveTo(409.7, 233.4, 408.7, 232.4, 407.5, 232.4);
      context.bezierCurveTo(406.3, 232.4, 405.4, 233.4, 405.4, 234.6);
      context.closePath();
      context.fillStyle = "rgb(2, 4, 5)";
      context.fill();

      // Pupille droite
      context.beginPath();
      context.moveTo(429.4, 234.8);
      context.bezierCurveTo(429.4, 236.0, 430.3, 236.9, 431.5, 236.9);
      context.bezierCurveTo(432.7, 236.9, 433.7, 236.0, 433.7, 234.8);
      context.bezierCurveTo(433.7, 233.6, 432.7, 232.6, 431.5, 232.6);
      context.bezierCurveTo(430.3, 232.6, 429.4, 233.6, 429.4, 234.8);
      context.closePath();
      context.fill();

      // Manteau
      context.beginPath();
      context.moveTo(486.5, 258.8);
      context.bezierCurveTo(486.5, 258.8, 501.5, 259.5, 507.9, 276.9);
      context.lineTo(510.2, 306.7);
      context.bezierCurveTo(510.2, 306.7, 515.2, 322.5, 498.4, 330.0);
      context.bezierCurveTo(498.4, 330.0, 469.7, 333.5, 462.7, 333.0);
      context.bezierCurveTo(462.7, 333.0, 457.7, 333.3, 457.7, 334.2);
      context.bezierCurveTo(457.7, 334.2, 450.5, 335.5, 443.2, 340.3);
      context.bezierCurveTo(443.2, 340.3, 429.7, 343.5, 426.7, 342.5);
      context.bezierCurveTo(426.7, 342.5, 398.2, 344.7, 395.7, 342.7);
      context.bezierCurveTo(395.7, 342.7, 381.2, 344.4, 378.7, 343.5);
      context.bezierCurveTo(378.7, 343.5, 370.0, 345.4, 369.5, 343.8);
      context.bezierCurveTo(369.5, 343.8, 364.2, 345.8, 362.2, 343.2);
      context.bezierCurveTo(362.2, 343.2, 336.0, 334.7, 335.2, 331.2);
      context.bezierCurveTo(335.2, 331.2, 323.2, 329.6, 329.4, 318.1);
      context.lineTo(327.6, 311.3);
      context.lineTo(320.9, 284.0);
      context.bezierCurveTo(320.9, 284.0, 335.4, 259.8, 346.5, 258.8);
      context.bezierCurveTo(346.5, 258.8, 361.1, 284.3, 380.0, 290.0);
      context.bezierCurveTo(380.0, 290.0, 419.2, 304.9, 444.0, 293.5);
      context.bezierCurveTo(444.0, 293.5, 476.9, 282.5, 486.5, 258.8);
      context.closePath();
      context.fillStyle = "rgb(229, 35, 52)";
      context.fill();
      context.strokeStyle = "rgb(2, 4, 5)";
      context.stroke();

      // Mouffle droite
      context.beginPath();
      context.moveTo(484.5, 302.5);
      context.bezierCurveTo(484.5, 302.5, 482.9, 297.5, 484.5, 296.8);
      context.bezierCurveTo(486.2, 296.2, 486.2, 288.3, 496.4, 278.6);
      context.bezierCurveTo(496.4, 278.6, 506.7, 276.3, 510.0, 276.9);
      context.bezierCurveTo(510.0, 276.9, 508.6, 278.6, 510.9, 278.6);
      context.bezierCurveTo(510.9, 278.6, 512.2, 276.3, 514.9, 278.6);
      context.bezierCurveTo(514.9, 278.6, 523.7, 295.8, 514.9, 304.7);
      context.bezierCurveTo(514.9, 304.7, 515.9, 307.3, 510.9, 306.0);
      context.bezierCurveTo(511.6, 306.2, 507.7, 307.1, 502.2, 306.4);
      context.bezierCurveTo(502.2, 306.4, 497.2, 301.8, 494.7, 303.5);
      context.bezierCurveTo(494.7, 303.5, 489.9, 304.8, 487.7, 303.7);
      context.bezierCurveTo(485.5, 302.5, 484.5, 302.5, 484.5, 302.5);
      context.closePath();
      context.fillStyle = "rgb(206, 205, 26)";
      context.fill();
      context.stroke();

      // Mouffle gauche
      context.beginPath();
      context.moveTo(327.7, 311.7);
      context.bezierCurveTo(327.7, 311.7, 344.4, 312.4, 347.7, 311.7);
      context.bezierCurveTo(347.7, 311.7, 351.9, 312.6, 352.9, 306.6);
      context.bezierCurveTo(352.9, 306.6, 353.4, 301.0, 351.0, 299.0);
      context.bezierCurveTo(351.0, 299.0, 346.5, 297.0, 347.0, 294.8);
      context.bezierCurveTo(347.0, 294.8, 345.2, 291.1, 343.2, 291.6);
      context.bezierCurveTo(343.2, 291.6, 338.5, 287.1, 331.4, 286.2);
      context.bezierCurveTo(331.4, 286.2, 329.0, 283.8, 321.5, 284.0);
      context.bezierCurveTo(321.5, 284.0, 320.0, 283.3, 317.2, 286.2);
      context.bezierCurveTo(317.2, 286.2, 311.0, 293.1, 317.7, 306.6);
      context.bezierCurveTo(317.7, 306.6, 318.2, 309.4, 327.7, 311.7);
      context.closePath();
      context.fill();
      context.stroke();

      // Zip
      context.beginPath();
      context.moveTo(426.9, 298.0);
      context.bezierCurveTo(426.9, 298.0, 429.5, 301.7, 428.0, 305.8);
      context.bezierCurveTo(428.0, 305.8, 425.8, 337.0, 427.7, 338.2);
      context.bezierCurveTo(427.7, 338.2, 428.7, 339.7, 426.9, 341.2);
      context.stroke();

            // Bouton 1
      context.beginPath();
      context.moveTo(424.9, 335.7);
      context.bezierCurveTo(424.9, 336.8, 423.9, 337.7, 422.7, 337.7);
      context.bezierCurveTo(421.5, 337.7, 420.5, 336.8, 420.5, 335.7);
      context.bezierCurveTo(420.5, 334.7, 421.5, 333.8, 422.7, 333.8);
      context.bezierCurveTo(423.9, 333.8, 424.9, 334.7, 424.9, 335.7);
      context.closePath();
      context.fill();
      context.stroke();

            // Bouton 2
      context.beginPath();
      context.moveTo(425.5, 318.2);
      context.bezierCurveTo(425.5, 319.6, 424.8, 320.7, 423.9, 320.7);
      context.bezierCurveTo(422.9, 320.7, 422.2, 319.6, 422.2, 318.2);
      context.bezierCurveTo(422.2, 316.9, 422.9, 315.8, 423.9, 315.8);
      context.bezierCurveTo(424.8, 315.8, 425.5, 316.9, 425.5, 318.2);
      context.closePath();
      context.fill();
      context.stroke();

      // Bouton 3
      context.beginPath();
      context.moveTo(423.9, 301.6);
      context.bezierCurveTo(423.9, 302.8, 423.1, 303.8, 422.2, 303.8);
      context.bezierCurveTo(421.3, 303.8, 420.5, 302.8, 420.5, 301.6);
      context.bezierCurveTo(420.5, 300.3, 421.3, 299.3, 422.2, 299.3);
      context.bezierCurveTo(423.1, 299.3, 423.9, 300.3, 423.9, 301.6);
      context.closePath();
      context.fillStyle = "rgb(2, 2, 3)";
      context.fill();
      context.stroke();


      // Pantalon
      context.beginPath();
      context.moveTo(498.4, 330.0);
      context.lineTo(490.0, 351.5);
      context.lineTo(494.2, 352.7);
      context.lineTo(495.5, 352.7);
      context.lineTo(495.5, 353.5);
      context.lineTo(341.4, 353.5);
      context.bezierCurveTo(341.4, 353.5, 337.0, 355.5, 338.6, 350.1);
      context.lineTo(342.1, 350.6);
      context.lineTo(335.4, 331.5);
      context.lineTo(361.5, 342.9);
      context.bezierCurveTo(361.5, 342.9, 362.7, 345.6, 369.0, 344.0);
      context.bezierCurveTo(369.0, 344.0, 375.3, 344.6, 378.7, 343.5);
      context.bezierCurveTo(378.7, 343.5, 391.8, 343.4, 395.2, 342.7);
      context.bezierCurveTo(395.7, 342.7, 420.3, 343.4, 427.7, 342.7);
      context.bezierCurveTo(427.7, 342.7, 439.9, 342.3, 443.2, 340.3);
      context.bezierCurveTo(443.2, 340.3, 451.6, 334.1, 457.7, 334.2);
      context.bezierCurveTo(457.7, 334.2, 460.7, 331.8, 465.9, 333.0);
      context.lineTo(498.4, 330.0);
      context.closePath();
      context.fillStyle = "rgb(61, 55, 23)";
      context.fill();
      context.stroke();

      // Pieds
      context.beginPath();
      context.moveTo(338.2, 349.5);
      context.lineTo(342.1, 350.6);
      context.bezierCurveTo(342.1, 350.6, 356.7, 351.7, 362.6, 348.2);
      context.bezierCurveTo(362.6, 348.2, 366.9, 350.0, 372.0, 347.5);
      context.lineTo(405.6, 347.5);
      context.bezierCurveTo(405.6, 347.5, 408.7, 347.0, 409.5, 348.2);
      context.bezierCurveTo(409.5, 348.2, 418.6, 352.5, 419.7, 351.6);
      context.bezierCurveTo(419.7, 351.6, 463.6, 341.5, 489.5, 351.7);
      context.lineTo(490.4, 351.6);
      context.bezierCurveTo(490.4, 351.6, 492.9, 352.3, 493.5, 352.5);
      context.bezierCurveTo(494.2, 352.7, 495.5, 352.7, 495.5, 352.7);
      context.lineTo(495.5, 353.5);
      context.lineTo(342.2, 353.9);
      context.bezierCurveTo(342.2, 353.9, 336.2, 356.6, 338.2, 349.5);
      context.closePath();
      context.fillStyle = "rgb(4, 4, 4)";
      context.fill();
      context.stroke();
      context.restore();  
       }
  