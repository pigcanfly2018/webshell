<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.1
*/error_reporting(6135);$sc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($sc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Wg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Wg)$$X=$Wg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$e;return$e;}function
adminer(){global$b;return$b;}function
version(){global$ga;return$ga;}function
idf_unescape($Sc){$pd=substr($Sc,-1);return
str_replace($pd.$pd,$pd,substr($Sc,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($bf,$sc=false){if(get_magic_quotes_gpc()){while(list($z,$X)=each($bf)){foreach($X
as$id=>$W){unset($bf[$z][$id]);if(is_array($W)){$bf[$z][stripslashes($id)]=$W;$bf[]=&$bf[$z][stripslashes($id)];}else$bf[$z][stripslashes($id)]=($sc?$W:stripslashes($W));}}}}function
bracket_escape($Sc,$_a=false){static$Jg=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($Sc,($_a?array_flip($Jg):$Jg));}function
min_version($kh,$Bd="",$f=null){global$e;if(!$f)$f=$e;$Jf=$f->server_info;if($Bd&&preg_match('~([\d.]+)-MariaDB~',$Jf,$C)){$Jf=$C[1];$kh=$Bd;}return(version_compare($Jf,$kh)>=0);}function
charset($e){return(min_version("5.5.3",0,$e)?"utf8mb4":"utf8");}function
script($Sf,$Ig="\n"){return"<script".nonce().">$Sf</script>$Ig";}function
script_src($bh){return"<script src='".h($bh)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($cg){return
str_replace("\0","&#0;",htmlspecialchars($cg,ENT_QUOTES,'utf-8'));}function
nl_br($cg){return
str_replace("\n","<br>",$cg);}function
checkbox($E,$Y,$Na,$md="",$le="",$Ra="",$nd=""){$K="<input type='checkbox' name='$E' value='".h($Y)."'".($Na?" checked":"").($nd?" aria-labelledby='$nd'":"").">".($le?script("qsl('input').onclick = function () { $le };",""):"");return($md!=""||$Ra?"<label".($Ra?" class='$Ra'":"").">$K".h($md)."</label>":$K);}function
optionlist($pe,$Ef=null,$eh=false){$K="";foreach($pe
as$id=>$W){$qe=array($id=>$W);if(is_array($W)){$K.='<optgroup label="'.h($id).'">';$qe=$W;}foreach($qe
as$z=>$X)$K.='<option'.($eh||is_string($z)?' value="'.h($z).'"':'').(($eh||is_string($z)?(string)$z:$X)===$Ef?' selected':'').'>'.h($X);if(is_array($W))$K.='</optgroup>';}return$K;}function
html_select($E,$pe,$Y="",$ke=true,$nd=""){if($ke)return"<select name='".h($E)."'".($nd?" aria-labelledby='$nd'":"").">".optionlist($pe,$Y)."</select>".(is_string($ke)?script("qsl('select').onchange = function () { $ke };",""):"");$K="";foreach($pe
as$z=>$X)$K.="<label><input type='radio' name='".h($E)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$K;}function
select_input($wa,$pe,$Y="",$ke="",$Oe=""){$rg=($pe?"select":"input");return"<$rg$wa".($pe?"><option value=''>$Oe".optionlist($pe,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Oe'>").($ke?script("qsl('$rg').onchange = $ke;",""):"");}function
confirm($D="",$Ff="qsl('input')"){return
script("$Ff.onclick = function () { return confirm('".($D?js_escape($D):'Are you sure?')."'); };","");}function
print_fieldset($u,$ud,$nh=false){echo"<fieldset><legend>","<a href='#fieldset-$u'>$ud</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$u');",""),"</legend>","<div id='fieldset-$u'".($nh?"":" class='hidden'").">\n";}function
bold($Ga,$Ra=""){return($Ga?" class='active $Ra'":($Ra?" class='$Ra'":""));}function
odd($K=' class="odd"'){static$t=0;if(!$K)$t=-1;return($t++%2?$K:'');}function
js_escape($cg){return
addcslashes($cg,"\r\n'\\/");}function
json_row($z,$X=null){static$tc=true;if($tc)echo"{";if($z!=""){echo($tc?"":",")."\n\t\"".addcslashes($z,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$tc=false;}else{echo"\n}\n";$tc=true;}}function
ini_bool($Xc){$X=ini_get($Xc);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$K;if($K===null)$K=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$K;}function
set_password($jh,$O,$V,$G){$_SESSION["pwds"][$jh][$O][$V]=($_COOKIE["adminer_key"]&&is_string($G)?array(encrypt_string($G,$_COOKIE["adminer_key"])):$G);}function
get_password(){$K=get_session("pwds");if(is_array($K))$K=($_COOKIE["adminer_key"]?decrypt_string($K[0],$_COOKIE["adminer_key"]):false);return$K;}function
q($cg){global$e;return$e->quote($cg);}function
get_vals($I,$c=0){global$e;$K=array();$J=$e->query($I);if(is_object($J)){while($L=$J->fetch_row())$K[]=$L[$c];}return$K;}function
get_key_vals($I,$f=null,$Mf=true){global$e;if(!is_object($f))$f=$e;$K=array();$J=$f->query($I);if(is_object($J)){while($L=$J->fetch_row()){if($Mf)$K[$L[0]]=$L[1];else$K[]=$L[0];}}return$K;}function
get_rows($I,$f=null,$k="<p class='error'>"){global$e;$db=(is_object($f)?$f:$e);$K=array();$J=$db->query($I);if(is_object($J)){while($L=$J->fetch_assoc())$K[]=$L;}elseif(!$J&&!is_object($f)&&$k&&defined("PAGE_HEADER"))echo$k.error()."\n";return$K;}function
unique_array($L,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$K=array();foreach($v["columns"]as$z){if(!isset($L[$z]))continue
2;$K[$z]=$L[$z];}return$K;}}}function
escape_key($z){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$z,$C))return$C[1].idf_escape(idf_unescape($C[2])).$C[3];return
idf_escape($z);}function
where($Z,$m=array()){global$e,$y;$K=array();foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$c=escape_key($z);$K[]=$c.($y=="sql"&&preg_match('~^[0-9]*\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($y=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($m[$z],q($X))));if($y=="sql"&&preg_match('~char|text~',$m[$z]["type"])&&preg_match("~[^ -@]~",$X))$K[]="$c = ".q($X)." COLLATE ".charset($e)."_bin";}foreach((array)$Z["null"]as$z)$K[]=escape_key($z)." IS NULL";return
implode(" AND ",$K);}function
where_check($X,$m=array()){parse_str($X,$Ma);remove_slashes(array(&$Ma));return
where($Ma,$m);}function
where_link($t,$c,$Y,$me="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($c)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$me:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($d,$m,$N=array()){$K="";foreach($d
as$z=>$X){if($N&&!in_array(idf_escape($z),$N))continue;$ua=convert_field($m[$z]);if($ua)$K.=", $ua AS ".idf_escape($z);}return$K;}function
cookie($E,$Y,$xd=2592000){global$ba;return
header("Set-Cookie: $E=".urlencode($Y).($xd?"; expires=".gmdate("D, d M Y H:i:s",time()+$xd)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($vc=false){if(!ini_bool("session.use_cookies")||($vc&&@ini_set("session.use_cookies",false)!==false))session_write_close();}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($jh,$O,$V,$i=null){global$Hb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Hb))."|username|".($i!==null?"db|":"").session_name()),$C);return"$C[1]?".(sid()?SID."&":"").($jh!="server"||$O!=""?urlencode($jh)."=".urlencode($O)."&":"")."username=".urlencode($V).($i!=""?"&db=".urlencode($i):"").($C[2]?"&$C[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($B,$D=null){if($D!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($B!==null?$B:$_SERVER["REQUEST_URI"]))][]=$D;}if($B!==null){if($B=="")$B=".";header("Location: $B");exit;}}function
query_redirect($I,$B,$D,$jf=true,$fc=true,$mc=false,$yg=""){global$e,$k,$b;if($fc){$Yf=microtime(true);$mc=!$e->query($I);$yg=format_time($Yf);}$Uf="";if($I)$Uf=$b->messageQuery($I,$yg,$mc);if($mc){$k=error().$Uf.script("messagesPrint();");return
false;}if($jf)redirect($B,$D.$Uf);return
true;}function
queries($I){global$e;static$ef=array();static$Yf;if(!$Yf)$Yf=microtime(true);if($I===null)return
array(implode("\n",$ef),format_time($Yf));$ef[]=(preg_match('~;$~',$I)?"DELIMITER ;;\n$I;\nDELIMITER ":$I).";";return$e->query($I);}function
apply_queries($I,$S,$bc='table'){foreach($S
as$Q){if(!queries("$I ".$bc($Q)))return
false;}return
true;}function
queries_redirect($B,$D,$jf){list($ef,$yg)=queries(null);return
query_redirect($ef,$B,$D,$jf,false,!$jf,$yg);}function
format_time($Yf){return
sprintf('%.3f s',max(0,microtime(true)-$Yf));}function
remove_from_uri($De=""){return
substr(preg_replace("~(?<=[?&])($De".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($F,$ob){return" ".($F==$ob?$F+1:'<a href="'.h(remove_from_uri("page").($F?"&page=$F".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($F+1)."</a>");}function
get_file($z,$wb=false){$qc=$_FILES[$z];if(!$qc)return
null;foreach($qc
as$z=>$X)$qc[$z]=(array)$X;$K='';foreach($qc["error"]as$z=>$k){if($k)return$k;$E=$qc["name"][$z];$Fg=$qc["tmp_name"][$z];$eb=file_get_contents($wb&&preg_match('~\.gz$~',$E)?"compress.zlib://$Fg":$Fg);if($wb){$Yf=substr($eb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Yf,$pf))$eb=iconv("utf-16","utf-8",$eb);elseif($Yf=="\xEF\xBB\xBF")$eb=substr($eb,3);$K.=$eb."\n\n";}else$K.=$eb;}return$K;}function
upload_error($k){$Hd=($k==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($k?'Unable to upload a file.'.($Hd?" ".sprintf('Maximum allowed file size is %sB.',$Hd):""):'File does not exist.');}function
repeat_pattern($Me,$vd){return
str_repeat("$Me{0,65535}",$vd/65535)."$Me{0,".($vd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($cg,$vd=80,$gg=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$vd).")($)?)u",$cg,$C))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$vd).")($)?)",$cg,$C);return
h($C[1]).$gg.(isset($C[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($bf,$Tc=array()){$K=false;while(list($z,$X)=each($bf)){if(!in_array($z,$Tc)){if(is_array($X)){foreach($X
as$id=>$W)$bf[$z."[$id]"]=$W;}else{$K=true;echo'<input type="hidden" name="'.h($z).'" value="'.h($X).'">';}}}return$K;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$nc=false){$K=table_status($Q,$nc);return($K?$K:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$K=array();foreach($b->foreignKeys($Q)as$n){foreach($n["source"]as$X)$K[$X][]=$n;}return$K;}function
enum_input($U,$wa,$l,$Y,$Vb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Cd);$K=($Vb!==null?"<label><input type='$U'$wa value='$Vb'".((is_array($Y)?in_array($Vb,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Cd[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Na=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$K.=" <label><input type='$U'$wa value='".($t+1)."'".($Na?' checked':'').'>'.h($b->editVal($X,$l)).'</label>';}return$K;}function
input($l,$Y,$q){global$Rg,$b,$y;$E=h(bracket_escape($l["field"]));echo"<td class='function'>";if(is_array($Y)&&!$q){$ta=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$ta[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$ta);$q="json";}$rf=($y=="mssql"&&$l["auto_increment"]);if($rf&&!$_POST["save"])$q=null;$Bc=(isset($_GET["select"])||$rf?array("orig"=>'original'):array())+$b->editFunctions($l);$wa=" name='fields[$E]'";if($l["type"]=="enum")echo
h($Bc[""])."<td>".$b->editInput($_GET["edit"],$l,$wa,$Y);else{$Jc=(in_array($q,$Bc)||isset($Bc[$q]));echo(count($Bc)>1?"<select name='function[$E]'>".optionlist($Bc,$q===null||$Jc?$q:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Bc))).'<td>';$Zc=$b->editInput($_GET["edit"],$l,$wa,$Y);if($Zc!="")echo$Zc;elseif(preg_match('~bool~',$l["type"]))echo"<input type='hidden'$wa value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$wa value='1'>";elseif($l["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Cd);foreach($Cd[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Na=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$E][$t]' value='".(1<<$t)."'".($Na?' checked':'').">".h($b->editVal($X,$l)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$E'>";elseif(($wg=preg_match('~text|lob~',$l["type"]))||preg_match("~\n~",$Y)){if($wg&&$y!="sqlite")$wa.=" cols='50' rows='12'";else{$M=min(12,substr_count($Y,"\n")+1);$wa.=" cols='30' rows='$M'".($M==1?" style='height: 1.2em;'":"");}echo"<textarea$wa>".h($Y).'</textarea>';}elseif($q=="json"||preg_match('~^jsonb?$~',$l["type"]))echo"<textarea$wa cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Jd=(!preg_match('~int~',$l["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$l["length"],$C)?((preg_match("~binary~",$l["type"])?2:1)*$C[1]+($C[3]?1:0)+($C[2]&&!$l["unsigned"]?1:0)):($Rg[$l["type"]]?$Rg[$l["type"]]+($l["unsigned"]?0:1):0));if($y=='sql'&&min_version(5.6)&&preg_match('~time~',$l["type"]))$Jd+=7;echo"<input".((!$Jc||$q==="")&&preg_match('~(?<!o)int(?!er)~',$l["type"])&&!preg_match('~\[\]~',$l["full_type"])?" type='number'":"")." value='".h($Y)."'".($Jd?" data-maxlength='$Jd'":"").(preg_match('~char|binary~',$l["type"])&&$Jd>20?" size='40'":"")."$wa>";}echo$b->editHint($_GET["edit"],$l,$Y);$tc=0;foreach($Bc
as$z=>$X){if($z===""||!$X)break;$tc++;}if($tc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $tc), oninput: function () { this.onchange(); }});");}}function
process_input($l){global$b,$j;$Sc=bracket_escape($l["field"]);$q=$_POST["function"][$Sc];$Y=$_POST["fields"][$Sc];if($l["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($l["auto_increment"]&&$Y=="")return
null;if($q=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$l["on_update"])?idf_escape($l["field"]):false);if($q=="NULL")return"NULL";if($l["type"]=="set")return
array_sum((array)$Y);if($q=="json"){$q="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads")){$qc=get_file("fields-$Sc");if(!is_string($qc))return
false;return$j->quoteBinary($qc);}return$b->processInput($l,$Y,$q);}function
fields_from_edit(){global$j;$K=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$E=bracket_escape($z,1);$K[$E]=array("field"=>$E,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$j->primary),);}return$K;}function
search_tables(){global$b,$e;$_GET["where"][0]["val"]=$_POST["query"];$Hf="<ul>\n";foreach(table_status('',true)as$Q=>$R){$E=$b->tableName($R);if(isset($R["Engine"])&&$E!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$J=$e->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$J||$J->fetch_row()){$Xe="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$E</a>";echo"$Hf<li>".($J?$Xe:"<p class='error'>$Xe: ".error())."\n";$Hf="";}}}echo($Hf?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Rc,$Qd=false){global$b;$K=$b->dumpHeaders($Rc,$Qd);$Ae=$_POST["output"];if($Ae!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Rc).".$K".($Ae!="file"&&!preg_match('~[^0-9a-z]~',$Ae)?".$Ae":""));session_write_close();ob_flush();flush();return$K;}function
dump_csv($L){foreach($L
as$z=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$L[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$L)."\r\n";}function
apply_sql_function($q,$c){return($q?($q=="unixepoch"?"DATETIME($c, '$q')":($q=="count distinct"?"COUNT(DISTINCT ":strtoupper("$q("))."$c)"):$c);}function
get_temp_dir(){$K=ini_get("upload_tmp_dir");if(!$K){if(function_exists('sys_get_temp_dir'))$K=sys_get_temp_dir();else{$rc=@tempnam("","");if(!$rc)return
false;$K=dirname($rc);unlink($rc);}}return$K;}function
file_open_lock($rc){$p=@fopen($rc,"r+");if(!$p){$p=@fopen($rc,"w");if(!$p)return;chmod($rc,0660);}flock($p,LOCK_EX);return$p;}function
file_write_unlock($p,$qb){rewind($p);fwrite($p,$qb);ftruncate($p,strlen($qb));flock($p,LOCK_UN);fclose($p);}function
password_file($g){$rc=get_temp_dir()."/adminer.key";$K=@file_get_contents($rc);if($K||!$g)return$K;$p=@fopen($rc,"w");if($p){chmod($rc,0660);$K=rand_string();fwrite($p,$K);fclose($p);}return$K;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$l,$xg){global$b;if(is_array($X)){$K="";foreach($X
as$id=>$W)$K.="<tr>".($X!=array_values($X)?"<th>".h($id):"")."<td>".select_value($W,$A,$l,$xg);return"<table cellspacing='0'>$K</table>";}if(!$A)$A=$b->selectLink($X,$l);if($A===null){if(is_mail($X))$A="mailto:$X";if(is_url($X))$A=$X;}$K=$b->editVal($X,$l);if($K!==null){if(!is_utf8($K))$K="\0";elseif($xg!=""&&is_shortable($l))$K=shorten_utf8($K,max(0,+$xg));else$K=h($K);}return$b->selectVal($K,$A,$l,$X);}function
is_mail($Sb){$va='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Gb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Me="$va+(\\.$va+)*@($Gb?\\.)+$Gb";return
is_string($Sb)&&preg_match("(^$Me(,\\s*$Me)*\$)i",$Sb);}function
is_url($cg){$Gb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Gb?\\.)+$Gb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$cg);}function
is_shortable($l){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$l["type"]);}function
count_rows($Q,$Z,$fd,$s){global$y;$I=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($fd&&($y=="sql"||count($s)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$s).")$I":"SELECT COUNT(*)".($fd?" FROM (SELECT 1$I GROUP BY ".implode(", ",$s).") x":$I));}function
slow_query($I){global$b,$T,$j;$i=$b->database();$zg=$b->queryTimeout();$Qf=$j->slowQuery($I,$zg);if(!$Qf&&support("kill")&&is_object($f=connect())&&($i==""||$f->select_db($i))){$kd=$f->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$kd,'&token=',$T,'\');
}, ',1000*$zg,');
</script>
';}else$f=null;ob_flush();flush();$K=@get_key_vals(($Qf?$Qf:$I),$f,false);if($f){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$K;}function
get_token(){$hf=rand(1,1e6);return($hf^$_SESSION["token"]).":$hf";}function
verify_token(){list($T,$hf)=explode(":",$_POST["token"]);return($hf^$_SESSION["token"])==$T;}function
lzw_decompress($Da){$Cb=256;$Ea=8;$Ta=array();$sf=0;$tf=0;for($t=0;$t<strlen($Da);$t++){$sf=($sf<<8)+ord($Da[$t]);$tf+=8;if($tf>=$Ea){$tf-=$Ea;$Ta[]=$sf>>$tf;$sf&=(1<<$tf)-1;$Cb++;if($Cb>>$Ea)$Ea++;}}$Bb=range("\0","\xFF");$K="";foreach($Ta
as$t=>$Sa){$Rb=$Bb[$Sa];if(!isset($Rb))$Rb=$th.$th[0];$K.=$Rb;if($t)$Bb[]=$th.$Rb[0];$th=$Rb;}return$K;}function
on_help($Za,$Of=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $Za, $Of) }, onmouseout: helpMouseout});","");}function
edit_form($a,$m,$L,$Zg){global$b,$y,$T,$k;$lg=$b->tableName(table_status1($a,true));page_header(($Zg?'Edit':'Insert'),$k,array("select"=>array($a,$lg)),$lg);if($L===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$m)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($m
as$E=>$l){echo"<tr><th>".$b->fieldName($l);$xb=$_GET["set"][bracket_escape($E)];if($xb===null){$xb=$l["default"];if($l["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$xb,$pf))$xb=$pf[1];}$Y=($L!==null?($L[$E]!=""&&$y=="sql"&&preg_match("~enum|set~",$l["type"])?(is_array($L[$E])?array_sum($L[$E]):+$L[$E]):$L[$E]):(!$Zg&&$l["auto_increment"]?"":(isset($_GET["select"])?false:$xb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$l);$q=($_POST["save"]?(string)$_POST["function"][$E]:($Zg&&preg_match('~^CURRENT_TIMESTAMP~i',$l["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$l["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$q="now";}input($l,$Y,$q);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($m){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Zg?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Zg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."…', this); };"):"");}}echo($Zg?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$m?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$T,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0Ė\0\n @\0ԂCĐ蕜"\0`E䑸¿ǿtvM'ՊdYd\\͢0\0Ŝ"ڀfӈŮs5܏蒁ݖXPaJӰĥњ8ģR˔ɑz`ȣ.ʇc��-\0m?.֖̍\0ȯ(̉��/(%͜0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇ԙ͞l7܇B1Ĵvb0ٍfsѼ뮲B͑ҙٞn:ǣ(ݢ.\rDc)Ɉa7EēѤìǃє驱̎sش筴هfӉɎi7ƃԩƋĎ͆éնt2ގÓ!֌r0У㤴~ޕͧ3MIWłƧcΐº6T\rcāߺr_֓\r-ݖNFS%~ģә�\\^˲ΦuÅσߴً4'7kרЂ䒔稖ڧg\rFB\ryT7SSƐб=ǤcI銺ΤԺm>ē8LǊ\t.Mϊ	ϋ`'C|ܐ889ň ϿQٽͮ2ͣ8АͣҘ6m򲑆𪞈è˼ŌЫ̙9/뙧:ъꪊ¤\0d>!\0ZǏɶ켮뿰ݯ(۳ƉkԷݏsṾ̋ђ\"*nS��P\"¨Ҩˣ[֥Āgگ􃁭Ӻn��8ǮڙʱՉ*ɴ=ήҤʎϸ谫c(��P衰��c�Ύͅ7D񌊩1ɤأ`¸(╳Mɳ\"ǳ9霿E¥=Ҭ��қ��Ӹ7;ʃĐ[΅\rd!)á*ϵajo\0ʣ`ʳ8ל0˭]ԥͪɆ2ĉmk׎𥝅mAZs֓tZ֚!)BRɇ+ΣJv2(㡶Ŵ<أsBϰ꺂6YL\rҝ=Åࠛ׷3ǰ<ԺÊbx՟J=	m_ ߏƦʎlٙش̥IʃHڳи*ᷠt6߃%ݜUՌ򐥙<՜0ʁQ<P<:ڣu/ĺT\\>K-ƸJɍ͋QH\nj+j޺𳰷Õ̠ްγ\nkÃ'ԎԶX>T˩֜ؐƴ*LԥCj>7ߨ˞Ȏεڠ񮗜;yٻǱ²ʳ#ə} :#n㾞ŽC凁ܸކ΁s&8ΣK&ܴ*0ҒtޓʔŽߛس:ޜ\]ĿE݌ݯO࿞]؅ø¼ΨٷgZՖǩqڳʌ񠱋x\\͍薶ڟ޺Ԅ\"J\\îɻ##aބǎx6Ꝛ5x˜8ֆɜrH𬠋񸰃b򠲼7┶Ǡ��j|I��ۖ*􆌁quvyOҽWeM˂֚��Fⶆ:RМ\$-ֵT!텓`иDپࠠA`(ȥmæ򽢔@O1@چXǢԜnLp𖑐忁Ԃmˑyf؋é	ɫۇSEIɁňxC(s(aݿ\$`tEɮűѭ,��$aЋU>,鐒\$Z񫄭,G\0噠\\Аi򕣥ʹ n̥űجޜgщŢ	y`ӲԆ̗췠䗗Z_CDT\niяH%՝daViͷ퇁tЬnJǘ4nȑԈ0o͹۹g\nzmˎM%`ɧI􀍅О-鲩з:p𳑰ǈΑزEDڤج`b2]ƐF}Ɖ>eʺƳj\n_Ѵ!4fѴK;Ċ\rΞи͡ᯎʃuݿԺhސҰuIC}'~ƈ2ȶ��θ)퀆7텉񽧩y&բea᳎*hɕjlAĄ(ꜜ"Ŝ\Ԫm^iѮM)°^É|~֬ȶ#!YΦ81RSΠu!ǆ趲PƝCҴl&幤!ͼh9ѠןOY�҇ᜅɈ-eL񝃶T̒ )ŀѪ-5Ȇ֜pSgۮӇ=TњEӶ\$\0ÑƛKj֜$ÀG'I吩þ󎚁𠻁ۨNێG%*⓪񉘛ݘPf^q|穔!ժN𰐆ٜrU^q1V!ĹUz,ĉ|7зǲ,ޡ̷ը߄߂׹Ȼ鬷ȩߕɁ۰Ύއ^\!~ؼW!3Pˉ8]ӽvԊӁf񱣼,ު躗𦠂\0ⱈA֎wE͠爕ԦFǑ˙TՑGϹќ$0Ǔʠ#ǥBy7rɩ{eΑԓ߅򈤄¬Ǉ ͂4;ks(屝ρ=бr)_<ߏ՘;̹ާS͛r &YǬh,ΟiiكցbʌÁש ݥGѴL͘z2p(Ǐڵԉð0ʛÌ	ySƺȨE뀘	<ʄȽ_#\\fʨdaʄ茥3ݙ|V+뭀Ұ`;Ơ̌hƤҁޯj'فۘ��ٻY⫶ʑZ-i´ݹvÖIٵړ0O|ސםF܏ⳓ񱜰Ѽ˲ڄ9͢٤®/χQس&ƪI^Θ=ԬΩqfIǊ= םxqGR􆿦eٷ麩˳9*ƺBӢѾaǺǭՉѲ.ж̸b{Ѱ4#ĥܑ򓄘Uᓍǌ7-ݿ¶/;ʵ񒴎uʊ��Ǧң��נ՗G׸Πӷp񘝰ҠYC~:@ǞEUɓJܟۻv7v]׊'ؗޕ山ﷂꆬ��iߍďįk<Ѡ֡Mݰo郁ı֙ެ�æڟuӗΰ۵޽ƹ򼺽ۑׇtn��ىнߙ~،x﹦̖{kߟȥ߹\rj~ؐ+Ͽ籐u򯷚yu\$ݨ߷dƉm՚d8i`Ľ󛧰<ǘ񛓬⍈*+3j̦ͼ܏<[͜0Ү��΂��Ŷ`̠ݣx嬂?#��;Ob\rɨ񯴸Мn��0\n򐎴߰М\װ>ΐPퟃ�Ѐ2ìǂjӏʌ덿Ȩ_ї\$فg۸Gδא@󬮇hݓiƾЬPHМnǊ좋쩌D䨶łтׂ	όĲZ⍜rȖ6Į͐匰뎰ࡆ��-ѧ\r`\r\0̧ڌqчѣ#q`ߐ􅨝#EѨq}ɐׂ򇐩񉓑 4@꺃ʦ|\0``fӪ◠͖`אבQRv_yj\r񭏱BѠŹ7Ѧˀ؋񗓑܋ѠđĪ`ߗ񛛑џIьٔ1֘@`)l±˒xᬩґҞ𱋙Ҝ)άޢ랱sQeyqw1ǟ遠2 Ҳ*ďɇq wg>CЮBӋȺA*Ͼp՜P될ώ	Cڜ$ȟÒѳ2M%Fђӗљ%RO&2S\rӫᘍӾүҪPڜ$@ށӟ)rw&ӏRq%ɱ*rm)ҫ'ӏ'ѱ'Rݨ5(Iٖr:im,͟ɬӑ0\0ۙ򄍂��%rۭ񠽒чr맲K/Ә@`谒:,#*ҥ+RY3򾐇E􃐙Ѳ3'-Q*\r`ʏ113s;&cq10봆ϮɁ2끳2@7*2f`ђ箑!ԅ҇&򗶒%ѭ7ыbv񙥓󄛓ϱ҅`󹹲[7Qu9Ӡ˳ɷө>\rɅ;ϴӹ;ӣ!s١c\\eݻ1<Sqԓ=s׵2ǬҪS񩐪]񢋳񒭰&Q'<ѱ@1ΰ\"zhЙъPԖRʘiˏͅ.JӮ҂ё&郜nЋ0ˉ5;ѰjɽD𙹭\r\"Sϼѱ@եs䆱ťӦ͔.Ϫٌܓi3˺ӧE󥈳٠·̨ͮ��IJө!4YҹJԗK󋴳;ѺT.уĩʐÂo)|P;.ȎɲД㝮lܛ*ε⫒j��ݣOĬӂ⯨ڮ�� A͜rÆ.Ҹ8ֲtڣ��ANb̎ɿ񡀋OB󏔬dͼ*");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:یgCIݜ\n8݅3)ы7܅Ƹ1ъx:\nOg#)Ѫr7\n\"Ǩՠ𼲛ͧSi׈)NǓҤȜrǝ\"0ڄ@䩝ࠠ(\$s6O!Ԩݖ/=݌' T4潄٩S؍6IOԊerڸЈ*źкn3ޜrщvă`��G%ə䧡��Φ��ìŃ1њ\nyÜ*pC\r\$ͮΔʕ3=\\ò9O\"㊀ᬼ˜rȜ\3I,םs\nAņeh+M⋡α0ڽfܠ(ٚN{c֗+w̱Öp٧3ʳ򚘫Iǔjٺ��ײnٱܘÍzi#^rـڞԋ3颍Лߨۯ;ϋ(̐6ͣRЎΜ":cz>ߣC2vсCXʼؕģ*5\nڨ跑/��񼆻ѣ0óȰ䡍È慡Ȝáʃ\nZ%Èć#CH̔!ɒr8蜤š쯬ɒܔ2ƈ䞰ء@Ĳ͢(𸅁8P/àٝš\\$La\\廎cሔšHXā֜nʃt܇ṁ<гZ��;Iю3@Ҳ<ʢ̡A8G<ժ߭Kè{*\rӅa1ǡ鎴Tc\"\\ҡ=1^ְލ9OӺƻj̊\r䙒ጣHηãTݪ/-ԋİʻ \n߲!åδ]apΎޮ\0R܃̶͍É,\r��0Hvѝ?kT޴Êݳuٱؔ;&Ґ򫦃ܰյ\rɘύ¢u4ݡi88²B䰢Ö4Ç@N8A݁)52ˈ掲Ȩs㹧ӝ5ĥ°盗C@躎ٴƣ޴ץКh\"#8_٦cp^㉢I]OH��zdȳgèĈ؃׫ٮӘ\\6Ԑؐ2ۚ׷کØ䷲ُ]\rĸO߮۰輡°ѮUѮ̲|@茳#G3퟇�AɊ6��7%#ٜ\8\r��ɣ\r擄ݟkΌ®(҉Β-؊;󓠈ꍣϠÌܞW㹣Ǔѥɤ◷מn󠒧ܦ��9ZНs]뺮Ϭ캞[Ь4-ە\0taֶ2^՘.`ėâ.Cࠪ��% Q\0`d썸ߦ݋ܜ$O0`4ӪϜn\0a\rAļǀ߃ۊ\r!:قA߹ٿh>Ňڋ~̌׶Ȉhܽ˭݁7X偖ǂ\\ݜrQQ<蚧qҧ!XΓ2򔠰!̈́\rǓҬK՜"祁و֝qR\rŌ" =ϭf䝿Αȼc՜n#<5΍ퟚ�EÜy̡ԓǰ򯜢ѣJKL2񕦣٥R݀WсΐTwˑѻ抂ɢ❜`)5ǔޜB򱅨T3ȠR	ا\r+\":ٰ֠ஓҚM'|ͥt:3%L݋#f!񨠐׀e̳ܒ٫ļΎṉ}_ӃXʝGƵi-ãzߜ$ӯK@O@Tҽ&Ɂ0݂\$	ُDAћƹ񄠪SJ鸹ׁFȈmlɈp܇խŔжRf@ġߜrsԗRˆgih]Ʃfٮշ+ѼnhhҪ ɓH	P]`:ҒɁa\"Ȑֹ̅2ƦRɩ񂦐ʙԈ/H�� {r|Ȱ^ِhCA̰܀玎㧲әBԄ@ʢz˕ʑߏ��ppӥ\\ߌ˓%議ۄӹ̧odåՉհ3׎݊7EؗќA\\ѶǋěXnØi.њ؍ 󕟘sIG��tI򁙑JӼٱև1#RȳD͒cפඕtMihǤ9û9gCqؒL׻Mj-TQͶi̇_!퐮ި˶߻cNȌ����@n|��󜫘AЭĀ3򛚻]Ήs7��@ :̱т؆bؠ֬ݟے·ϨiԸ:җ溑\\󺘻ԹՁꑕ T^ĝ9ޠUX+Un̑+ɒĢ̀񪏔sȼ؎[ࠛʸk󆪴ݧ_w.򟅶~򢛎mK쿳IߍKʽŗ۸榈ɲɤժmd謜QАeH��ΌȄ`a҂Ͻųs쑸aM\"apĀ:<ᆤGB՜r2Ytx&L}}ҟAДҎƇЬzaնD4𴔴QʶSʃړ\rλU٪ǩ彸Ն~ӰBퟏ�҆,ܗÏգt;ȊYZC,&YںY\"ݣɁݣćt:\nҨ8rϡꕈh>D>Z𸠦ᢞpY+ڸ̈UֽAܼ?㕐xWաЗىi͋.ʜr`��zʒދԖƝ͚rܤǎHӈ5ƛf\\ڭKƩǶܕZ褮Aٕ(Ȼ3ίܳߡl.ࠬڊꅮ蝜t2暻ί읲\0Ս>c+¼*;-0﯂ᛋ´@ܚֲĽcQ\n.zɕʷC&Ȕ@ҹǆ畃ȇΧcBS7_*rsѨԿj𳇀ֈ��.@7߳˝Ӫ򌷛΁G࠰@��q݁Ձ&u󔘳t˜nՎՌࠅєŰνgG׾ٮw찶(*تퟙ��ƅ񢕳࠭kޅ��īߙtעS𥁨󤱞A￯x\nص��ϣ:D࠸+ߑ g㍤h14 ע\n.퟾�˖䬒v��lYʪکꏪJ݇ƐN+bРDѪܬD˞P嬄LQ`Of֣@ٽШޅ¶ўnBӋ4ܠݥ\n	ƴrp!ѬVħѽbɪr%|\nr\r#ΰŀwμ-Ք.Vv⹬˦\nmFƯȏp͏`򙰬Т뭄聐\r8Y\rȘݤ҉QǁВ%Eί@]\0ʌ{@͑ј✰bR M\rǙ'|è%0SDrȂȎf/נÜb:ܭ϶߃%߀洈Ǹ\0ì\0̌ƚ	цW៖%ۜn繜r\0}ŉ1d#Ҹä.jEoHrǢlbXڥt즴ٰŀ䞥ѴӥҏkϺ2\r񣚠禜rJ±X$ڱ߄6!Ж􏆪Ǘ䳻4<EƋk.m뵄򂗎\r\n럩΀͠賡n˞҅!2\$Ȉ􍌞��񶄬Źk>ϯÅ̎򂵜$͠鳔ެ׌Ă̠֌ Z@ۭ*Ѕ`^P𐆥5%˴҈㘀𯮼��fѶҼڲ@K:ͯ۹򒌏Ǎ-黲\\Wi+fۦу򧦲n'eӼ²ԿnKŲ󲚶̰᪮⮚��Ɖ*Б+˴Ђg* 򆞑ű+)1hʊ`Q#񘎢n*h򠲶Â㏒񜰜\F\nǗƲ f\$󽴜$G4edbغJ^!Ӱ	_ềƥ2K6ӮFQ钺󈅑Yтӎdts\"גđҍB(РۜrϣRɰѱVβԄ󺘪⻒ߪ2E*sĜ$͏+zbXl͘tb̡-łےS>ӹ-椢=峜$S𜤥2JwԪۜ"[́\"H][6ӀSE_>汮\$@z`�4ҳʼƃSժ﫛R{DO՞ʋCJj峚P򺅧鈕 QEӖ揠%r񯻷оG+hW4E*P#TuFjՓ\nߥ񄴞糚Ȳ.슅Rk愀z@֏@ۅųD㡃Ö!C祅֜0񘛊)3<ΎQ4@ٳSPȢZBӵFL䩾GӵΈґ:񂓵\$XҔ��fˋ㉝Ζs3S8񜰘ԂtdӼ\nbtN矠Q»\rݑHÕPМ0ԎϦ\nᜤVӜr:Ӝ0]V5gVƄ򅄎`Ȏ1:ԓS4QŴԎՏ5uӵԠx	Ҽ5_FHݟ��󩀓VĞ#뼂ռ ռҋУ7\\]-˺2Ԝ0��JU6kv׵Σ֒\r֬אħ{U��࠮��VJ|Y.Ȟɛ\0u,ހ򰴦ѵ_UQD#֚JuĘt񓵞_流O,Du`N\r5ԁ`̽ZQM^m͐툛ҁaܢᎋ䞮VreۜnR%Ĵړo_(񞶱@Y6t;I\nGSMóȗ^SAYHhBϖѵfN?NjWU֊Аø֯Yֳke\"\\B1ߘŰڠ֥nф�Ə`Sӌ؜nіڮg͵Zj0R\$樝��[ל\ޭ񲕌ފ,拴Ѱ܌РcPȰѱ@RՁrw>̷CKхt֠}5_uvhĔԠ/zМ$򖊏)В��73פ\r;Χw՝��񛉟\"4ўrеˮǏ߫꿦0>ʟ-eqeD��ծ̈́f̨􂜢Z(׳ZW̶\\Lꍷke&侇͠څҩ\$ϰՍrة*؄㕧\0̮Q,֢8\r҈ٜ$׭KÈYàѩoΥ%tղ��J��ر/I/.ƥn̾x!8Հ|f٨υۄ-HإϦدņoǅ͇퟊�Ԡ̞j݀t֩>('L\r`HsK1ԎeĎ\0߁\$&3Ӝ0窮3�o䓶��Ϸ��jиΈڱɁ(b.նC]θ̍ه:wi̟\"Ϟw՟Qɟƅຖo~ޯźҒ��`Y2ϔD͖򔐆ӯk㸳ٷZЈ𑰊ĝ2k2rܿ񛊏Шɽɔň]O&Ȝ0ō\0כ8օȈ΅既8&Lۖmv1ꙪŗۇF慜\ٶ	ٺަs咀Q۠\\\"򢀰	ᅜrBs݉wނ	ߙ韂N ڷǖC/*ڋ(\n\nĈڛˋڹԪAؠ񔅏VP.UZ(tz/}\n2çyۓ͢ڬ#ɳ㩇ѾW@yCC\nKTߚ1\"@|źC\$􇀟CZjzHBیVԬKۿúŏ؁PၘōԋŰɨڃ;D򗚚WƿaڀМ0ފÃG8ג 	ড়nńΈېPǁĨ&Κڍiݬ۰fV|@Nɢߜ$[ȉҊ͙⌅ᰅƴᚥ@Zd\\\"Ƽ+ۮ۬tz𯜤⌜0[Өޅҹąg봉ٮbhU1Â,r\$㍯8DǲȆ̆V&ځ5h}ςNݍӦۧՕefGڙٸ:ܞzʖPu	Wښ\"rں󨏆w،֨#1ŴOƤċ㩱`妄󘐄ȶ|KǺwD򪅨WºzͨܯĻ��|Z׫%ʥڡŲ@[Ɗ򄂻&ٻӘܺ#ʘʙφÔ:)àY6󲖨&ڜ	@Ɖ܇􉄒!۩һ֠ܢ2M̈́叻ҫҗƛܩ뺃䋆Z␰!Äaڄ*FŢډӁčߠ̤#Ĥ9f樓ɯS􁉠z閌*θ۫ɌN񋄭ٍՍĭkdЮ፩ϊ냂ؾJnÃb�>,ݖדPϸը>֛w\"E.Ēz`ޏ̵_hݴE\\񏉫гP筳ӥs]ԕʧoVSñ񄜮$	*ǜr۸7)ˊżmސWޕՀࠕǰȷޔf՗ܓi��Ќ\rĨ'W`߂dㅯh*ǁͬۍϤ_\nh��쏪唂5ڦA2é`؇᝜RхE\"_ןܽ.7ƍܶd;ּ?ɜ)(;߻ʽKٛ̅󻆚?ޕyI ��pˢu\0茩ȅ҇҅́Ļ󣅜riųʑQǙǲʅ\rה0\0Xٜ"@q͓ϵMb��JͶʎG׾מԔwF/tӵУP߰��7ߘ��ƥۜ!ûꟖ􄅍֡(⩀8֝ͽƜ0妀ؿ�N͓ཾёџTРĥ��\"զh䜰R.\0hZԦxǠ݆9֐Q(Ԣӽń&xs=Xܢuކ@oϷĤӵ񇝐ϱP>k؊H��6/ڿ޼ߎ3ŷTЬKɾ54Љ񴣵Mלrcдx̧§T٦X\r²\$�𹽪࠿CbiǞ󆱄LǷ	¢尹͓˸71ϙ bXS`O`᭰)񨚜"Ά/ƕ=Ȭ ٬ˡّ��-ء����ז㡄ĈչbAgֲ,1ºfīÈjĘh/o(Ү4ʜr��z&nw֔ķ X!𻟪@,ۼ׉Խ`\"@:Ƽ7ăX\\	 \$1H\n=ě5̄Ѓ&ځvЖ*(	ᴆHϑ#ɒ\n렘/8֫~+tЀדO&<vʍ_Yh.ؔeHxp≨aȹ0֍\nh𠅲'BťĨԮ8qтǒ!	斠eu۫]^TW͊Җd9{󾈬㗂8ƼLΡˬ!\0;ǮB#ɣ`򩳯ߙ։ńa醥򚑜/M萐ӉԬĚ𞝉a`	Ƴⲅ<(D\n��9{06܋ƈ;A8ָ5!	MZ[T⩠hVŠۈܻƩЕ@宂`ǖްΞƨ(Rb4ǖ􆉼ْɒpÒ՜$ʙўD3O~��vē¡Qү0xb͈`.ѢLÔ8iߨoC˽Ự#6ԁxʩXHС`��􎋆Ղ֥w҂ȯ\nx̀hρHˌۈrƠʼc󜀭JH⍕𜤆e1l`��֜$\"ޜhǿJӲvٿ풌ԔP؂س1uHA\0葨H2@(ʡUМ"ɅQqg]l\"ȏ%Ɏ򪫜0W˪[ΐ Ɓإô뵐ǐ򁂋NԂ᪞5\$H\rݮIPЄ'@:\0臜"#t^Ǆ͐0ƨԥ˾èܒhנ'ܼF,sZJ��Anϐ#ʨ*Xӂ׮qЋYobچȷ2ɞ?j܀B��ߣۥΖܴ񰕆a󖨱ޠZ񃁍ůrښHSQ\W	܀XZ��څ@΢ÔԝŖq𠄄:_yֿЄбʂѾ࠸Pѭ-e_嵋|2(ԇ,ǥȭrRKxdΡĨH킼􍟏ͷżPaǉґ䎬}ܐT񇖼ҹ,1ҕv맙*وůѺО+��_pi {XG֭ߝ��aJJCה%N1ȒI:V@ZՁ%ɂ*ռ@NNxLΐLzd \$8b#ۡ2=cۍґD˭@ޜ0Ҋ᥺p󄯜$Aya4)Ĕs%!𥂉ӑ]dؓGԶ&E\$؅H\$Rj\0܇בܗGi\$إ⺅Ǚ򐀊԰񶄦ѺXӜޱ&L՟禲̉E^Фa8��لEu\$uT́*RŚ#&ȂP2֥ƤKë'ۅ%┡әWᑊִ̉ԩ��`Ċշ^l+Ƅ`ȉRٱuæFظƚ[)]J͚ą֑`љ׆N.\rՁ=X 3\0Տ~ʒƍ,˅FAT̗bفh麰͉`-bl̜n񟇅Z'תIǮќ$⏂[Ҭ8Dǟn˨`ИӳI0uʀݨf̬ӤӠȠAEy<!ՁxdAJ��aƗU״\$݀Ȅ'pȜ"ǖ󄐄Ҫ��XR)EϔRќ0SÆ@-ʔԔӮS·U\\߄\\(\r�҂k8򧠪}\$τ`aJsLΚ꒳הꘚ}抆ø%½H˚\0^U٭ |6A؟RĔ/ŬҙEǀĞ\0ąēLؗîP
Ձ󺒐0\0ѭdIڬҦϫȚլWv᠅􇐶N4\"m䏂U9P6ξr /	t擶Apʍ4R3LXǜ0ЗlSܛ1LO򕰼μS(+�Ź`1ϢsS^Ѣ8Ӊ祳֜ɘg9QԆ緁*ݗW2ҍњaGӞK߅ٰ֙靲Ӑ݄Ǧ몪͈(/因ݱ\"YȸW÷ZdփJ˜"Ć\0đ7DԒǌEȴݮx؝Cv𐖆㿏̑Ŭ_Bñ׻瓳dƓzϰҘԂ͵ILZc󙸐ƌڔ\"J%䗒ćęʥa䨬^%zƵ=Ó)ӗԚxՆŻQڏZˀ&;Π֎u.̀󦆕(仆{SےaѤMҸ9Ȇ%B#i僼ʔ٪S\$Ѐۀoퟎ�9򤆔gϳT˙X碝\0萞ݓBҩ␁ׄԅׁȘҧCuӣĊpĔ兩\B`D§\0ʈY*,XfTlz̩Pퟰ���pɃʈ!HԂ#:󃁈uʐŲ葜0BʂHr˭̉⢠CˉJr钐2	 ӯ\nŔeЁHJuJӢS\0琖r ֽ!��*Lv+؏Yǔ\0002ɺ것(ƨۨӜ֊Ö#̈́ȍe¹V@[^𙃾ߢ9/��{ǂߊ菄f،?ꅜ$ܜiʽǊқ*qMɦVЫŜͭੂ^귣㔪¬ޠґͱբ<\nvӲݴ僩��ޞоȍ8ɏQA~S*ޕǈك��S-̡	갯bÔɎj󔙆峷󆆖DlĩTʜѼ镤ٕ̼̓+ɶ<<P0݌%ר,תӐZ.ӗ剐Ĥ㪤d1ʟH눤Nˠ3ή'K��ސ̓>͕?㉦ƢPʑݡ֛>֙ʜħaބD\$ )0IƓA2-:gk iFFzǖĄت��Ǭ\"ېҖ\"~j񓗘󐎕PuҋȟՄR銐Y:nC|(Eͺ߰9ߤጂH
)ΠXŧ޹>\0±ºΥkŮb=ܪfABl&|Sbւ,ѰayTXr=jˮȺL舄@GE'ڭ\nHP뉀༐@ѧq՘~@쇰>\$֩*؈@򬜢Çо0^ࠜ"tы	Љũ͒ߵczȈ��Ӻť\"͠D��4~ڣ&˺󜰶ݱ਎g֪-𰀴Ʃȩ􃌪Dͨ֓JNW̺Huϵi	ZzԬҺkߒTǴہeUvrvיbˑȚԧưɮ륱۪;̾Ñ\nڠϯ׋\0ݲ6CޮWaӀŸTĞڱ\0N䦁ܨeI.��Ua&Ll#ѭջ!ĨH\"~𞀅]\n̈\0vw催��W6[ˮD~\$!{YbĠpZ͡QXı\rhpجӌͅʠ`K@\0	b->ߜ0gXÕMųΓxӲжےw2ΦΔ8рĐ֜n.xڠ&,	ɤJ~䪇թ.q	iaN½ӴӰ��r;Hϑ۷ヅʐK\\Ӱ&ٮڶX��q˛@⫲\r֓m/&rܥ�Ԃ⮈܆ݤ��-ӕ:󎲝m7mɄ׏+x܄ֆ🸗'Շ5وD/PΑЎ/ɍ؉KXސy\n؄짩\n݆Iѿvቇ̱ɔUNơքʨ·ӑ-\$o(ⷊ*l8PiQ6ȅ\n­TV -ǖ>諻kƭʀÐԍϋףҎʣjo8V5/¼#ˊ<򝚴	㽨ߘLЛ	Ɣ H8tےʒʴ��¥&CB밠ЁǮ즤ܪ1a쉍ĤԚߚ8ƀԅ;%ޟ\0^ˮñ̭xkw򂺐䕋W՗Ǧ.֩\n糜nHhǁg쉘^L&譀̎\nPĀ>J˅D��R֢ʠ֓Xퟟ�ѝЬଓтĵ.큧łߐs6ڜ沝ֺڐȂhơPǊе%`Ъٮ!Tޫ?X򏈲4XB\r;4٬)6m4SSȚ󙠦ת͛;~帟*U½Ѥ9DҚ]᝜\0iޭԿ͜0ˬEwrNzQԿЋ��ŝ=ϰ{g[Aʱެ=ၐәԎ7\0?ݩ)˂\$ÖH?ޠ@eէ]d5֠຤Ŋ`^㪜؈��ӱ֬ށ>የǒ}֜\#uٮƀHֶ˸Fʱg貖��I+ž0ׁٔ \0-ȋ̜ӹ��phEֳA𡴏Aࠄ��I��=Ͼս|<Ӻ򩒯长ڈP��քBݜT؁ʳ��B��𘄶񔷫眰?٤õ䜰YƓНƷL	β=̘ѸĢ@ϼ cưނ团r橂ƈў\$ /݋ԜŹNЍʄޯE`4ƱKС»ɲLꩻʊD&ݐ:	aڋo%ۇᏭΓqݽ|h	Υ𕓠ep`ҝجǑӘI��]Bހgػ𴸔z\\b앜"Ɉnىiہlȩѵ㧠wףۚѫ|KYvh\"נ��\³ǲ\\ꐜ\\\Cԇ1��#ʅ/䇽̙:ك҉ǜ4ՇӋKħH��\\*ѱ͢ϣtڣĶ-刚ФүÎֵ2gܚο(ö˺Ų¸㹅?)LyˮQؒܧܑmMnǝ񟄄hƼ&\$㏡֕\n֔ز3]𧵵դ\"젶ۑǪ𣇀⎱Gϋʽ\\̋\\,pwr̶T맃Ŝ\8ߢ~ۉТFӈ^@|ë_��ȊLӂeڌρ紅�n֨Ж:H#٫nh٧T͘׶AڮkĭҚb텸蠃`ĢwҋfٮŇӳG][󣨾HP񃋰:6Ɂ Ɲ\\�d\r2YƲפ,억ْdǉǤ}ݳX\\qÁ=튕.҆܁ʂ߁diݖ7ߺUٺnm囗ŦD��ƅψ󒒼9򥘍󼧌Ł޵Ֆ񉂾YĶlΎMŌ芄ķaő(ǁ\\��v8׍��.鄘𩽠��Rħ�Ȏᜄԇ\0՜rHلѫӳã甇Vg�}l��Z}Ǵh̇µ̬aFۋ\$��Ƃ[ڮzl敄6Ȍ0КɘLԑTQg��vg󺜌߯y_\\5Ҳ֗ڧ78퀼أ{EˣݶKŶ6nswbjj8ߊC��ݜ׸ʶ󆀇0ډBמˀ״CI딝𓡀.`ǋܑjљЋ\"\0��k)`rvÈ𴵼ʇyݺĕf;p-˲MĪf妍ⅨʜBrŖB8Ra:δʅPuՖ��>𹑈.ѽȀĆ駦\rMÄ-~BSظGNBD%��qn࠸딉웆źߣΗ\"'kĐ0΂ȁ͝ZД[^%��с\\Хۃ܏۲ݘw��w7Ԉ廞ꫨ:ǹ=Չ̮��ܨԢӻ\r۲ϑ?i��񞬾Ҡ lSό�|ɻ5*k覀ۜn饷w��bvהpþݪ\$B��ҥ̌Ѫ��e򬶑ͽ`G\$h첰ˤwEߜn��\"˚Pǌ\nȔ��쏅B|˱:?ώࠊ)źӶȀ]>׳򧪿͈;҆խ��6ǜבdx流򵍧ҋѳۑ鸡م)瘪݂ԮWBɳ݈^؇À>/Wl͜$^}ŉ\0كv5Aퟕ�Jǂ鐹{ްɐ4ǆ-3#Ժaƌ╉y^˜nQ9.ɡܚ΍ڤ}&َ񃤋j/2ᬑ9ï\0﫤ڜ\¾Rzf˱��ˉ僡ǩꞲ͐ɯ|\rʉw؝ۓTπ,̦񷥠ɇȷ[ҐёO]ψ睋sŀ󵝁穀֥16bΣѢYڢըӭpҳӖ\0U6ޔɹp=]ĜӄՇڻG喝Sʛ͈ʥ1Ɏˠwbʜ0Ԅ{Ŋh?΁ĠeY,?N𙵃Zo߈ܸ\$΅͜$ݕh'8LfӅF:֤k1)@ů_Ո۠ѐ󕶰𩇜$įغf񥸺ڵࠔ˚@уݢמ8لα񂬜b\\Ǚ͚��#S퟉�wǚαͣX_םҁǆƙwɸK:Oԓ��xҽJ4̤EǼ;򺭬ʊΡ؋ʱ.շϻR敱ӌӮWNɹå؜$ӟݮCjߑޤRQyR󘄅Φұa̧|۲ܘň۸0ۗ쾋1ë֪DLMߒ7\\լ֕Rȣ꽕\rχi膷̛ώR,ӀۻՕs̑A!)ڐ|࠘Bpo\$]ۓ׸źwP®EO%��b_C\0լАͦԑ즭ӹ҇ԸɆ㩶ǐyj泲ܜ\ߘ{_裚.DқůȍLCѸ֫њݜ @Ip\0ʅ(קܳ\$g(sw2C`⠁̀D/7ʑt3͌d諵xۨ\$\"KŁI99ŝݑ#Եn渔ó`Ø9߅B]똙/ٶߖs!-3Ĝ$OS0^\݇mНӛ9̜̍nŸi峷＆-֝m峃ꋛ3󝜤󜧚؞9ΖĞ68L6ћÒ󗍖܋ټ򏜮Í&ٮhѲ]ш˅{2ςAبXӿ8:ۦ셠S5ëZ\rYĐ@eݜ\ֹ%з?ՠ(֑؜硫@zƕpvu࠱Ԃ~ェلɗ݂ˇfϱōר`Wqϴ^ԕ(֯-ƛΑ/΍̫酉륯࠱ط骩ϫHûͦΥ䌾\0ࢹ󼂠ÆāaȈ̹|ْ}X^d󈹠DؿʯuΥ!ԇ\\,qɴڌƕ^xxF𯽴̼ٗ5߹&жtPA|k\r9.ҸAΦķJU&ϡډ[՛Ǩʗhŀn0w}v﷠,a󸐻ӾȔ\0Ȅ*\0O2%ͬШႠyӫԈb:aSLܔؘɅԀn}5>xC͈~뜤ң0\\﯊,W4FΗ_cԼȎǭ颩
