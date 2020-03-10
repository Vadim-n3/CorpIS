<?php
	// программа вставляет в url пропущенные '://', '.' перед доменом и '/' после домена, если требуется

	$handle = fopen("input.txt", "r");
	$buffer = fgets($handle);

	$pos = strpos($buffer, "https");

	if ($pos !== false) {
		$buffer = substr($buffer, 0, 5) . "://" . substr($buffer, 5);
	} else {
		$buffer = substr($buffer, 0, 4) . "://" . substr($buffer, 4);
	}

	$posRu = strpos($buffer, "ru");
	$posCom = strpos($buffer, "com");
	$domLen = 0;

	if ($posRu !== false) {
		$pos = $posRu;
		$domLen = 2;
	} else {
		$pos = $posCom;
		$domLen = 3;
	}

	if (strlen($buffer) > ($pos + $domLen)){
		$buffer = substr($buffer, 0, $pos + $domLen) . "/" . substr($buffer, $pos + $domLen);
	}

	$buffer = substr($buffer, 0, $pos) . "." . substr($buffer, $pos);

	echo $buffer;



	$fd = fopen("output.txt", 'w') or die("не удалось создать файл");
	fwrite($fd, $buffer);
	fclose($fd);
?>
