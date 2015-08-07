<?
	
	class DictHelper{

		function printResults($resultFrs,$resultSec,$query){
			
			$resultFrs	= str_replace($query,"<b>".$query."</b>",$resultFrs);
			$resultSec	= str_replace($query,"<b>".$query."</b>",$resultSec);
			
			$results = "
				<tr>
					<td width=50% bgcolor=#FFFFDD style='padding: 5px'>
						<div class='superfont'> ".$resultFrs."</div>
					</td>
					<td>
					</td>
					<td bgcolor=#EEEEEE width=50% style='padding: 5px'>
						<div class='superfont'>".$resultSec." </div>
					</td>
				</tr>";

				return $results;
		}

		function crossUrlDecode($source) {
		// arregla acentos!
			$decodedStr = '';
			$pos = 0;
			$len = strlen($source);
			while ($pos < $len) {
				$charAt = substr ($source, $pos, 1);
				if ($charAt == 'Ã') {
					$char2 = substr($source, $pos, 2);
					$decodedStr .= htmlentities(utf8_decode($char2),ENT_QUOTES,'ISO-8859-1');
					$pos += 2;
				}
				elseif(ord($charAt) > 127) {
					$decodedStr .= "&#".ord($charAt).";";
					$pos++;
				}
				elseif($charAt == '%') {
					$pos++;
					$hex2 = substr($source, $pos, 2);
					$dechex = chr(hexdec($hex2));
					if($dechex == 'Ã') {
						$pos += 2;
						if(substr($source, $pos, 1) == '%') {
							$pos++;
							$char2a = chr(hexdec(substr($source, $pos, 2)));
							$decodedStr .= htmlentities(utf8_decode($dechex . $char2a),ENT_QUOTES,'ISO-8859-1');
						}
						else {
							$decodedStr .= htmlentities(utf8_decode($dechex));
						}
					}
					else {
						$decodedStr .= $dechex;
					}
					$pos += 2;
				}
				else {
					$decodedStr .= $charAt;
					$pos++;
				}
			}
			return $decodedStr;
		} 
	}

	?>