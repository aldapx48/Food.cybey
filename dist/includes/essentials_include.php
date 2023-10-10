<?php
	class EssentialsInclude {
		private $header;
		private $footer;

		function __construct($header, $footer) {
			$this->header = $header;
			$this->footer = $footer;
		}

		public function getHeader($title) {
			$contentStr = file_get_contents($this->header);

			$contentStr = str_replace("PutTitleHere", $title, $contentStr);

			return $contentStr;
		}

		public function getFooter($scriptName) {
			$contentStr = file_get_contents($this->footer);

			if($scriptName == "")
				$contentStr = str_replace("PutScriptHere", "", $contentStr);
			else
				$contentStr = str_replace("PutScriptHere", '<script src="js/' . $scriptName . '.js"></script>', $contentStr);

			return $contentStr;
		}
	}
?>