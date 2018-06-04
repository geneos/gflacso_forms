<?php if(!function_exists("curl_setopt")) exit("Curl functions is not available!"); if(!function_exists("json_encode")) exit("JSON Functions is not available!");
/*
* @package    simple_restclient
* @category   webservice
* @author     Jeff Afable <jeffafable@gmail.com>
* @version    1.0
*/
class simple_restclient {


	private static $logEnabled = true;

	public function simple_restclient($url, $return_as_array=TRUE){
		$this->Service_Url = rtrim($url,"/");
		$this->return_as_array = $return_as_array;
		$this->Call = $this;
	}
	public function Service_Exists(){
		global $g_root_dir;

		if(self::$logEnabled) {
			//Log before call
			$timeStart = time();
			file_put_contents($g_root_dir.'/rest_logs/log.log', "[".$timeStart."]Start Service Exists? ".PHP_EOL, FILE_APPEND);
		}

		if(isset($this->Service_Url) && isset($this->class_name)){
			$stream = @fopen("{$this->Service_Url}/?class={$this->class_name}","r");
			if($stream){
				$buffer = trim(fgets($stream));
				fclose($stream);
				if($buffer==1){
					if(self::$logEnabled) {
						//Log on return
						$timeEnd = time();
						file_put_contents($g_root_dir.'/rest_logs/log.log', "[".$timeEnd."]End Start Service Exists?. Calculated Elapsed time: ".($timeEnd - $timeStart).PHP_EOL, FILE_APPEND);
					}

					return TRUE;
				}
			}
		}
		return FALSE;
	}
	public function SetClass($name){
		$this->class_name = $name;
		return $this;
	}
	public function SetAuth($uid,$pwd){
		$this->uid_auth=$uid;
		$this->pwd_auth=$pwd;
		return $this;
	}
	public function Method($FuncName,$Variable=NULL,&$ByRef=NULL){
		global $g_root_dir;
		$uid_auth = ""; if(isset($this->uid_auth)) $uid_auth = $this->uid_auth;
		$pwd_auth = ""; if(isset($this->pwd_auth)) $pwd_auth = $this->pwd_auth;
		$FuncCall["BAS_REST_AUTH"] = "{$uid_auth}::{$pwd_auth}";
		$FuncCall["BAS_REST_CLASS"]	= (isset($this->class_name)) ? $this->class_name : "";
		$FuncCall["BAS_REST_FUNC"] 	= $FuncName;
		$FuncCall["BAS_REST_VARS"] 	= json_encode($Variable);
		if(self::$logEnabled) {
			//Log before call
			$timeStart = time();
			file_put_contents($g_root_dir.'/rest_logs/log.log', "[".$timeStart."]Start Method: ".$FuncName.PHP_EOL, FILE_APPEND);
		}
		$Return	= $this->GetCurl("{$this->Service_Url}",$FuncCall);
		$ByRef	= json_decode($Return["content"],FALSE);

		if(self::$logEnabled) {
			//Log on return
			$timeEnd = time();
			file_put_contents($g_root_dir.'/rest_logs/log.log', "[".$timeEnd."]End Method. Calculated Elapsed time: ".($timeEnd - $timeStart). " CURL Elapsed Time: ".$Return['total_time'].PHP_EOL, FILE_APPEND);
		}
		if(isset($ByRef->Result)){
			$ByRef	= json_decode($ByRef->Result,$this->return_as_array);
			$ByRef	= $ByRef[0];
		}else{
			$error = (isset($Return['content']) && $Return['content']!="") ? $Return['content'] : "Invalid REST Server/Server Error.";
			$ByRef	= strip_tags("UNKNOWN_ERROR: {$error}");
		}
		if(isset($this->class_name))
			$this->addState($Return, "class_call",    $this->class_name);
		$this->addState($Return, "function_call", $FuncName)->
			addState($Return, "function_vars", $Variable)->
				service_status = $Return;
		return $ByRef;
	}
	private function addState(&$arrState,$keyState,$value){
		$arrState[$keyState] = $value;
		return $this;
	}
	private function GetCurl($url, $param, $returnHeader=FALSE){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		if($returnHeader==TRUE) curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$content	= curl_exec($ch);
		$err		= curl_errno($ch);
		$errmsg	= curl_error($ch);
		$header	= curl_getinfo($ch);
		curl_close($ch); 
		$header['errno']   = $err;
		$header['errmsg']  = $errmsg;
		$header['content'] = $content;
		return $header;
	}
}
# END_PHP_FILE