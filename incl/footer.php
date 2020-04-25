<?php
use libraries\FontEnd;
echo FontEnd::jquery();
echo FontEnd::popperjs();
echo FontEnd::bootstrap('js');
echo FontEnd::jquery_ui('js');
echo FontEnd::sweetalert2();
echo FontEnd::alertify('js');
echo isset($module_script) ? $module_script : '';
echo FontEnd::custom_script();
?>
</body>
</html>
