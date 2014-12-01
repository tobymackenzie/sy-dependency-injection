<?php
namespace TJM\Component\DependencyInjection\Loader;

use Symfony\Component\Config\Loader\DelegatingLoader as Base;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/*
Class: MultiTypeLoader
Load config files from supported types for provided container at provided paths.
*/

class MultiTypeLoader extends Base{
	/*
	Method: __construct
	Arguments:
		container(ContainerInterface): container to load configs for
		paths(String|Array): path(s) to load configs from
	*/
	public function __construct(ContainerBuilder $container, $paths){
		$this->resolver = new MultiTypeResolver($container, $paths);
	}
}
