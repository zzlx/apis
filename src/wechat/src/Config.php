<?php
namespace Zzlx\Wechat;

use Zzlx\Utils\JsonFile;

/**
 * AccessToken类
 */
class Config {
    /**
     * cacheFile
     */
    private $cacheFile;

    /**
     * cacheData
     */
    private $cacheData;

    /**
     * The instance
     *
     * @access private
     * @static
     * @var Response
     */
    private static $_instance;

    /**
     * Constructor
     */
    public function __construct() {
        $this->cacheFile = dirname(dirname(dirname(dirname(__DIR__)))) 
            . "/cache/weixin.json";
        $this->cacheData = Json::read($this->cacheFile);
    }

    /**
     * Get the singleton object
     *
     * @return object
     */
    public static function getInstance() {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * 获取agent_key
     *
     * @return 
     */
    private function getKey($agentId) {
        $agent_key = '';
        foreach ($this->cacheData['agent'] as $key => $value){
            if ($value['AgentId'] == $agentId) {
                $agent_key = $key;
            }
        }

        if ($agent_key === ''){
            return 'undefined agentid:' . $agentId;
        }
        
        return $agent_key;
    }


    /**
     * 获取配置
     *
     * @return array
     */
    public function getCorpId(){
        return $this->cacheData['corpid'];
    }

    /**
     * 获取配置
     *
     * @return string
     */
    public function getToken($agentid){
        $key = $this->getKey($agentid);
        return $this->cacheData['agent'][$key]['Token'];
    }

    /**
     * 获取配置
     *
     * @return string
     */
    public function getEncodingAESKey($agentid){
        $key = $this->getKey($agentid);
        return $this->cacheData['agent'][$key]['EncodingAESKey'];
    }

    /**
     * 获取access_token
     * 缓存和刷新access_token:
     * access_token调用频次为2000次/天/应用, 开发者需要实现缓存, 缓存逻辑的说明：
     * 1. access_token过了有效期之后获取会返回新的token, 短时间内新旧token同时可用;
     * 2. 每个应用的access_token是彼此独立的, 所以进行缓存时需要区分应用来进行存储;
     * 3. access_token至少保留512字节的存储空间;
     * 4. 企业微信可能需要提前使access_token失效，应实现失效时重新获取的逻辑。
     *
     * @return string access_token
     */
    public function getAccessToken($agentid = 'txl') {
        $corpid = $this->cacheData['corpid'];
        $key = $this->getKey($agentid);

        if($this->cacheData['agent'][$key]['ExpireTime'] < time()) { 
            $get_token_url = sprintf(
                $this->cacheData['gettoken_url'], 
                $corpid, 
                $this->cacheData['agent'][$key]['Secret']
            );

            /*
             * 获取access_token 返回结果:
             * {
             *   "errcode":0,            //错误代码,正确时返回0
             *   "errmsg":"",            //错误消息,返回正确时为空
             *   "access_token":"token", //获取的凭证,最长为512字节
             *   "expires_in":7200       //凭证有效时间（秒）
             * }
             */
            $res = json_decode(Util::httpGet($get_token_url)["content"]);

            if($res->errcode == 0) {
                $this->cacheData['agent'][$key]['ExpireTime'] = time() + 
                    $res->expires_in;
                $this->cacheData['agent'][$key]['AccessToken'] = 
                    $res->access_token;        
                if (!Json::write($this->cacheFile, $this->cacheData)){
                   return $res->access_token;        
                }
            } else {
                return $res->errmsg;
            }
        } 

        return $this->cacheData['agent'][$key]['AccessToken'];
    }
}
