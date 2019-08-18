<?php
namespace App; 
class Validator{
	/*
	 *	Check Required Fields
	 */
	 public static function isRequired($field_array){
		foreach($field_array as $field){
			if($_POST[''.$field.''] == ''){
				return false;
			}
		}
		return true;
	 }
	 
	 /*
	  *		Validate Email Field
	  */
	  public static function isValidEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		} else {
			return false;
		}
	  }
	  
	
	   private static function sanitizeInput($list){
		$filtered = [];
		foreach($list as $key=>$value){
		   $filtered[$key]  = preg_replace('/\s+/','', $list[$key]);
		  // $filtered[$key]  = preg_replace('/[a-z-]+/i','', $list[$key]);
		}
		return $filtered;
	}

	public static function checkStringLength($list){
		$string = [];
		foreach($list as $key => $value){
			if(strlen($list[$key]) > 3  && strlen($list[$key]) < 255 ){
				$string[$key] = strtoupper($list[$key]);
				return true;
				
			}else{
				return false;
			} 
		}

		return $string;
		
	}
}