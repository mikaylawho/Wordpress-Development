<?php

civicrm_wp_initialize( );

$MembershipTypeDetails=civicrm_api("MembershipType","get", array ('version' => '3','sequential' =>'1'), null);
 foreach( $MembershipTypeDetails['values'] as $key => $values){
   $MembershipType[$values['id']] = $values['name'];
	 //echo $values['name'];
 }

$MembershipStatusDetails=civicrm_api("MembershipStatus","get", array ('version' => '3','sequential' =>'1'), null);
 foreach( $MembershipStatusDetails['values'] as $key => $values){
   $MembershipStatus[$values['id']] = str_replace(' ','',$values['name']);
	 //echo $values['name'];
 }

function get_names_serialized($values,$memArray){
    $memArray = array_flip($memArray); 
    $current_rule = unserialize($values);
    if(empty($current_rule)) {
      $current_rule = $values; 
    }    
     $current_roles =""; 
     if(!empty($current_rule)){ 
         if(is_array($current_rule)){    
            foreach( $current_rule as $ckey =>$cvalue){
                 $current_roles .= array_search($ckey, $memArray)."<br>";
            }
         }else{
          $current_roles = array_search($current_rule, $memArray)."<br>";
         }    
     } 
    return $current_roles;
}

function get_names($values,$memArray){
	$memArray = array_flip($memArray);
	$current_rule = $values;
	$current_role ="";

	if(!empty($current_rule)){
		$current_role = array_search($current_rule, $memArray)."<br>";
	}
	return $current_role;
}

/* new functions for civicrm -> wordpress user sync */

function get_civicrm_members()
{


}


?>    