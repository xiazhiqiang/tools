<?php

require_once('Export.php');

/**
* factory class
* @author xiazhiqiang, 2015-08-15
*/
class simpleFactory
{

	public static function createExportFile($type)
	{
		switch ($type) {
			case 'csv':
				return new CSV();
				break;
			case 'spssdata':
				return new SpssData();
				break;
			case 'spssstruct':
				return new SpssStruct();
				break;
		}
	}
}
