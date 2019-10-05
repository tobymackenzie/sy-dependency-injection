<?php
namespace TJM\Component\DependencyInjection\Test;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use TJM\Component\DependencyInjection\Loader\MultiTypeLoader;

class MultiTypeLoaderTest extends TestCase{
	public function testMultiTypeLoad(){
		$container = new ContainerBuilder();
		$loader = new MultiTypeLoader($container, __DIR__ . '/../Fixtures/config');
		$loader->load('simple.yml');
		$loader->load('simple.php');

		$this->assertEquals($container->getParameter('foo'), 'bar', 'Container should have "foo" parameter set after loading config file.');
		$this->assertEquals($container->getParameter('override'), 'php', 'Container should have "override" parameter set to "yaml" after loading config file.');
		$this->assertTrue($container->getParameter('php'), 'Container should have "php" parameter set to true after loading config file.');
		$this->assertTrue($container->getParameter('yaml'), 'Container should have "yaml" parameter set to true after loading config file.');
	}
	public function testPHPLoad(){
		$container = new ContainerBuilder();
		$loader = new MultiTypeLoader($container, __DIR__ . '/../Fixtures/config');
		$loader->load('simple.php');

		$this->assertEquals($container->getParameter('foo'), 'bar', 'Container should have "foo" parameter set after loading config file.');
		$this->assertEquals($container->getParameter('override'), 'php', 'Container should have "override" parameter set to "php" after loading config file.');
		$this->assertTrue($container->getParameter('php'), 'Container should have "php" parameter set to true after loading config file.');
	}
	public function testYamlLoad(){
		$container = new ContainerBuilder();
		$loader = new MultiTypeLoader($container, __DIR__ . '/../Fixtures/config');
		$loader->load('simple.yml');

		$this->assertEquals($container->getParameter('foo'), 'bar', 'Container should have "foo" parameter set after loading config file.');
		$this->assertEquals($container->getParameter('override'), 'yaml', 'Container should have "override" parameter set to "yaml" after loading config file.');
		$this->assertTrue($container->getParameter('yaml'), 'Container should have "yaml" parameter set to true after loading config file.');
	}
}
