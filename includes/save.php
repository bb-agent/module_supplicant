<? 
/*
    Copyright (C) 2013-2016 xtr4nge [_AT_] gmail.com
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?
include "../../../login_check.php";
include "../../../config/config.php";
include "../_info_.php";
include "../../../functions.php";

include "options_config.php";

// Checking POST & GET variables...
if ($regex == 1) {
    regex_standard($_POST['type'], "../msg.php", $regex_extra);
    regex_standard($_POST['action'], "../msg.php", $regex_extra);
    regex_standard($_POST['mod_name'], "../msg.php", $regex_extra);
    
    regex_standard($_POST['supplicant_ssid'], "../msg.php", $regex_extra);
    regex_standard($_POST['supplicant_psk'], "../msg.php", $regex_extra);
    regex_standard($_POST['supplicant_iface'], "../msg.php", $regex_extra);
}

$type = $_POST['type'];
$action = $_POST['action'];
$newdata = html_entity_decode(trim($_POST["newdata"]));
$newdata = base64_encode($newdata);

$supplicant_ssid = $_POST['supplicant_ssid'];
$supplicant_psk = $_POST['supplicant_psk'];
$supplicant_iface = $_POST['supplicant_iface'];

$mb_apn = $_POST['mb_apn'];
$mb_username = $_POST['mb_username'];
$mb_password = $_POST['mb_password'];

// supplicant options
if ($type == "save_supplicant") {
	
    $exec = "/bin/sed -i 's/^\\\$mod_supplicant_ssid=.*/\\\$mod_supplicant_ssid=\\\"$supplicant_ssid\\\";/g' ../_info_.php";
    $output = exec_blackbulb($exec);
    
    $exec = "/bin/sed -i 's/^\\\$mod_supplicant_psk=.*/\\\$mod_supplicant_psk=\\\"$supplicant_psk\\\";/g' ../_info_.php";
    $output = exec_blackbulb($exec);
    
    $exec = "/bin/sed -i 's/^\\\$mod_supplicant_iface=.*/\\\$mod_supplicant_iface=\\\"$supplicant_iface\\\";/g' ../_info_.php";
    $output = exec_blackbulb($exec);

}

header('Location: ../index.php?tab=2');
exit;

?>