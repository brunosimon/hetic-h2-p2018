var canvas = document.getElementById('canvas'),
	context = canvas.getContext('2d'),
	body = document.querySelector('body');

	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;

//// Let's create the snow ////
	var snow = [];
	var max = 100;
	var W = window.innerWidth;
	var H = window.innerHeight;
  
    var Flake = function() {
        this.x= Math.random()*W;
        this.y=Math.random()*H;
        this.w=Math.random()*32;
        this.d = Math.random()*max;
        this.angle=0;
        this.img = new Image();
        this.imgSrc = [
            'img/flake1.png',
            'img/flake2.png',
            'img/flake3.png'
        ];
        this.r = Math.floor(Math.random() * (3)); //Getting random number between 0 and 3
        this.img.src = this.imgSrc[this.r]; //Getting index from random number

        this.draw=function(){
               context.drawImage(this.img, this.x, this.y, this.w, this.w);
         }
        this.update=function(c){
            if(this.angle <= 1){
                this.angle += 0.01;
            }else{
                this.angle -= 0.01;
            }

            this.x += Math.cos(this.angle+this.d) + 1 + this.w/8;
            this.y += Math.sin(this.angle)*2;


            if( (this.x>W+40) || (this.x<-40) || (this.y > H) )
            {
                      if(c%3>0) {
                          this.x = Math.random() * W;
                          this.y = -64;
                      }
                      else{
                          if(Math.sin(this.angle)>0){
                              this.x = -40;
                              this.y = Math.random()*H;
                          }
                          else{
                              this.x = W+40;
                              this.y = Math.random()*H;
                          }
                     }
            }
          }
        };

    //Create snow from flakes
    for(var i=0; i < max; i++)
    {
        snow.push(new Flake);
    }

    //Draw snow and update position
    function update(){
      for(var i=0; i < max; i++)
      {
        var f = snow[i];
        f.draw();
        f.update(i);
      }
    }

    //Fill background and call update function
    function render()
    {
       requestAnimationFrame(render, 40);
       context.clearRect(0, 0, W, H);
       sapling();
       fairyLights();
       drawText();
       drawButton();
       drawButtonText();
       update();
    }
    render();

    function sapling(){
		//// Draw the Saplink ////
		// 4th large face //
		context.beginPath();
		context.moveTo(250, 550); 
		context.lineTo(550, 600);
		context.lineTo(550, 540); 
		context.lineTo(250, 490); 
		context.closePath();
		context.fillStyle = '#2ecc71';
		context.fill();

		// 4th hidden face //
		context.beginPath();
		context.moveTo(250, 490);
		context.lineTo(400, 470);
		context.lineTo(520, 490);
		context.lineTo(390, 515);
		context.closePath();
		context.fillStyle = '#27ae60';
		context.fill();

		// 3td large face //
		context.beginPath();
		context.moveTo(280, 450);  
		context.lineTo(280, 400); 
		context.lineTo(520, 440);
		context.lineTo(520, 490);
		context.closePath();
		context.fillStyle = '#2ecc71';
		context.fill();

		// 3td hidden face //
		context.beginPath();
		context.moveTo(280, 400);
		context.lineTo(395, 370);
		context.lineTo(500, 390);
		context.lineTo(382, 418);
		context.closePath();
		context.fillStyle = '#27ae60';
		context.fill();

		// 2nd large face //
		context.beginPath();
		context.moveTo(310, 360); 
		context.lineTo(310, 320); 
		context.lineTo(500, 350); 
		context.lineTo(500, 390);
		context.closePath();
		context.fillStyle = '#2ecc71';
		context.fill();

		// 2nd hidden face //
		context.beginPath();
		context.moveTo(310, 320); 
		context.lineTo(380, 292);
		context.lineTo(470, 307); 
		context.lineTo(413, 337);
		context.closePath();
		context.fillStyle = '#27ae60';
		context.fill();

		// 1st large face //
		context.beginPath();
		context.moveTo(340, 285); 
		context.lineTo(340, 240); 
		context.lineTo(470, 263);
		context.lineTo(470, 307);
		context.closePath();
		context.fillStyle = '#2ecc71';
		context.fill();

		// 1st hidden face //
		context.beginPath();
		context.moveTo(340, 240); 
		context.lineTo(410, 210);
		context.lineTo(410, 252); 
		context.closePath()
		context.fillStyle = '#27ae60';
		context.fill();

		// Trunk 1st //
		context.beginPath();
		context.moveTo(380, 292);
		context.lineTo(430, 300);
		context.lineTo(430, 339);
		context.lineTo(380, 332);
		context.closePath();
		context.fillStyle = '#825a2c';
		context.fill();

		// Trunk 2nd //
		context.beginPath();
		context.moveTo(380, 372);
		context.lineTo(430, 380);
		context.lineTo(430, 425);
		context.lineTo(380, 417);
		context.closePath();
		context.fillStyle = '#825a2c';
		context.fill();

		// Trunk 3td //
		context.beginPath();
		context.moveTo(380, 467);
		context.lineTo(430, 475);
		context.lineTo(430, 520);
		context.lineTo(380, 513);
		context.closePath();
		context.fillStyle = '#825a2c';
		context.fill();

		// Trunk Base //
		context.beginPath();
		context.moveTo(380, 572);
		context.lineTo(430, 580);
		context.lineTo(430, 640);
		context.lineTo(380, 640);
		context.closePath();
		context.fillStyle = '#825a2c';
		context.fill();
	}

	function fairyLights(){
		// Star //   ---> Better without it
		// context.beginPath();
		// context.moveTo(410, 140);
		// context.lineTo(430, 170);
		// context.lineTo(460, 180);
		// context.lineTo(440, 200);
		// context.lineTo(450, 235);
		// context.lineTo(410, 215);
		// context.lineTo(370, 235);
		// context.lineTo(380, 200);
		// context.lineTo(360, 180);
		// context.lineTo(390, 170);
		// context.closePath();
		// context.fillStyle = '#f1c40f';
		// context.fill();

		// Top Balls //
		context.beginPath()
		context.arc(345, 375, 20, 0, 2*Math.PI);
		context.fillStyle = '#c0392b';
		context.fill();

		context.beginPath()
		context.arc(470, 400, 20, 0, 2*Math.PI);
		context.fillStyle = '#c0392b';
		context.fill();

		// Mid balls //
		context.beginPath()
		context.arc(365, 480, 20, 0, 2*Math.PI);
		context.fillStyle = '#c0392b';
		context.fill();

		context.beginPath()
		context.arc(485, 500, 20, 0, 2*Math.PI);
		context.fillStyle = '#c0392b';
		context.fill();

		// Bottom Balls //
		context.beginPath()
		context.arc(305, 575, 20, 0, 2*Math.PI);
		context.fillStyle = '#c0392b';
		context.fill();

		context.beginPath()
		context.arc(490, 590, 20, 0, 2*Math.PI);
		context.fillStyle = '#c0392b';
		context.fill();
	}

	//// Write the text ////
	function drawText(){
		var merry = 'Merry';
		var christmas = 'Christmas';

		context.font = 'lighter 40px Myriad Pro';
		context.textAlign = 'left';
		context.fillStyle = '#000000';
		context.textBaseline = 'bottom';
		context.fillText(merry, 540, 300);
		context.fillText(christmas, 540, 350);
	}

	//// Draw a button ////
	function drawButton(){
		context.beginPath();
		context.rect(540, 370, 180, 50);
		context.fillStyle = '#2ecc71';
		context.fill();
	}

	//// Draw button text ////
	function drawButtonText(){
		var ring = 'Let\'s ring';
		context.font = 'lighter 30px Myriad Pro';
		context.textAlign = 'left';
		context.fillStyle = '#26A65B';
		context.fillText(ring, 575, 410);
	}


    var elements = [];

	// Add elements
	elements.push({
	    width: 180,
	    height: 50,
	    top: 370,
	    left: 540
	});

	// Render elements.
	elements.forEach(function(button) {
	    context.fillRect(button.left, button.top, button.width, button.height);
	});

	var soundFile = new Audio('media/jingle_bells.mp3');
	// Add event listener on the button
	canvas.addEventListener('click', function(e) {
	    var x = e.pageX - canvas.offsetLeft,
	        y = e.pageY - canvas.offsetTop;
	    console.log(x, y);
	    elements.forEach(function(button) {
	        if (y > button.top && y < button.top + button.height && x > button.left && x < button.left + button.width) {
	        	// Adding sound //
	        	if(soundFile.paused){
	        		soundFile.oncanplaythrough = function(){
						soundFile.play();
						soundFile.currentTime = 5;
					}
					soundFile.play();
					soundFile.currentTime = 5;

					// Changing background-color to night blue //
					body.style.backgroundColor = '#2c3e50';
	        	}else{
	        		soundFile.pause();
	        		body.style.backgroundColor = '#3498db';
	        	}
	        }
	    });


	}, false);

