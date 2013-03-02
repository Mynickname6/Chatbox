<!DOCTYPE html>
<head>
	<title>Chatbox</title>
	<meta charset="utf-8" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" href="css/base.css" />
</head>

<body>
	<fieldset>
		<legend>Chatbox</legend>
			
				<div class="chatbox-inner">
					
				</div>
			<input type="text" name="pseudo" id="pseudo" /> 
			<input type="text" name="message" id="message" />
			<input type="submit" name="send" id="send" value="Envoyer" />
		
	</fieldset>
	
</body>

<script type="text/javascript">
	function loadChatBoxContent(){
		$('.chatbox-inner').load('content.html');
	}
	loadChatBoxContent();
	setInterval(loadChatBoxContent, 30000);
	var p = $('#pseudo');
	var mess = $('#message');
	p.attr('placeholder', 'Pseudo...');
	mess.attr('placeholder', 'Message...');
	$('#send').click(function(){
		if(p.val() == '' || mess.val() == '')
		{
			return;
		}
		if(mess.val() == '/refresh')
		{
			loadChatBoxContent();
			alert('Shoutbox raffraichie');
			return;
		}
		$.post('postMessage.php', {pseudo: p.val(), message: mess.val()}, function (data){
			loadChatBoxContent();
		});
		p.val('');
		mess.val('');

	});
</script>
