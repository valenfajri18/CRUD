<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('profile');
	}
	public function pendidikan()
	{
		return view('riwayat-pendidikan');
	}
	public function organisasi()
	{
		return view('riwayat-organisasi');
	}
}
