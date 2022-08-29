<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if(!$USER->IsAuthorized()){
    die('Вы не авторизованы! Перезагрузите страницу!');
}

function newKey(){
    global $hl;
    $randInt = rand(8, 21);
    $randStr = randString($randInt);
    $ob = $hl::getList(['filter' => ['UF_KEY' => $randStr]]);
    if($ob->Fetch()){
        return false;
    }else{
        return $randStr;
    }
}

$hl = HLEntity(HL_ID);
$ob = $hl::getList([
    'filter' => ['=UF_USER' => $USER->GetID(), '>=UF_TIMESTAMP' => (time() - 3600)],
    'select' => ['UF_PERCENT', 'UF_KEY']
]);
if($percent = $ob->Fetch()){
    echo 'Ваш код: ' . $percent['UF_KEY'] . '<br>Процент: ' . $percent['UF_PERCENT'];
    die;
}
$randStr = false;
while(!$randStr){
    $randStr = newKey();
}
$percent = rand(1, 50);
$hl::add(['UF_USER' => $USER->GetID(), 'UF_TIMESTAMP' => time(), 'UF_PERCENT' => $percent, 'UF_KEY' => $randStr]);
echo 'Ваш код: ' . $randStr . '<br>Процент: ' . $percent;