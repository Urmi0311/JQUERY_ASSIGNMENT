<?php
$keywords = array("Apple", "banana", "Cherry", "date", "elderberry", "fig", "Grape", "honeydew", "Indigo", "jicama");
natcasesort($keywords);
foreach ($keywords as $keyword) {
	echo $keyword . "<br>";
}
?>