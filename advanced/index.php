<?php
	//Jefferson Lam
	//12-17-13
	//OOP Advanced
	
	//Class definition
	//-----------------
	class HTML_Helper{
		public function print_table($array){
			$html = "<table><thead><tr>";
			foreach($array[0] as $key=>$value){
				$html .="<th>{$key}</th>";
			}
			$html .="</tr></thead><tbody>";
			foreach($array as $key){
				$html .= "<tr>";
				foreach ($key as $value){
					$html .="<td>{$value}</td>";
				}
				$html .="</tr>";
			}
			$html .= "</tbody></table>";

			echo $html;
		}

		public function print_select($name, $array){
			$html = "<select name='{$name}'>";
			foreach($array as $value){
				$html .= "<option name={$value}>{$value}</option>";
			}
			$html .= "</select>";

			echo $html;
		}
	} // end class definition

	//Array initialization
	//-----------------
	$people = array(
				array(
					"first_name" => "Michael", 
					"last_name" => "Choi", 
					"nick_name" => "Sensei"
				),
				array(
					"first_name" => "Randall",
					"last_name" => "Frisk",
					"nick_name" => "RF"
				),
				array(
					"first_name" => "Damon",
					"last_name" => "Gustafson",
					"nick_name" => "DG"
				)
			);

	$states = array("CA", "WA", "UT", "TX", "AZ", "NY");
	//End array initialization

	//Create tables
	$helper = new HTML_Helper();
	$helper->print_table($people);
	$helper->print_select("states", $states);
?>