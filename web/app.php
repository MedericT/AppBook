<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;
// On ajoute la librairie Debug pour l'environnement de dev
use Symfony\Component\Debug\Debug;

// Si la variable d'environnement est définie on la récupère, autrement on la définit à 'prod' par défaut
$_SERVER['APPLICATION_ENV'] = isset($_SERVER['APPLICATION_ENV']) ? $_SERVER['APPLICATION_ENV'] : 'prod';

// Si environnement de dev, on active l'affiche des erreurs au niveau Apache
if($_SERVER['APPLICATION_ENV'] == 'dev') {
  ini_set('display_errors', 'On');
}

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

// Si environnement de dev, on active la debug toolbar de Symfony2
if ($_SERVER['APPLICATION_ENV'] == 'dev') {
    Debug::enable();
}

// On active l'utilisation du cache APC si environnement de prod

// Enable APC for autoloading to improve performance.
// You should change the ApcClassLoader first argument to a unique prefix
// in order to prevent cache key conflicts with other applications
// also using APC.


if ($_SERVER['APPLICATION_ENV'] == 'prod') {
	$apcLoader = new ApcClassLoader($_SERVER['APPLICATION_APC_PREFIX'] ? $_SERVER['APPLICATION_APC_PREFIX'] : 'sf2', $loader);
	$loader->unregister();
	$apcLoader->register(true);
}

require_once __DIR__.'/../app/AppKernel.php';
//require_once __DIR__.'/../app/AppCache.php';

// On modifie l'appel du Kernel suivant l'environnement
$kernel = new AppKernel($_SERVER['APPLICATION_ENV'], $_SERVER['APPLICATION_ENV'] == 'dev');
//$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
