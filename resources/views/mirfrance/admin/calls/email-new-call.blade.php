<html>

<body style="font-family: 'Verdana', verdana">

Bonjour {{ $call->user->firstname }},<br />
<br />
Vous avez reçu un appel téléphonique de <b>{{ $call->client_name }}</b> @if(isset($call->comapny)), de l'entreprise : {{  $call->company }} @endif le {{  get_french_date($call->created_at) }}.<br /><br />

<br /><p><i>Objet de l'appel :</i></p>
{{ $call->object }}<br /><br />

<br /><p><i>Infos pour recontacter la personne :</i></p>
@if(isset($call->email)) Email : {{ $call->email }}<br />@endif
@if(isset($call->phone)) Téléphone fixe : {{ $call->phone }}<br />@endif
@if(isset($call->mobile)) Téléphone portable : {{ $call->mobile }}<br /><br />@endif

<br />-> <a href="{{ $url }}">Lien vers la fiche de l'appel</a>
<br /><br /><br />
Bonne journée,<br />
<br />
L'équipe MIR France

</body>
</html>