<?php
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<button class="sale_test">Получить скидку</button><br>
<input class="sale_test_input" type="text" placeholder="Проверить скидку"><button class="sale_test_check">Отправить</button><br>
<div class="sale_test_result"></div>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>