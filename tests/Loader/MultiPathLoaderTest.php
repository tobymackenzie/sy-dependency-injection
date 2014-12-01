<?php
namespace TJM\Component\DependencyInjection\Test;

use PHPUnit_Framework_TestCase as Base;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use TJM\Component\DependencyInjection\Loader\MultiPathLoader;

class MultiPathLoaderTest extends Base{
	public function testMultiPathLoad(){
		$container = new ContainerBuilder();
		$loader = new MultiPathLoader($container);
		$loader->load(__DIR__ . '/../Fixtures/config/simple.yml');
		$loader->load(__DIR__ . '/../Fixtures/config/simple.php');
		$loader->load(__DIR__ . '/../Fixtures/config2/simple.yml');

		$this->assertEquals($container->getParameter('foo'), 'bar', 'Container should have "foo" parameter set after loading config file.');
		$this->assertEquals($container->getParameter('override'), 'php', 'Container should have "override" parameter set to "yaml" after loading config file.');
		$this->assertTrue($container->getParameter('php'), 'Container should have "php" parameter set to true after loading config file.');
		$this->assertTrue($container->getParameter('yaml'), 'Container should have "yaml" parameter set to true after loading config file.');
		$this->assertTrue($container->getParameter('config2'), 'Container should have "config2" parameter set to true after loading config file.');
	}
}
