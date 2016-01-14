<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/fpdf/pdf.php';
class Test
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function index()
	{
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		for($i=1;$i<=40;$i++)
			$pdf->Cell(0,10,'Printing line number '.$i,0,1);
		$pdf->Output();
	}

	

}

/* End of file Test.php */
/* Location: .//C/xampp/htdocs/beta/app/libraries/Test.php */
