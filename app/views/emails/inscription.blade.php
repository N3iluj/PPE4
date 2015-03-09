@extends('template')
@section('contenu')
@parent

Merci <?php echo $username; ?>! <br \>

<p>Votre inscription pour l'exposition Lego® qui se déroulera le 17 et 18 octobre 2015 au complexe sportif du Collège Mont Roland à Dole (39100) a bien été prise en compte.</p>

<p>Vous pouvez modifier vos informations à tout moment sur le site <?php echo Config::get('app.url'); ?> en vous connectant avec votre identifiant et votre mot de passe.</p>

<p>A bientôt !</p>

@stop

