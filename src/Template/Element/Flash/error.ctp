<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" ></div>
<div class="notice error message" onclick="this.classList.add('hidden');"><i class="icon-remove-sign icon-large"></i> <?= $message ?><a href="#close" class="icon-remove"></a></div>