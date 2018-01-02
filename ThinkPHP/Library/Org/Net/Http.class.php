<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Org\Net;

/**
 * Http 工具类
 * 提供一系列的Http方法
 * @author    liu21st <liu21st@gmail.com>
 */
class Http
{

    /**
     * 采集远程文件
     * @access public
     * @param string $remote 远程文件名
     * @param string $local 本地保存文件名
     * @return mixed
     */
    public static function curlDownload($remote, $local)
    {
        $cp = curl_init($remote);
        $fp = fopen($local, "w");
        curl_setopt($cp, CURLOPT_FILE, $fp);
        curl_setopt($cp, CURLOPT_HEADER, 0);
        curl_exec($cp);
        curl_close($cp);
        fclose($fp);
    }

    /**
     * 使用 fsockopen 通过 HTTP 协议直接访问(采集)远程文件
     * 如果主机或服务器没有开启 CURL 扩展可考虑使用
     * fsockopen 比 CURL 稍慢,但性能稳定
     * @static
     * @access public
     * @param string $url 远程URL
     * @param array $conf 其他配置信息
     *        int   limit 分段读取字符个数
     *        string post  post的内容,字符串或数组,key=value&形式
     *        string cookie 携带cookie访问,该参数是cookie内容
     *        string ip    如果该参数传入,$url将不被使用,ip访问优先
     *        int    timeout 采集超时时间
     *        bool   block 是否阻塞访问,默认为true
     * @return mixed
     */
    public static function fsockopenDownload($url, $conf = array())
    {
        $return = '';
        if (!is_array($conf)) {
            return $return;
        }

        $matches                                       = parse_url($url);
        !isset($matches['host']) && $matches['host']   = '';
        !isset($matches['path']) && $matches['path']   = '';
        !isset($matches['query']) && $matches['query'] = '';
        !isset($matches['port']) && $matches['port']   = '';
        $host                                          = $matches['host'];
        $path                                          = $matches['path'] ? $matches['path'] . ($matches['query'] ? '?' . $matches['query'] : '') : '/';
        $port                                          = !empty($matches['port']) ? $matches['port'] : 80;

        $conf_arr = array(
            'limit'   => 0,
            'post'    => '',
            'cookie'  => '',
            'ip'      => '',
            'timeout' => 15,
            'block'   => true,
        );

        foreach (array_merge($conf_arr, $conf) as $k => $v) {
            ${$k} = $v;
        }

        if ($post) {
            if (is_array($post)) {
                $post = http_build_query($post);
            }
            $out = "POST $path HTTP/1.0\r\n";
            $out .= "Accept: */*\r\n";
            //$out .= "Referer: $boardurl\r\n";
            $out .= "Accept-Language: zh-cn\r\n";
            $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
            $out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
            $out .= "Host: $host\r\n";
            $out .= 'Content-Length: ' . strlen($post) . "\r\n";
            $out .= "Connection: Close\r\n";
            $out .= "Cache-Control: no-cache\r\n";
            $out .= "Cookie: $cookie\r\n\r\n";
            $out .= $post;
        } else {
            $out = "GET $path HTTP/1.0\r\n";
            $out .= "Accept: */*\r\n";
            //$out .= "Referer: $boardurl\r\n";
            $out .= "Accept-Language: zh-cn\r\n";
            $out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
            $out .= "Host: $host\r\n";
            $out .= "Connection: Close\r\n";
            $out .= "Cookie: $cookie\r\n\r\n";
        }
        $fp = @fsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);
        if (!$fp) {
            return '';
        } else {
            stream_set_blocking($fp, $block);
            stream_set_timeout($fp, $timeout);
            @fwrite($fp, $out);
            $status = stream_get_meta_data($fp);
            if (!$status['timed_out']) {
                while (!feof($fp)) {
                    if (($header = @fgets($fp)) && ("\r\n" == $header || "\n" == $header)) {
                        break;
                    }
                }

                $stop = false;
                while (!feof($fp) && !$stop) {
                    $data = fread($fp, (0 == $limit || $limit > 8192 ? 8192 : $limit));
                    $return .= $data;
                    if ($limit) {
                        $limit -= strlen($data);
                        $stop = $limit <= 0;
                    }
                }
            }
            @fclose($fp);
            return $return;
        }
    }

    /**
     * 下载文件
     * 可以指定下载显示的文件名，并自动发送相应的Header信息
     * 如果指定了content参数，则下载该参数的内容
     * @static
     * @access public
     * @param string $filename 下载文件名
     * @param string $showname 下载显示的文件名
     * @param string $content  下载的内容
     * @param integer $expire  下载内容浏览器缓存时间
     * @return void
     */
    public static function download($filename, $showname = '', $content = '', $expire = 180)
    {
        if (is_file($filename)) {
            $length = filesize($filename);
        } elseif (is_file(UPLOAD_PATH . $filename)) {
            $filename = UPLOAD_PATH . $filename;
            $length   = filesize($filename);
        } elseif ('' != $content) {
            $length = strlen($content);
        } else {
            E($filename . L('下载文件不存在！'));
        }
        if (empty($showname)) {
            $showname = $filename;
        }
        $showname = basename($showname);
        if (!empty($filename)) {
            $finfo = new \finfo(FILEINFO_MIME);
            $type  = $finfo->file($filename);
        } else {
            $type = "application/octet-stream";
        }
        //发送Http Header信息 开始下载
        header("Pragma: public");
        header("Cache-control: max-age=" . $expire);
        //header('Cache-Control: no-store, no-cache, must-revalidate');
        header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expire) . "GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s", time()) . "GMT");
        header("Content-Disposition: attachment; filename=" . $showname);
        header("Content-Length: " . $length);
        header("Content-type: " . $type);
        header('Content-Encoding: none');
        header("Content-Transfer-Encoding: binary");
        if ('' == $content) {
            readfile($filename);
        } else {
            echo ($content);
        }
        exit();
    }

    /**
     * 显示HTTP Header 信息
     * @return string
     */
    public static function getHeaderInfo($header = '', $echo = true)
    {
        ob_start();
        $headers = getallheaders();
        if (!empty($header)) {
            $info = $headers[$header];
            echo ($header . ':' . $info . "\n");
        } else {
            foreach ($headers as $key => $val) {
                echo ("$key:$val\n");
            }
        }
        $output = ob_get_clean();
        if ($echo) {
            echo (nl2br($output));
        } else {
            return $output;
        }

    }

    /**
     * HTTP Protocol defined status codes
     * @param int $num
     */
    public static function sendHttpStatus($code)
    {
        static $_status = array(
            // Informational 1xx
            100 => 'Continue',
            101 => 'Switching Protocols',

            // Success 2xx
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',

            // Redirection 3xx
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found', // 1.1
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            // 306 is deprecated but reserved
            307 => 'Temporary Redirect',

            // Client Error 4xx
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',

            // Server Error 5xx
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            509 => 'Bandwidth Limit Exceeded',
        );
        if (isset($_status[$code])) {
            header('HTTP/1.1 ' . $code . ' ' . $_status[$code]);
        }
    }

    public static $http_code = null;

    /**
     * 初始化CURL
     * @return resource
     */
    protected static function curlInit() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        return $ch;
    }

    /**
     * 取得CURL请求结果
     * @param resource  $ch
     * @param string    $url            指定URL
     * @param mixed     $data           提交的数据（数组或查询字符串，如果是传文件，必需用数组，文件名值前面加@）
     * @param string    $cookie         COOKIE字符中
     * @param string    $referer        指定来源
     * @param string    $userAgent      指定用户标识（浏览器）
     * @return mixed
     */
    protected static function curlResult($ch, $url, $data = null, $cookie = null, $referer = null, $userAgent = null, $timeout = 10) {
        curl_setopt_array($ch, array(CURLOPT_URL => $url, CURLOPT_COOKIE => $cookie, CURLOPT_REFERER => $referer, CURLOPT_USERAGENT => $userAgent, CURLOPT_TIMEOUT => $timeout));
        $data && curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);

        $curl_info = curl_getinfo($ch);
        self::$http_code = $curl_info['http_code'];
//        self::$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($result === false) { //出错
            $msg = curl_error($ch);
            $code = curl_errno($ch);

            trigger_error("[{$code}] {$msg}", E_USER_WARNING);
        } else {
            self::error('', 0);
        }
        curl_close($ch);
        return $result;
    }

    /**
     * 记录或读取错误信息
     * @staticvar string $message
     * @param string $msg
     * @return array
     */
    public static function error($msg = null, $code = null) {
        static $error_msg = '', $error_code = 0;
        if ($msg !== null && $code !== null) {
            $error_msg = $msg;
            $error_code = $code;
        } else {
            return array('errmsg' => $error_msg, 'errno' => $error_code);
        }
    }

    /**
     * 通过GET取得一条数据
     * @param string    $url        指定URL
     * @param string    $cookie     COOKIE字符中
     * @param string    $referer    指定来源
     * @param string    $userAgent  指定用户标识（浏览器）
     */
    static public function get($url, $cookie = null, $referer = null, $userAgent = null, $time_out = 10) {
        $ch = self::curlInit();
        return self::curlResult($ch, $url, null, $cookie, $referer, $userAgent, $time_out);
    }

    /*
     * @param $url
     * @return mixed
     * @Tony.Guo@uxin.com
     */
    static public function post($url){
        $httph =curl_init($url);
        curl_setopt($httph, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($httph, CURLOPT_SSL_VERIFYHOST, 1);
        curl_setopt($httph,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($httph, CURLOPT_POST, 1);//设置为POST方式
        curl_setopt($httph, CURLOPT_RETURNTRANSFER,1);
//        curl_setopt($httph, CURLOPT_HEADER,1);        //显示HTTP头信息
        $rst=curl_exec($httph);
        curl_close($httph);
        return $rst;
    }

    static public function curlPost($url,$postdata,$timeOut=30){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeOut);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
//        curl_setopt($ch, CURLOPT_HEADER, true);       //请求头
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);//避免ssl url 提交失败问题
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    static public function curl_post_files($url, array $header, $data) {
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $data,
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $resp = curl_exec($ch);
        if (curl_errno($ch)) {
            $ret = [
                'code' => -1,
                'resp' => curl_error($ch),
            ];
        } else {
            $ret = [
                'code' => curl_getinfo($ch, CURLINFO_HTTP_CODE),
                'resp' => $resp,
            ];
        }
        curl_close($ch);

        return $ret;
    }


    static public function text_form_data_splice($value, $key) {
        global $post_data;
        $post_data .= FORM_HYPHENS . FORM_BOUNDARY . FORM_EOL
            . "Content-Disposition: form-data; name=\"$key\""
            . FORM_EOL . FORM_EOL
            . $value . FORM_EOL;
    }

    static public function image_form_data_splice($value, $key) {
        global $post_data;

        $image_type = exif_imagetype($value);
        if ($image_type === false) {
            return;
        }
        $mime_type = image_type_to_mime_type($image_type);
        $post_data .= FORM_HYPHENS . FORM_BOUNDARY . FORM_EOL
            . "Content-Disposition: form-data; name=\"" . FORM_IMG_FIELD_NAME
            . "\"; filename=\"$key\"" . FORM_EOL
            . "Content-Type: $mime_type" . FORM_EOL . FORM_EOL
            . file_get_contents($value) . FORM_EOL;
    }


    static public function http_post_media($url,$strPOST)
    {
        $oCurl = curl_init ();
        curl_setopt ( $oCurl, CURLOPT_SAFE_UPLOAD, false);
        if (stripos ( $url, "https://" ) !== FALSE) {
            curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYHOST, false );
        }

        curl_setopt ( $oCurl, CURLOPT_URL, $url );
        curl_setopt ( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $oCurl, CURLOPT_POST, true );
        curl_setopt ( $oCurl, CURLOPT_POSTFIELDS, $strPOST );
        $sContent = curl_exec ( $oCurl );
        $aStatus = curl_getinfo ( $oCurl );
        curl_close ( $oCurl );
        if (intval ( $aStatus ["http_code"] ) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }

} //类定义结束
