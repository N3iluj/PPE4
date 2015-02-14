<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Réinitialisation de mot de passe</h2>

		<div>
			Pour réinitialiser votre mot de passe, completez ce formulaire: {{ URL::to('password/reset', array($token)) }}.<br/>
			Ce link expirera dans {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
	</body>
</html>
