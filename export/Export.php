<?php

abstract class ExportFile
{
	abstract public function export();
}

/**
* export csv class
* @author xiazhiqiang, 2015-08-15
*/
class Csv extends ExportFile
{

	public $fileName;
	public $data;

	public function export()
	{
		$this->fileName = 'test.csv';

		$this->data = $this->createTitle();

		$this->data .= $this->createData();

		// 输出到浏览器
		$this->outputData();
	}

	protected function createTitle()
	{
		// 从数据库中获取title数据
		$title = array();

		return $this->formatData($title);
	}

	protected function createData()
	{
		// 从数据库中获取data数据
		$data = array();

		$str = '';
		foreach ($data as $key => $value) {
			$str .= $this->formatData($value);
		}

		return $str;
	}

	protected function formatData(array $data = array())
	{
		try {
			if (count($data) < 1) {
				throw new Exception('Data is empty.', 1);
			}

			foreach ($data as $key => $value) {
				$value = str_replace("\"", "\'", $value);
				$data[$key] = iconv('utf-8', 'gb2312', $value);
			}

			return "\"".implode("\",\"", $data)."\"\n";
		} catch (Exception $e) {
			return '';
		}
	}

	/**
	 * output data
	 * @author xiazhiqiang
	 * @return string
	 */
	protected function outputData()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$this->fileName.'"');
		header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
		header('Cache-Control: max-age=0');
		header('Pragma:public');

		echo $this->data;
	}

}

/**
* spss data class
* @author xiazhiqiang
*/
class SpssData extends ExportFile
{

	public function export()
	{
		$this->data = $this->generateData();

		$this->outputData();
	}

	protected function generateData()
	{

	}

	protected function outputData()
	{

	}

}

/**
* spss struct class
* @author xiazhiqiang
*/
class SpssStruct extends ExportFile
{

	public function export()
	{
		# code...
	}

	protected function generateData()
	{
		# code...
	}

	protected function output()
	{
		# code...
	}

}
