<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// The MIT License (MIT)

// Copyright (c) 2016 ONUWA NNACHI ISAAC

// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:

// The above copyright notice and this permission notice shall be included in all
// copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
// SOFTWARE.


require APPPATH.'libraries/sms/services/twilio.php';

if(!function_exists('sms')){
	function sms($phone, $message)
	{
		$AccountSid = "ACe5495c2ce5b76fee6cb523c8fef5a87e";
        $AuthToken = "6f9a9aef8555313ea9bf6f61ba296c88";
        
        $http = new Services_Twilio_TinyHttp(
        'https://api.twilio.com',
        array('curlopts' => array(
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 2,
        ))
    );
        $client = new Services_Twilio($AccountSid, $AuthToken, "2010-04-01", $http); 
        $message = $client->account->messages->create(array(
            "From" => "+12319160780",
            "To" => $phone,
            "Body" => $message
        ));
	}
}
if(!function_exists('phone_helper')){
	function phone_helper($phone)
	{
		$regEx = "/^0/";
		$replace = "+234"; 
		return preg_replace($regEx, $replace, $phone);
	}
}
if(!function_exists('generateStrongPassword')){
function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';
	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}
	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];
	$password = str_shuffle($password);
	if(!$add_dashes)
		return $password;
	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
	}
}

// Export to Excel
// 
// This method generates an excel file and then returns the generated content
if (!function_exists('arrayToExcel'))
{
    function arrayToExcel($query, $fields, $filename = "Excel"){

        if (count($query) == 0) {
            return "The query is empty. It doesn't have any data.";
        } else {
            $headers = "";
            foreach ($fields as $field) {
                $headers .= $field . "\t";
            }

            $data = "";
            foreach ($query as $row) {
                $line = "";
                foreach ($row as $value) {
                    if ((!isset($value)) || ($value == "")) {
                        $value = "\t";
                    } else {
                        $value = str_replace('"', '""', $value);
                        $value = '"' . utf8_decode($value) . '"' . "\t";
                    }
                    $line .= $value;
                }
                $data .= trim($line) . "\n";
            }
            $data = str_replace("\r", "", $data);

            $content = $headers . "\n" . $data;
            $filename = date('YmdHis') . "_export_{$filename}.xls";

            header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header("Content-Disposition: attachment; filename={$filename}");
            header("Content-Length: " . strlen($content));
            header("Pragma: no-cache");

            return $content;
        }
    }
}

if (!function_exists('exportPDF'))
{
    function exportPDF($fileName, $htmlView, $css = '', $orientation = 'P', $zoom = 'fullpage') {
        $CI =& get_instance();
        $CI->load->library('mpdf57/mpdf');
        // mpdf documentation: http://mpdf1.com/manual/index.php?tid=184
        $CI->mpdf->AddPage($orientation, // L - landscape, P - portrait
                    'A4', '', '', '',
                    12, // margin_left
                    12, // margin right
                    10, // margin top
                    10, // margin bottom
                    5, // margin header
                    5); // margin footer
        if( !empty($css) ) {
            $CI->mpdf->WriteHTML($css, 1);
        }
        $CI->mpdf->WriteHTML($htmlView, 2);
        $CI->mpdf->SetDisplayMode($zoom); // default, fullpage, fullwidth, real, 0-100
        $CI->mpdf->Output($fileName . '.pdf','D'); // D - Force download, I - View in explorer
    }
}

if(!function_exists('e')){
    function e($string)
    {
        return htmlentities($string);
    }
}