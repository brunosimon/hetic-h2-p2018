// C'est là où ça devient interessant ! J'ai donc utlisé l'API de Google Visualization pour afficher mes graphiques et j'ai chargé dynamiquement leurs contenu en appelant du contenu au format JSON en Ajax ! Il faut savoir que la syntaxe qui est accepté par Google en JSON est très stricte, j'ai donc dû travailler en back-end (Voir getdadta.php) pour formater correctement le JSON. 


//Je charge les packages et je met en place les CallBack

google.load('visualization', '1.0', {'packages':['corechart']});
google.load('visualization', '1.0', {'packages':['gauge']});
google.setOnLoadCallback(drawChart1);
google.setOnLoadCallback(drawChart2);
google.setOnLoadCallback(drawChart3);
google.setOnLoadCallback(drawChart4);
google.setOnLoadCallback(drawChart5);
google.setOnLoadCallback(drawChart6);
google.setOnLoadCallback(drawChart7);
google.setOnLoadCallback(drawChart8);
google.setOnLoadCallback(drawChart9);

// Les fonctions sont assez similaires, ce qui change principalement c'est la variable "options" et "jsonData", je charge le fichier JSON au travers de la variable data, le reste se passe dans getdata.php
  
		// Chart 1 (Graphique Colonnes verticales)
		function drawChart1() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultvote',
          dataType:"json",
          }).responseText;
		  
		var options = {'title':'Résultat du vote',
                       'width':400,
                       'height':200,
					   animation:{
						duration : 1000,
						easing : 'out',
						startup : true,
						},
						vAxis : {minValue:0},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
		chart.draw(data, options);
		};
		
		// Chart 2 (Graphique colonnes horizontales)
		function drawChart2() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultsex',
          dataType:"json",
          }).responseText;
		  
		var options = {'title':'Nombre de femmes et d\'hommes qui ont votés',
                       'width':400,
                       'height':200,
					   animation:{
						duration : 1000,
						easing : 'out',
						startup : true,
						},
						hAxis : {minValue:0},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
		chart.draw(data, options);
		};
		
		// Chart 3 (Graphique colonnes verticales)
      function drawChart3() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultage',
          dataType:"json",
          }).responseText;
		  
		var options = {'title':'Nombre de vote chez les moins de 30 ans et les plus de 30 ans',
                       'width':400,
                       'height':200,
					   animation:{
						duration : 1000,
						easing : 'out',
						startup : true,
						},
						vAxis : {minValue:0},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
		chart.draw(data, options);
		};
		
		// Chart 4 (Carte de France)
      function drawChart4() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultlocationvote',
          dataType:"json",
          }).responseText;
		  
		var options = {
                       'width':400,
                       'height':200,
						region:'FR',
						displayMode:'markers',
						vAxis : {minValue:0, maxValue:150},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.GeoChart(document.getElementById('chart_div4'));
		chart.draw(data, options);
		var element = document.createElement('div');
		element.appendChild(document.createTextNode('Localisation des votes'));
		document.getElementById('chart_div4').appendChild(element);
		};
		
	// Chart 5 (Courbes)
      function drawChart5() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=evolution',
          dataType:"json",
          }).responseText;
		  
		var options = {'title':'Evolution des réponses',
                       'width':400,
                       'height':200,
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.LineChart(document.getElementById('chart_div5'));
		chart.draw(data, options);
		
	  };
		
	// Chart 6 (Carte de France)

      function drawChart6() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultlocationvoteobamafemale',
          dataType:"json",
          }).responseText;
		  
		var options = {
                       'width':400,
                       'height':200,
						region:'FR',
						displayMode:'markers',
						vAxis : {minValue:0, maxValue:150},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.GeoChart(document.getElementById('chart_div6'));
		chart.draw(data, options);
	
		var element = document.createElement('div');
		element.appendChild(document.createTextNode('Localisation des femmes qui ont votés Obama'));
		document.getElementById('chart_div6').appendChild(element);
		};
		
		
	// Chart 7 (Diagramme)
		function drawChart7() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultvoteold',
          dataType:"json",
          }).responseText;
		  
		var options = {'title':'Résultat du vote chez les plus de 50 ans',
                       'width':400,
                       'height':200,
					   animation:{
						duration : 1000,
						easing : 'out',
						startup : true,
						},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.PieChart(document.getElementById('chart_div7'));
		chart.draw(data, options);
		};
		
		
	// Chart 8 (Diagramme)
      function drawChart8() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultvoteyoung',
          dataType:"json",
          }).responseText;
		  
		var options = {'title':'Résultat du vote chez moins de 30 ans',
                       'width':400,
                       'height':200,
					   animation:{
						duration : 1000,
						easing : 'out',
						startup : true,
						},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.PieChart(document.getElementById('chart_div8'));
		chart.draw(data, options);
		};
		
		
		
	// Chart 9 (Diagramme)
      function drawChart9() {
		var jsonData = $.ajax({
		  type : "POST",
          url: "getdata.php",
		  async: false,
		  data : 'request=resultvoteyoungwomenparis',
          dataType:"json",
          }).responseText;
		  
		var options = {'title':'Résultat du vote chez les femmes parisiennes entre 18 et 24 ans',
                       'width':400,
                       'height':200,
					   animation:{
						duration : 1000,
						easing : 'out',
						startup : true,
						},
					   };
		var data = new google.visualization.DataTable(jsonData);
		var chart = new google.visualization.PieChart(document.getElementById('chart_div9'));
		chart.draw(data, options);
		};