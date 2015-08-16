<?php

require_once('Factory.php');
require_once('SimpleFactory.php');

/**
* 客户端类
* @author xiazhiqiang, 2015-08-15
*/
class Client
{

	public function exportFileWithSimpleFactory()
	{
		$exportFile = simpleFactory::createExportFile('csv');
		$exportFile->export();
	}

	public function exportFileWithFactory()
	{
		$factory = new FactoryCsv();
		$exportFile = $factory->createExportFile();
		$exportFile->export();
	}
}

$client = new Client();

// simple factory
$client->exportFileWithSimpleFactory();

// factory
$client->exportFileWithFactory();
