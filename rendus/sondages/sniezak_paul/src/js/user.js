$(document).ready(function() {
	$(".form_input").keyup(function() {
		var form_input = $(this).val();
		var keyword= encodeURIComponent(form_input);
		// On appelle l'API de Youtube
		var yt_url='http://gdata.youtube.com/feeds/api/videos?q='+keyword+'&format=5&max-results=1&v=2&alt=jsonc'; 

		$.ajax ({
			url: yt_url,
			dataType : 'json',
			success: function(response) {
				if(response.data.items) {
					$.each(response.data.items, function(i,data) {
						var video_id=data.id;
						var video_title=data.title;
						var video_viewCount=data.viewCount;
						var video_frame="<iframe width='200' height='150' src='http://www.youtube.com/embed/"+video_id+"?rel=0&autohide=1&showinfo=0' frameborder='0' type='text/html'></iframe>";
						// MEGA BIDOUILLE : en plus d'ajouter le contenu réel qui va permettre à la vidéo Youtube de s'afficher, on ajoute un champ au formulaire pour pouvoir récupérer l'id de la vidéo en get	
						var final="<div id='title'>"+video_title+"</div><div>"+video_frame+"</div><div id='count'>"+video_viewCount+" Views</div><input type='text' name='src' value='"+video_id+"'/>";

						$("#result").html(final); // Resultat
					});
				} else {
					$("#result").html("<div id='no'>Aucune vidéo n'a été trouvée.</div>");
				}
			}
		});
	});
});