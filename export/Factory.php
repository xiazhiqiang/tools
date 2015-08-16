<?php

require_once('Export.php');

interface createFile
{
	public function createExportFile();
}

/**
*
*/
class FactoryCsv implements createFile
{

	public function createExportFile()
	{
		return new Csv();
	}

}

/**
*
*/
class FactorySpssData implements createFile
{

	public function createExportFile()
	{
		return new SpassData();
	}
}

/**
*
*/
class FactorySpssStruct implements createFile
{

	public function createExportFile()
	{
		return new SpssStruct();
	}
}