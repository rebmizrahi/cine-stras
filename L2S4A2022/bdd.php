<?php 

$PDO = new PDO("sqlite:".dirname(__FILE__)."/users.db.sqlite");

$PDO->query("CREATE TABLE IF NOT EXISTS users (
    USERNAME VARCHAR PRIMARY KEY NOT NULL,
    PASSWORD VARCHAR NOT NULL,
    ISADMIN BOOLEAN NOT NULL
)");


$usernames = [
	'BobDylan',
    'BritneySpears',
    'ArchyMarshall'
];

$passwords = [
    '1234',
    '1234',
    '1234'
];

$isAdmin = [
    True,
    True,
    False
];

$sql = 'INSERT OR REPLACE INTO users (USERNAME, PASSWORD, ISADMIN) VALUES (:usernames, :passwords, :isAdmin)';

for($i=0; $i<count($usernames); $i++) {
    $statement = $PDO->prepare($sql);
    $isAdminLiteral = $isAdmin[$i] == True ? 1 : 0;
    $statement->execute([$usernames[$i], $passwords[$i], $isAdminLiteral]);
}


/*******/

$PDO = new PDO("sqlite:".dirname(__FILE__)."/posts.db.sqlite");

$PDO->query("CREATE TABLE IF NOT EXISTS  posts (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    TITLE VARCHAR NOT NULL,
    CONTENT VARCHAR NOT NULL
)");


$titles = [
    'Hereditary',
	'The Shining',
    'Train to Busan',
    'The Conjuring',
    'Midsommar',
    'Psycho',
    'Alien',
    'Perfect Blue'
];

$contents = [
    'A 2018 psychological horror about a family and the secrets about their ancestry.',
    'A 1980 psychological horror film by Stanley Kubrick based on the novel of the same name by Stephen King.',
    'A 2016 South Korean action horror thriller about a zombie outbreak in Busan.',
    'The infamous 2013 supernatural movie about paranormal phemoena based on a true story.',
    "A 2019 horror folk movie about a disfunctional couple visiting a friend's isolated commune for the Swedish midsummer festival.",
    'A 1960 classic psychological horror thriller film by Alfred Hitchcock.',
    'A horror story about an alien attach released in 1979.',
    'A 1999 Satoshi Kon animated psychological thriller about a singer and her image.'
];

$sql = 'INSERT OR REPLACE INTO posts (TITLE, CONTENT) VALUES (:title, :content)';

for($i=0; $i<count($contents); $i++) {
    $statement = $PDO->prepare($sql);
    $statement->execute([$titles[$i], $contents[$i]]);
}