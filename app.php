<?php
/*function __autoload($class_name){
    require_once $class_name.'.php';
}
*/
require(__DIR__.'/lib/HTTPClient.php');
require(__DIR__.'/lib/JSONParser.php');

####################################################
####################################################
###########  EXEMPLE client HTTP ###################
####################################################
####################################################

# Primer instanciar la classe, amb la base URL on hi ha la nostre api
$base_url   = 'http://localhost:3000';
$token      = 'C0UsWlYxXrMx81TKN2Eq';
$client     = new HTTPClient($base_url, $token);
# Si necessitem enviar paramatres a l'API, primer crearem un array amb els values
$params = [
    'camp1' => '$alumne['nom'],
    'camp2' => 'xxxxxxxxx',
];

## Mitjançant el client instanciat anteriorment, podem realitzar crides a l'API amb varis metodes
## i també enviar parametres.
# $client->query(string $uri, array $params = [], string $method='GET')
# Aquesta petició sempre ens retornarà un array amb dos camps:
## status =  true / false 
## data = retorn de l'API
$result = $client->query('/api/v1/alumnes');
$result = $client->query('/api/v1/alumne', $params, 'POST');
$result = $client->query('/api/v1/alumne/:id', $params, 'PUT');
$result = $client->query('/api/v1/alumne/:id', [], 'DELETE');


####################################################
####################################################
###########  EXEMPLE parser JSON ###################
####################################################
####################################################
$result = JSONParser::parseFile(__DIR__.'.\alumnes.json');
# $result contindrà dos camps
## status =  true / false 
## data = array amb els valors del json o el codi d'error