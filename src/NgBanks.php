<?php

namespace jcobhams\NgBanks;

/**
*  @author Joseph Cobhams
*/
class NgBanks
{


	private $banks = array(
		array('name' => 'ACCESS BANK PLC', 'code' => '044', 'slug' => 'ACC', 'ussd_code' => '*901#'),
		array('name' => 'CITIBANK NIGERIA PLC', 'code' => '023', 'slug' => 'CBN', 'ussd_code' => NULL),
		array('name' => 'DIAMOND BANK PLC', 'code' => '063', 'slug' => 'DMB', 'ussd_code' => '*710#'),
		array('name' => 'ECOBANK NIGERIA PLC', 'code' => '050', 'slug' => 'EBN', 'ussd_code' => '*326#'),
		array('name' => 'ENTERPRISE BANK', 'code' => '084', 'slug' => 'EPB', 'ussd_code' => '*901#'),
		array('name' => 'FIDELITY BANK PLC', 'code' => '070', 'slug' => 'FDB', 'ussd_code' => '*770#'),
		array('name' => 'FIRST BANK NIGERIA LIMITED', 'code' => '011', 'slug' => 'FBN', 'ussd_code' => '*894#'),
		array('name' => 'FIRST CITY MONUMENT BANK PLC', 'code' => '214', 'slug' => 'FCB', 'ussd_code' => '*329#'),
		array('name' => 'GUARANTY TRUST BANK PLC', 'code' => '058', 'slug' => 'GTB', 'ussd_code' => '*737#'),
		array('name' => 'HERITAGE BANK PLC', 'code' => '030', 'slug' => 'HTB', 'ussd_code' => '*322#'),
		array('name' => 'KEY STONE BANK', 'code' => '082', 'slug' => 'KSB', 'ussd_code' => '*533#'),
		array('name' => 'MAINSTREET BANK', 'code' => '014', 'slug' => 'MSB', 'ussd_code' => NULL),
		array('name' => 'POLARIS BANK LIMITED', 'code' => '076', 'slug' => 'PLB', 'ussd_code' => NULL),
		array('name' => 'PROVIDUS BANK LIMITED', 'code' => '101', 'slug' => 'PVB', 'ussd_code' => NULL),
		array('name' => 'STANBIC IBTC BANK LTD', 'code' => '221', 'slug' => 'SIB', 'ussd_code' => '*909#'),
		array('name' => 'STANDARD CHARTERED BANK NIGERIA LTD', 'code' => '068', 'slug' => 'SCB', 'ussd_code' => NULL),
		array('name' => 'STERLING BANK PLC', 'code' => '232', 'slug' => 'STB', 'ussd_code' => '*822#'),
		array('name' => 'SUNTRUST BANK NIGERIA LTD', 'code' => '100', 'slug' => 'SBN', 'ussd_code' => NULL),
		array('name' => 'UNION BANK OF NIGERIA PLC', 'code' => '032', 'slug' => 'UBN', 'ussd_code' => '*826#'),
		array('name' => 'UNITED BANK FOR AFRICA PLC', 'code' => '033', 'slug' => 'UBA', 'ussd_code' => '*919#'),
		array('name' => 'UNITY BANK PLC', 'code' => '215', 'slug' => 'UNB', 'ussd_code' => '*7799#'),
		array('name' => 'WEMA BANK PLC', 'code' => '035', 'slug' => 'WEM', 'ussd_code' => '*945#'),
		array('name' => 'ZENITH BANK PLC', 'code' => '057', 'slug' => 'ZIB', 'ussd_code' => '*966#')
	);

	public function getBanks(){
		// Method to return all the banks in Nigeria.
		return $this->banks;
	}

	public function getBank($param){
		$query_type = 'slug';
		if(is_numeric($param)) {
			$query_type = 'code';
		}

		foreach ($this->banks as $bank){
			if($bank[$query_type] == $param){
				return $bank;
			}
		}
		return NULL;
	}

	public function addBank($name, $code, $slug, $ussd_code=NULL){
		foreach ($this->banks as $bank){
			if($bank['code'] == $code || $bank['slug'] == $slug){
				throw new \Exception('Bank Already Exists With This Code or Slug');
			}
		}
		$bank = array('name'=> strtoupper($name), 'code'=>$code, 'slug'=>$slug, 'ussd_code'=>$ussd_code);
    	$this->banks[] = $bank;
    return $bank;
	}


}