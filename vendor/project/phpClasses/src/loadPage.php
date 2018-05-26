<?php

namespace Sociedade404;

  // namespace
    use Rain\Tpl;

	// include
	//include "library/Rain/Tpl.php";

class loadPage
{

	private $tpl;
	private $options = [];
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];


	public function __construct($opts = array())
	{

		$this->options = array_merge($this->defaults, $opts);

		$config = array(
			"tpl_dir"   => $_SERVER['DOCUMENT_ROOT']."/views/",
			"dir_cache" => $_SERVER['DOCUMENT_ROOT']."/cache/",
			 "debug"    => false
		);

		Tpl::configure($config);

		$this->tpl = new Tpl;

	 	$this->setData($this->options["data"]);
	 	$this->tpl->draw("header");
	}

	private function setData($data = array())
	{

		foreach($data as $key => $value)
		{

			$this->tpl->assign($key, $value);

		}

	}

	public function setTpl($name, $data = array(), $returnHTML = false)
	{

		$this->setData($data);
		return $this->tpl->draw($name, $returnHTML);

	}


	public function __destruct()
	{

		$this->tpl->draw("footer");

	}
}