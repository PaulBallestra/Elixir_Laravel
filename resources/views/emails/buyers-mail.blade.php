<!DOCTYPE html>
<html>
<body>
<h1>{{ $details['objet'] }}</h1>

<h2> Votre abonnement a bien été souscrit </h2>

<p>{{ $details['content_email']->name }}</p>
<p>{{ $details['content_email']->price/100 }}€</p>


</body>
</html>
