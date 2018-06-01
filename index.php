<?php
require(__DIR__  . DIRECTORY_SEPARATOR  . "conf" . DIRECTORY_SEPARATOR  . "config.php");

// on initialise l'object User
$user = new User($database);

// on recupère les informations sur un user (on hydrate le user)
$user->hydrate(1);

echo $user->getEmail() . "<br>";
echo $user->getPassword() . "<br>";
echo $user->getLastname() . "<br>";
echo $user->getFirstname() . "<br>";
echo $user->getAge() . "<br>";
echo $user->getGender() . "<br>";

// on recupere tout les hommes


echo "<br><br><b>LES HOMMES DANS LA BASE</b><br><br>";

$req = $db->query("SELECT id FROM users WHERE gender='male'");
while ($data = $req->fetchObject()) {
    $user->hydrate($data->id);
    echo "{$user->getFirstname()} {$user->getLastname()} <br>";
}