<!DOCTYPE html>
<html>
<body>
<h1>{{ $details['objet'] }}</h1>

<h2> Nouvel abonnement </h2>

<p> De {{ $details['family_name'] }} {{ $details['given_name'] }} - {{ $details['email_address'] }}</p>
<p>{{ $details['content_email']->name }} à {{ $details['content_email']->price/100 }}€</p>


</body>
</html>
