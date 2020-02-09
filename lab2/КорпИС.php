<?php
    $url = 'https://vadymcompany.bitrix24.ru/rest/1/guld78n9e95qf5fh/crm.lead.add/';
    $params = array(
        'fields' => array(
        'TITLE' => 'Заказ через скрипт',
        'NAME' => 'ВадимСкрипт',
        'PHONE' => '$+79788920615',
        'SOURCE_DESCRIPTION' => '24'
        )
    );
    $result = file_get_contents($url, false, stream_context_create(array(
        'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => json_encode($params)
        )
    )));

    echo $result;
?>