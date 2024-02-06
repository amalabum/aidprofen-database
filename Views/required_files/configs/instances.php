<?php
$MT_QueryInterface = new Crud();
$MT_NewPage = new StandardPages($MT_QueryInterface);

$MT_FORMULAIRES = new Formulaires($MT_QueryInterface);
$MT_Tables = new StandardTable($MT_QueryInterface);
$MT_Headers = new Headers();


