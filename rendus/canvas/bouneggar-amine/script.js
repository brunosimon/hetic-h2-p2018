 // Enonce : Seul, vous devez réaliser un canvas dans lequel vous dessinerez ce que vous voudrez sans utiliser de librairie.
 // Difficulté du devoir : Tracer et placer les différentes formes aux coordonnées exactes en x et en y.
      
      function init() {

      var canvas = document.getElementById("canvas");  // Variable correspondant au DOM.
      var context = canvas.getContext("2d");           // Variable permettant de dessiner.

      draw(context);
    }

    function draw(context) {

      
      context.save();
      context.save();

      // Background : Mosaique de triangles multicolor

      // Ombre portée sur l'ensemble du tableau

      context.shadowColor   = 'purple';   // Couleur de l'ombre
      context.shadowBlur    = 100;       // Largeur du flou
      context.shadowOffsetX = 5;        // Décalage en X
      context.shadowOffsetY = 10;       // Décalage en Y


      // Triangle 
      context.save();
      context.beginPath();                // Commencer le dessin
      context.moveTo(139.0, 155.4);       // Placer le tracé
      context.lineTo(47.7, 291.2);        // Tracé une ligne
      context.lineTo(0.0, 255.6);
      context.lineTo(0.0, 246.9);
      context.lineTo(139.0, 155.4);
      context.closePath();                // Fermer le tracé
      context.fillStyle = "rgb(186, 133, 223)"; // Couleur de remplissage
      context.fill();                           // Faire apparaitre la forme finale

      // Triangle 
      context.beginPath();
      context.moveTo(226.0, 0.0);
      context.lineTo(164.9, 70.1);
      context.lineTo(14.3, 0.0);
      context.lineTo(226.0, 0.0);
      context.closePath();
      context.fillStyle     = 'rgba(255,0,0,1)';
      context.shadowColor   = 'blue';   
      context.shadowBlur    = 50;      
      context.shadowOffsetX = 5;        
      context.shadowOffsetY = 10;       
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(139.0, 736.5);
      context.lineTo(2.5, 799.1);
      context.lineTo(32.2, 659.3);
      context.lineTo(139.0, 736.5);
      context.closePath();
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(229.3, 256.7);
      context.lineTo(139.0, 155.4);
      context.lineTo(0.6, 0.0);
      context.lineTo(14.3, 0.0);
      context.lineTo(164.9, 70.1);
      context.lineTo(229.3, 256.7);
      context.closePath();
      context.fillStyle = "rgb(255, 89, 70)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(139.0, 155.4);
      context.lineTo(0.0, 246.9);
      context.lineTo(0.0, 122.4);
      context.lineTo(139.0, 155.4);
      context.closePath();
      context.fillStyle = "rgb(186, 216, 162)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(0.6, 0.0);
      context.lineTo(139.0, 155.4);
      context.lineTo(0.0, 122.4);
      context.lineTo(0.0, 0.0);
      context.lineTo(0.6, 0.0);
      context.closePath();
      context.fillStyle = "rgb(1, 207, 205)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(237.8, 0.0);
      context.lineTo(229.3, 256.7);
      context.lineTo(164.9, 70.1);
      context.lineTo(226.0, 0.0);
      context.lineTo(237.8, 0.0);
      context.closePath();
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 798.5);
      context.lineTo(800.0, 800.0);
      context.lineTo(792.5, 800.0);
      context.lineTo(574.1, 655.0);
      context.lineTo(593.4, 512.0);
      context.lineTo(800.0, 798.5);
      context.closePath();
      context.fillStyle = "rgb(255, 64, 117)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 780.5);
      context.lineTo(800.0, 798.5);
      context.lineTo(593.4, 512.0);
      context.lineTo(715.1, 596.6);
      context.lineTo(800.0, 780.5);
      context.closePath();
      context.fillStyle = "rgb(255, 89, 70)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 761.3);
      context.lineTo(800.0, 780.5);
      context.lineTo(715.1, 596.6);
      context.lineTo(746.6, 532.1);
      context.lineTo(800.0, 761.3);
      context.closePath();
      context.fillStyle = "rgb(255, 63, 26)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(800.0, 411.4);
      context.lineTo(800.0, 761.3);
      context.lineTo(746.6, 532.1);
      context.lineTo(800.0, 411.4);
      context.closePath();
      context.fillStyle = "rgb(0, 110, 116)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 399.9);
      context.lineTo(800.0, 411.4);
      context.lineTo(746.6, 532.1);
      context.lineTo(593.4, 512.0);
      context.lineTo(800.0, 399.9);
      context.closePath();
      context.fillStyle = "rgb(186, 216, 162)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 392.2);
      context.lineTo(800.0, 399.9);
      context.lineTo(593.4, 512.0);
      context.lineTo(629.6, 415.0);
      context.lineTo(800.0, 392.2);
      context.closePath();
      context.fillStyle = "rgb(200, 7, 72)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 388.9);
      context.lineTo(800.0, 392.2);
      context.lineTo(629.6, 415.0);
      context.lineTo(501.6, 319.8);
      context.lineTo(662.1, 357.0);
      context.lineTo(800.0, 388.9);
      context.closePath();
      context.fillStyle = "rgb(252, 247, 156)";
      context.fill();

      // Traingle 
      context.beginPath();
      context.moveTo(800.0, 253.8);
      context.lineTo(800.0, 388.9);
      context.lineTo(662.1, 357.0);
      context.lineTo(662.2, 356.4);
      context.lineTo(800.0, 253.8);
      context.closePath();
      context.fillStyle = "rgb(0, 138, 199)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 246.4);
      context.lineTo(800.0, 253.8);
      context.lineTo(662.2, 356.4);
      context.lineTo(752.6, 183.3);
      context.lineTo(800.0, 246.4);
      context.closePath();
      context.fillStyle = "rgb(255, 63, 26)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 2.1);
      context.lineTo(800.0, 246.4);
      context.lineTo(752.6, 183.3);
      context.lineTo(800.0, 2.1);
      context.closePath();
      context.fillStyle = "rgb(0, 194, 220)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(800.0, 0.0);
      context.lineTo(800.0, 2.1);
      context.lineTo(752.6, 183.3);
      context.lineTo(680.1, 0.0);
      context.lineTo(800.0, 0.0);
      context.closePath();
      context.fillStyle = "rgb(162, 77, 178)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(792.5, 800.0);
      context.lineTo(643.3, 800.0);
      context.lineTo(574.1, 655.0);
      context.lineTo(792.5, 800.0);
      context.closePath();
      context.fillStyle = "rgb(200, 7, 72)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(680.1, 0.0);
      context.lineTo(752.6, 183.3);
      context.lineTo(662.2, 356.4);
      context.lineTo(669.2, 3.5);
      context.lineTo(672.2, 0.0);
      context.lineTo(680.1, 0.0);
      context.closePath();
      context.fillStyle = "rgb(255, 89, 70)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(746.6, 532.1);
      context.lineTo(715.1, 596.6);
      context.lineTo(593.4, 512.0);
      context.lineTo(746.6, 532.1);
      context.closePath();
      context.fillStyle = "rgb(1, 175, 124)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(669.3, 0.0);
      context.lineTo(669.1, 0.9);
      context.lineTo(665.1, 8.3);
      context.lineTo(483.7, 222.0);
      context.lineTo(499.3, 99.2);
      context.lineTo(669.3, 0.0);
      context.closePath();
      context.fillStyle = "rgb(255, 63, 26)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(669.3, 0.0);
      context.lineTo(499.3, 99.2);
      context.lineTo(499.3, 31.9);
      context.lineTo(647.8, 0.0);
      context.lineTo(669.3, 0.0);
      context.closePath();
      context.fillStyle = "rgb(186, 216, 162)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(669.2, 3.5);
      context.lineTo(662.2, 356.4);
      context.lineTo(611.5, 247.1);
      context.lineTo(668.2, 4.7);
      context.lineTo(669.2, 3.5);
      context.closePath();
      context.fillStyle = "rgb(220, 53, 83)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(665.1, 8.3);
      context.lineTo(668.2, 4.7);
      context.lineTo(611.5, 247.1);
      context.lineTo(499.3, 318.0);
      context.lineTo(665.1, 8.3);
      context.closePath();
      context.fillStyle = "rgb(255, 64, 117)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(483.7, 222.0);
      context.lineTo(665.1, 8.3);
      context.lineTo(499.3, 318.0);
      context.lineTo(483.2, 226.4);
      context.lineTo(483.7, 222.0);
      context.closePath();
      context.fillStyle = "rgb(200, 7, 72)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(611.5, 247.1);
      context.lineTo(662.2, 356.4);
      context.lineTo(662.1, 357.0);
      context.lineTo(501.6, 319.8);
      context.lineTo(499.3, 318.0);
      context.lineTo(611.5, 247.1);
      context.closePath();
      context.fillStyle = "rgb(255, 118, 177)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(647.8, 0.0);
      context.lineTo(499.3, 31.9);
      context.lineTo(237.8, 0.0);
      context.lineTo(647.8, 0.0);
      context.closePath();
      context.fillStyle = "rgb(1, 175, 124)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(574.1, 655.0);
      context.lineTo(643.3, 800.0);
      context.lineTo(643.3, 800.0);
      context.lineTo(363.0, 637.0);
      context.lineTo(574.1, 655.0);
      context.closePath();
      context.fillStyle = "rgb(255, 208, 24)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(363.0, 637.0);
      context.lineTo(643.3, 800.0);
      context.lineTo(422.8, 745.1);
      context.lineTo(363.0, 637.0);
      context.lineTo(363.0, 637.0);
      context.closePath();
      context.fillStyle = "rgb(1, 175, 124)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(643.3, 800.0);
      context.lineTo(352.0, 800.0);
      context.lineTo(350.7, 798.8);
      context.lineTo(422.8, 745.1);
      context.lineTo(643.3, 800.0);
      context.closePath();
      context.fillStyle = "rgb(0, 138, 199)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(629.6, 415.0);
      context.lineTo(593.4, 512.0);
      context.lineTo(499.9, 319.4);
      context.lineTo(501.6, 319.8);
      context.lineTo(629.6, 415.0);
      context.closePath();
      context.fillStyle = "rgb(255, 208, 24)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(499.9, 319.4);
      context.lineTo(593.4, 512.0);
      context.lineTo(482.6, 483.2);
      context.lineTo(499.1, 319.2);
      context.lineTo(499.9, 319.4);
      context.closePath();
      context.fillStyle = "rgb(255, 64, 117)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(593.4, 512.0);
      context.lineTo(574.1, 655.0);
      context.lineTo(519.2, 612.6);
      context.lineTo(593.4, 512.0);
      context.closePath();
      context.fillStyle = "rgb(186, 133, 223)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(593.4, 512.0);
      context.lineTo(519.2, 612.6);
      context.lineTo(363.0, 637.0);
      context.lineTo(593.4, 512.0);
      context.closePath();
      context.fillStyle = "rgb(220, 53, 83)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(593.4, 512.0);
      context.lineTo(363.0, 637.0);
      context.lineTo(363.0, 637.0);
      context.lineTo(482.6, 483.2);
      context.lineTo(593.4, 512.0);
      context.closePath();
      context.fillStyle = "rgb(200, 7, 72)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(574.1, 655.0);
      context.lineTo(363.0, 637.0);
      context.lineTo(519.2, 612.6);
      context.lineTo(574.1, 655.0);
      context.closePath();
      context.fillStyle = "rgb(252, 247, 156)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(499.3, 31.9);
      context.lineTo(499.3, 99.2);
      context.lineTo(237.8, 0.0);
      context.lineTo(499.3, 31.9);
      context.closePath();
      context.fillStyle = "rgb(0, 110, 116)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(499.3, 99.2);
      context.lineTo(229.3, 256.7);
      context.lineTo(283.1, 109.9);
      context.lineTo(499.3, 99.2);
      context.closePath();
      context.fillStyle = "rgb(0, 194, 220)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(229.3, 256.7);
      context.lineTo(499.3, 99.2);
      context.lineTo(483.7, 222.0);
      context.lineTo(482.6, 223.3);
      context.lineTo(229.3, 256.7);
      context.closePath();
      context.fillStyle = "rgb(252, 247, 156)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(483.2, 226.4);
      context.lineTo(499.3, 318.0);
      context.lineTo(496.4, 318.6);
      context.lineTo(229.3, 256.7);
      context.lineTo(482.6, 223.3);
      context.lineTo(483.2, 226.4);
      context.closePath();
      context.fillStyle = "rgb(255, 89, 70)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(499.3, 99.2);
      context.lineTo(283.1, 109.9);
      context.lineTo(237.8, 0.0);
      context.lineTo(499.3, 99.2);
      context.closePath();
      context.fillStyle = "rgb(0, 138, 199)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(499.1, 319.2);
      context.lineTo(482.6, 483.2);
      context.lineTo(381.0, 427.0);
      context.lineTo(498.2, 319.0);
      context.lineTo(499.1, 319.2);
      context.closePath();
      context.fillStyle = "rgb(255, 118, 177)";
      context.fill();

      // Triangle 
      context.beginPath();
      context.moveTo(498.2, 319.0);
      context.lineTo(381.0, 427.0);
      context.lineTo(385.9, 340.1);
      context.lineTo(496.4, 318.6);
      context.lineTo(498.2, 319.0);
      context.closePath();
      context.fillStyle = "rgb(255, 208, 24)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(496.4, 318.6);
      context.lineTo(385.9, 340.1);
      context.lineTo(229.3, 256.7);
      context.lineTo(496.4, 318.6);
      context.closePath();
      context.fillStyle = "rgb(220, 53, 83)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(482.6, 483.2);
      context.lineTo(363.0, 637.0);
      context.lineTo(381.0, 427.0);
      context.lineTo(482.6, 483.2);
      context.closePath();
      context.fillStyle = "rgb(186, 216, 162)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(363.0, 637.0);
      context.lineTo(422.8, 745.1);
      context.lineTo(350.7, 798.8);
      context.lineTo(349.3, 797.3);
      context.lineTo(363.0, 637.0);
      context.closePath();
      context.fillStyle = "rgb(0, 194, 220)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(385.9, 340.1);
      context.lineTo(381.0, 427.0);
      context.lineTo(229.3, 256.7);
      context.lineTo(385.9, 340.1);
      context.closePath();
      context.fillStyle = "rgb(252, 247, 156)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(229.3, 256.7);
      context.lineTo(381.0, 427.0);
      context.lineTo(234.3, 323.9);
      context.lineTo(139.0, 155.4);
      context.lineTo(229.3, 256.7);
      context.closePath();
      context.fillStyle = "rgb(255, 118, 177)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(381.0, 427.0);
      context.lineTo(363.0, 637.0);
      context.lineTo(329.6, 497.6);
      context.lineTo(381.0, 427.0);
      context.closePath();
      context.fillStyle = "rgb(252, 247, 156)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(381.0, 427.0);
      context.lineTo(329.6, 497.6);
      context.lineTo(139.1, 588.1);
      context.lineTo(234.2, 524.8);
      context.lineTo(381.0, 427.0);
      context.closePath();
      context.fillStyle = "rgb(200, 7, 72)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(381.0, 427.0);
      context.lineTo(234.2, 524.8);
      context.lineTo(234.3, 323.9);
      context.lineTo(381.0, 427.0);
      context.closePath();
      context.fillStyle = "rgb(220, 53, 83)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(363.0, 637.0);
      context.lineTo(363.0, 637.0);
      context.lineTo(267.1, 616.1);
      context.lineTo(329.6, 497.6);
      context.lineTo(363.0, 637.0);
      context.closePath();
      context.fillStyle = "rgb(255, 118, 177)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(363.0, 637.0);
      context.lineTo(363.0, 637.0);
      context.lineTo(349.3, 797.3);
      context.lineTo(347.4, 795.4);
      context.lineTo(302.6, 673.1);
      context.lineTo(363.0, 637.0);
      context.closePath();
      context.fillStyle = "rgb(255, 89, 70)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(363.0, 637.0);
      context.lineTo(302.6, 673.1);
      context.lineTo(139.0, 588.1);
      context.lineTo(267.1, 616.1);
      context.lineTo(363.0, 637.0);
      context.closePath();
      context.fillStyle = "rgb(255, 64, 117)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(348.7, 799.2);
      context.lineTo(349.0, 800.0);
      context.lineTo(344.5, 800.0);
      context.lineTo(139.0, 736.5);
      context.lineTo(190.8, 699.6);
      context.lineTo(348.7, 799.2);
      context.closePath();
      context.fillStyle = "rgb(0, 138, 199)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(347.4, 795.4);
      context.lineTo(348.7, 799.2);
      context.lineTo(190.8, 699.6);
      context.lineTo(139.0, 588.1);
      context.lineTo(347.4, 795.4);
      context.closePath();
      context.fillStyle = "rgb(0, 110, 116)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(347.4, 795.4);
      context.lineTo(139.0, 588.1);
      context.lineTo(302.6, 673.1);
      context.lineTo(347.4, 795.4);
      context.closePath();
      context.fillStyle = "rgb(255, 63, 26)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(344.5, 800.0);
      context.lineTo(2.4, 800.0);
      context.lineTo(2.5, 799.1);
      context.lineTo(139.0, 736.5);
      context.lineTo(344.5, 800.0);
      context.closePath();
      context.fillStyle = "rgb(162, 77, 178)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(329.6, 497.6);
      context.lineTo(267.1, 616.1);
      context.lineTo(139.0, 588.1);
      context.lineTo(139.1, 588.1);
      context.lineTo(329.6, 497.6);
      context.closePath();
      context.fillStyle = "rgb(220, 53, 83)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(237.8, 0.0);
      context.lineTo(283.1, 109.9);
      context.lineTo(229.3, 256.7);
      context.lineTo(237.8, 0.0);
      context.closePath();
      context.fillStyle = "rgb(0, 82, 202)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(139.0, 155.4);
      context.lineTo(234.3, 323.9);
      context.lineTo(234.2, 524.8);
      context.lineTo(139.0, 155.4);
      context.closePath();
      context.fillStyle = "rgb(255, 64, 117)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(139.0, 155.4);
      context.lineTo(234.2, 524.8);
      context.lineTo(139.0, 461.5);
      context.lineTo(139.0, 155.4);
      context.closePath();
      context.fillStyle = "rgb(200, 7, 72)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(234.2, 524.8);
      context.lineTo(139.1, 588.1);
      context.lineTo(139.0, 588.1);
      context.lineTo(139.0, 461.5);
      context.lineTo(234.2, 524.8);
      context.closePath();
      context.fillStyle = "rgb(255, 89, 70)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(139.0, 588.1);
      context.lineTo(190.8, 699.6);
      context.lineTo(139.0, 736.5);
      context.lineTo(139.0, 588.1);
      context.closePath();
      context.fillStyle = "rgb(1, 175, 124)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(139.0, 588.1);
      context.lineTo(139.0, 736.5);
      context.lineTo(32.2, 659.3);
      context.lineTo(139.0, 588.1);
      context.closePath();
      context.fillStyle = "rgb(186, 216, 162)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(139.0, 461.5);
      context.lineTo(139.0, 588.1);
      context.lineTo(32.2, 659.3);
      context.lineTo(139.0, 461.5);
      context.closePath();
      context.fillStyle = "rgb(255, 63, 26)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(139.0, 155.4);
      context.lineTo(139.0, 461.5);
      context.lineTo(32.2, 659.3);
      context.lineTo(101.7, 331.4);
      context.lineTo(101.7, 331.4);
      context.lineTo(139.0, 155.4);
      context.closePath();
      context.fillStyle = "rgb(255, 208, 24)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(139.0, 155.4);
      context.lineTo(101.7, 331.4);
      context.lineTo(47.7, 291.2);
      context.lineTo(139.0, 155.4);
      context.closePath();
      context.fillStyle = "rgb(162, 77, 178)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(101.7, 331.4);
      context.lineTo(101.7, 331.4);
      context.lineTo(0.0, 375.4);
      context.lineTo(0.0, 375.4);
      context.lineTo(0.0, 255.6);
      context.lineTo(47.7, 291.2);
      context.lineTo(101.7, 331.4);
      context.closePath();
      context.fillStyle = "rgb(0, 194, 220)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(1.3, 486.9);
      context.lineTo(0.0, 488.8);
      context.lineTo(0.0, 375.4);
      context.lineTo(0.0, 375.4);
      context.lineTo(101.7, 331.4);
      context.lineTo(1.3, 486.9);
      context.closePath();
      context.fillStyle = "rgb(0, 138, 199)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(1.3, 486.9);
      context.lineTo(101.7, 331.4);
      context.lineTo(32.2, 659.3);
      context.lineTo(1.3, 486.9);
      context.closePath();
      context.fillStyle = "rgb(0, 110, 116)";
      context.fill();

      // Triangle
      context.beginPath();
      context.moveTo(1.3, 486.9);
      context.lineTo(32.2, 659.3);
      context.lineTo(2.5, 799.1);
      context.lineTo(0.6, 800.0);
      context.lineTo(0.0, 800.0);
      context.lineTo(0.0, 488.8);
      context.lineTo(1.3, 486.9);
      context.closePath();
      context.fillStyle = "rgb(0, 82, 202)";
      context.fill();
      

      // Encadrement exterieur du tableau avec contours arrondis
      context.restore();
      context.beginPath();
      context.moveTo(806.5, 794.6);
      context.bezierCurveTo(806.5, 801.2, 801.2, 806.5, 794.6, 806.5);
      context.lineTo(18.4, 806.5);
      context.bezierCurveTo(11.8, 806.5, 6.5, 801.2, 6.5, 794.6);
      context.lineTo(6.5, 18.4);
      context.bezierCurveTo(6.5, 11.8, 11.8, 6.5, 18.4, 6.5);
      context.lineTo(794.6, 6.5);
      context.bezierCurveTo(801.2, 6.5, 806.5, 11.8, 806.5, 18.4);
      context.lineTo(806.5, 794.6);
      context.closePath();
      context.lineWidth = 23.0;
      context.stroke();
      context.restore();
    }
    
