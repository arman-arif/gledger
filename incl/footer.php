<?php 
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\FontEnd;
?>

            <footer class="text-center text-muted bg-dark py-3">&copy; 2020 - All right reserved.</footer>
            </div>
        </div>

    </div>

</div>

<div class="loading-modal bg-trans-cove hide" id="loader-modal">
    <div class="loading modal-background">
        <div class="loading-content">
            <div class="loading-circle"></div>
            <span class="loading-name" id="loader-text">LOADING...</span>
        </div>
    </div>
</div>

<?php
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
