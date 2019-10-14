<?php
/*
ASD 270919 Conversion library.
Contains function to convert kana to romaji.
*/
function convertToRomaji($chars){
	$out="";
	for ($n=0;$n<mb_strlen($chars);$n++){
		//echo mb_substr($chars,$n,2).'\n';
		switch (mb_substr($chars,$n,2)){
			case "きゃ": $out = $out .  "kya";break;
			case "きゅ": $out = $out .  "kyu";break;
			case "きょ": $out = $out .  "kyo";break;
			case "しゃ": $out = $out .  "sha";break;
			case "しゅ": $out = $out .  "shu";break;
			case "しょ": $out = $out .  "sho";break;
			case "ちゃ": $out = $out .  "cha";break;
			case "ちゅ": $out = $out .  "chu";break;
			case "ちょ": $out = $out .  "cho";break;
			case "にゃ": $out = $out .  "nya";break;
			case "にゅ": $out = $out .  "nyu";break;
			case "にょ": $out = $out .  "nyo";break;
			case "ひゃ": $out = $out .  "hya";break;
			case "ひゅ": $out = $out .  "hyu";break;
			case "ひょ": $out = $out .  "hyo";break;
			case "みゃ": $out = $out .  "mya";break;
			case "みゅ": $out = $out .  "myu";break;
			case "みょ": $out = $out .  "myo";break;
			case "りゃ": $out = $out .  "rya";break;
			case "りゅ": $out = $out .  "ryu";break;
			case "りょ": $out = $out .  "ryo";break;
			case "ぎゃ": $out = $out .  "gya";break;
			case "ぎゅ": $out = $out .  "gyu";break;
			case "ぎょ": $out = $out .  "gyo";break;
			case "じゃ": $out = $out .  "ja";break;
			case "じゅ": $out = $out .  "ju";break;
			case "じょ": $out = $out .  "jo";break;
			case "びゃ": $out = $out .  "bya";break;
			case "びゅ": $out = $out .  "byu";break;
			case "びょ": $out = $out .  "byo";break;
			case "ぴゃ": $out = $out .  "pya";break;
			case "ぴゅ": $out = $out .  "pyu";break;
			case "ぴょ": $out = $out .  "pyo";break;
			case "キャ":$out=$out . "KYA";break;
			case "キュ":$out=$out . "KYU";break;
			case "キョ":$out=$out . "KYO";break;
			case "シャ":$out=$out . "SHA";break;
			case "シュ":$out=$out . "SHU";break;
			case "ショ":$out=$out . "SHO";break;
			case "チャ":$out=$out . "CHA";break;
			case "チュ":$out=$out . "CHU";break;
			case "チョ":$out=$out . "CHO";break;
			case "ニャ":$out=$out . "NYA";break;
			case "ニュ":$out=$out . "NYU";break;
			case "ニョ":$out=$out . "NYO";break;
			case "ヒャ":$out=$out . "HYA";break;
			case "ヒュ":$out=$out . "HYU";break;
			case "ヒョ":$out=$out . "HYO";break;
			case "ミャ":$out=$out . "MYA";break;
			case "ミュ":$out=$out . "MYU";break;
			case "ミョ":$out=$out . "MYO";break;
			case "リャ":$out=$out . "RYA";break;
			case "リュ":$out=$out . "RYU";break;
			case "リョ":$out=$out . "RYO";break;
			case "ギャ":$out=$out . "GYA";break;
			case "ギュ":$out=$out . "GYU";break;
			case "ギョ":$out=$out . "GYO";break;
			case "ジャ":$out=$out . "JA";break;
			case "ジュ":$out=$out . "JU";break;
			case "ジョ":$out=$out . "JO";break;
			case "ビャ":$out=$out . "BYA";break;
			case "ビュ":$out=$out . "BYU";break;
			case "ビョ":$out=$out . "BYO";break;
			case "ピャ":$out=$out . "PYA";break;
			case "ピュ":$out=$out . "PYU";break;
			case "ピョ":$out=$out . "PYO";break;
				//list of non-standard
			case "ヴァ":$out=$out . "VA";break;
			case "ヴァ":$out=$out . "VA";break;
			case "ヴィ":$out=$out . "VI";break;
			case "ヴェ":$out=$out . "VE";break;
			case "ヴォ":$out=$out . "VO";break;
			case "グァ":$out=$out . "GUA";break;
			case "テァ":$out=$out . "TEA";break;
			case "ファ":$out=$out . "FAA";break;
			case "ディ":$out=$out . "DII";break;
			case "ウィ":$out=$out . "WII";break;
			case "フィ":$out=$out . "FI";break;
			case "ジィ":$out=$out . "JII";break;
			case "ウェ":$out=$out . "WE";break;
			case "フェ":$out=$out . "FE";break;
			case "ジェ":$out=$out . "JE";break;
			case "ウォ":$out=$out . "WO";break;
			case "フォ":$out=$out . "FO";break;

			default:
				switch (mb_substr($chars,$n,1)){
				case "あ": $out = $out .  "a";break;
				case "い": $out = $out .  "i";break;
				case "う": $out = $out .  "u";break;
				case "え": $out = $out .  "e";break;
				case "お": $out = $out .  "o";break;
				case "か": $out = $out .  "ka";break;
				case "き": $out = $out .  "ki";break;
				case "く": $out = $out .  "ku";break;
				case "け": $out = $out .  "ke";break;
				case "こ": $out = $out .  "ko";break;
				case "さ": $out = $out .  "sa";break;
				case "し": $out = $out .  "shi";break;
				case "す": $out = $out .  "su";break;
				case "せ": $out = $out .  "se";break;
				case "そ": $out = $out .  "so";break;
				case "た": $out = $out .  "ta";break;
				case "ち": $out = $out .  "chi";break;
				case "つ": $out = $out .  "tsu";break;
				case "て": $out = $out .  "te";break;
				case "と": $out = $out .  "to";break;
				case "な": $out = $out .  "na";break;
				case "に": $out = $out .  "ni";break;
				case "ぬ": $out = $out .  "nu";break;
				case "ね": $out = $out .  "ne";break;
				case "の": $out = $out .  "no";break;
				case "は": $out = $out .  "ha";break;
				case "ひ": $out = $out .  "hi";break;
				case "ふ": $out = $out .  "fu";break;
				case "へ": $out = $out .  "he";break;
				case "ほ": $out = $out .  "ho";break;
				case "ま": $out = $out .  "ma";break;
				case "み": $out = $out .  "mi";break;
				case "む": $out = $out .  "mu";break;
				case "め": $out = $out .  "me";break;
				case "も": $out = $out .  "mo";break;
				case "や": $out = $out .  "ya";break;
				case "ゆ": $out = $out .  "yu";break;
				case "よ": $out = $out .  "yo";break;
				case "ら": $out = $out .  "ra";break;
				case "り": $out = $out .  "ri";break;
				case "る": $out = $out .  "ru";break;
				case "れ": $out = $out .  "re";break;
				case "ろ": $out = $out .  "ro";break;
				case "わ": $out = $out .  "wa";break;
				case "を": $out = $out .  "wo";break;
				case "が": $out = $out .  "ga";break;
				case "ぎ": $out = $out .  "gi";break;
				case "ぐ": $out = $out .  "gu";break;
				case "げ": $out = $out .  "ge";break;
				case "ご": $out = $out .  "go";break;
				case "ざ": $out = $out .  "za";break;
				case "じ": $out = $out .  "ji";break;
				case "ず": $out = $out .  "zu";break;
				case "ぜ": $out = $out .  "ze";break;
				case "ぞ": $out = $out .  "zo";break;
				case "だ": $out = $out .  "da";break;
				case "ぢ": $out = $out .  "di";break;
				case "づ": $out = $out .  "du";break;
				case "で": $out = $out .  "de";break;
				case "ど": $out = $out .  "do";break;
				case "ば": $out = $out .  "ba";break;
				case "び": $out = $out .  "bi";break;
				case "ぶ": $out = $out .  "bu";break;
				case "べ": $out = $out .  "be";break;
				case "ぼ": $out = $out .  "bo";break;
				case "ぱ": $out = $out .  "pa";break;
				case "ぴ": $out = $out .  "pi";break;
				case "ぷ": $out = $out .  "pu";break;
				case "ぺ": $out = $out .  "pe";break;
				case "ぽ": $out = $out .  "po";break;
				case "ん": $out = $out . "n";break;
				case "ゐ": $out = $out . "wi";break;
				case "ゑ": $out = $out . "we";break;
				case "ア":$out = $out . "A";break;
				case "イ":$out = $out . "I";break;
				case "ウ":$out = $out . "U";break;
				case "エ":$out = $out . "E";break;
				case "オ":$out = $out . "O";break;
				case "カ":$out = $out . "KA";break;
				case "キ":$out = $out . "KI";break;
				case "ク":$out = $out . "KU";break;
				case "ケ":$out = $out . "KE";break;
				case "コ":$out = $out . "KO";break;
				case "サ":$out = $out . "SA";break;
				case "シ":$out = $out . "SHI";break;
				case "ス":$out = $out . "SU";break;
				case "セ":$out = $out . "SE";break;
				case "ソ":$out = $out . "SO";break;
				case "タ":$out = $out . "TA";break;
				case "チ":$out = $out . "CHI";break;
				case "ツ":$out = $out . "TU";break;
				case "テ":$out = $out . "TE";break;
				case "ト":$out = $out . "TO";break;
				case "ナ":$out = $out . "NA";break;
				case "ニ":$out = $out . "NI";break;
				case "ヌ":$out = $out . "NU";break;
				case "ネ":$out = $out . "NE";break;
				case "ノ":$out = $out . "NO";break;
				case "ハ":$out = $out . "HA";break;
				case "ヒ":$out = $out . "HI";break;
				case "フ":$out = $out . "FU";break;
				case "ヘ":$out = $out . "HE";break;
				case "ホ":$out = $out . "HO";break;
				case "マ":$out = $out . "MA";break;
				case "ミ":$out = $out . "MI";break;
				case "ム":$out = $out . "MU";break;
				case "メ":$out = $out . "ME";break;
				case "モ":$out = $out . "MO";break;
				case "ヤ":$out = $out . "YA";break;
				case "ユ":$out = $out . "YU";break;
				case "ヨ":$out = $out . "YO";break;
				case "ラ":$out = $out . "RA";break;
				case "リ":$out = $out . "RI";break;
				case "ル":$out = $out . "RU";break;
				case "レ":$out = $out . "RE";break;
				case "ロ":$out = $out . "RO";break;
				case "ワ":$out = $out . "WA";break;
				case "ヲ":$out = $out . "WO";break;
				case "ガ":$out = $out . "GA";break;
				case "ギ":$out = $out . "GI";break;
				case "グ":$out = $out . "GU";break;
				case "ゲ":$out = $out . "GE";break;
				case "ゴ":$out = $out . "GO";break;
				case "ザ":$out = $out . "ZA";break;
				case "ジ":$out = $out . "JI";break;
				case "ズ":$out = $out . "ZU";break;
				case "ゼ":$out = $out . "ZE";break;
				case "ゾ":$out = $out . "ZO";break;
				case "ダ":$out = $out . "DA";break;
				case "ヂ":$out = $out . "DI";break;
				case "ヅ":$out = $out . "DU";break;
				case "デ":$out = $out . "DE";break;
				case "ド":$out = $out . "DO";break;
				case "バ":$out = $out . "BA";break;
				case "ビ":$out = $out . "BI";break;
				case "ブ":$out = $out . "BU";break;
				case "ベ":$out = $out . "BE";break;
				case "ボ":$out = $out . "BO";break;
				case "パ":$out = $out . "PA";break;
				case "ピ":$out = $out . "PI";break;
				case "プ":$out = $out . "PU";break;
				case "ペ":$out = $out . "PE";break;
				case "ポ":$out = $out . "PO";break;
				case "ン":$out = $out . "N"	;break;
				case "ヰ":$out = $out . "WI";break;
				case "ヱ":$out = $out . "WE";break;
				case "ヴ":$out = $out . "VU";break;
				case "っ": $out = $out . "っ";break;
				case "ッ": $out = $out . "ッ";break;
				case "ー": $out = $out . "ー";break;
				case ";":$out.=";";//keep the word breaks;
				} //end switch 1
			} //end switch 2
		}

	//now, do the duplicate chars - っ
	$out2="";
	for($n=0;$n<mb_strlen($out);$n++){
		$temp = mb_substr($out,$n,1);
		if($temp=="っ" or $temp == "ッ"){
			$out2 = $out2.mb_substr($out,$n+1,1);
		} elseif ($temp == "ー"){
			$out2 = $out2.mb_substr($out,$n-1,1);
		} else {
			$out2=$out2.$temp;
		}
	}

	return $out2;
}

?>
