<?php

$file = 'file_templates/class_list.xlsx';
header('Content-Disposition: attachment; filename='.basename($file));

header('Content-type: application/vnd.ms-excel');

readfile($file);

?> 