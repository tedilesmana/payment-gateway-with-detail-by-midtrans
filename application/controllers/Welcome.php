<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('template');
	}

	public function index()
	{
		$this->template->template('transaksi');
	}

	public function checkout()
	{
		$this->load->view('checkout');
	}

	public function notification()
	{
		$this->load->view('handle_notification');
	}

	public function detail_transaction()
	{
		$this->load->view('detail_transaction');
	}
}
