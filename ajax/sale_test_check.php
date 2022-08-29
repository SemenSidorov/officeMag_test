<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!$USER->IsAuthorized()){
    die('Вы не авторизованы! Перезагрузите страницу!');
}
if(!$_POST['key']){
    die('Ошибка! Не введен код!');
}

$hl = HLEntity(HL_ID);
$ob = $hl::getList([
    'filter' => ['=UF_USER' => $USER->GetID(), '>=UF_TIMESTAMP' => (time() - 10800), '=UF_KEY' => $_POST['key']],
    'select' => ['UF_PERCENT', 'UF_KEY']
]);
if($percent = $ob->Fetch()){
    echo 'Ваш код: ' . $percent['UF_KEY'] . '<br>Процент: ' . $percent['UF_PERCENT'];
}else{
    echo 'Скидка недоступна';
}