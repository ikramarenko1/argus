<?php
$name = isset( $_POST["name"] ) ? $_POST["name"] : "";
$phone = isset( $_POST["phone"] ) ? $_POST["phone"] : "";
$pixelID = isset( $_POST["pixelID"] ) ? $_POST["pixelID"] : "";
$data = [
	"ip" => $_SERVER["HTTP_CF_CONNECTING_IP"] ? $_SERVER["HTTP_CF_CONNECTING_IP"] : ( $_SERVER["HTTP_X_FORWARDED_FOR"] ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"] ),
	"name" => isset( $_POST["name"] ) ? $_POST["name"] : "",
	"phone" => isset( $_POST["phone"] ) ? $_POST["phone"] : "",
	"ua" => $_SERVER["HTTP_USER_AGENT"]
]; 
?>

<?php
    $name = isset( $_GET["name"] ) ? $_GET["name"] : "";
    $phone = isset( $_GET["phone"] ) ? $_GET["phone"] : "";
    $pixelID = isset( $_REQUEST["pixel"] ) ? $_REQUEST["pixel"] : ""; 
?> 

<?php echo $name;?>

<?php echo $phone;?>

<!-- Facebook Pixel Code -->
<script>
          !function (f, b, e, v, n, t, s) {
              if (f.fbq) return;
              n = f.fbq = function () {
                  n.callMethod ?
                      n.callMethod.apply(n, arguments) : n.queue.push(arguments)
              };
              if (!f._fbq) f._fbq = n;
              n.push = n;
              n.loaded = !0;
              n.version = '2.0';
              n.queue = [];
              t = b.createElement(e);
              t.async = !0;
              t.src = v;
              s = b.getElementsByTagName(e)[0];
              s.parentNode.insertBefore(t, s)
          }(window, document, 'script',
              'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '<?=$pixelID?>');
          fbq('track', 'PageView');
          fbq('track', 'Lead');
          fbq('track', 'CompleteRegistration');

      </script>
      <noscript>
          <img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=<?=$pixelID?>&ev=PageView&noscript=1"/>
      </noscript>
      <!-- End Facebook Pixel Code -->