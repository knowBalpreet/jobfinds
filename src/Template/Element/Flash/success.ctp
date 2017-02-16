<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="notice success message"  onclick="this.classList.add('hidden')"><i class="icon-ok icon-large"></i> <?= $message ?><a href="#close" class="icon-remove"></a></div>