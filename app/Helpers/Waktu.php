<?php

function tanggalIndo($nilai)
{
    $bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
    $pecahkan = explode('-', date('Y-m-d', strtotime($nilai)));
    $bln = isset($pecahkan[1]) ? (int)$pecahkan[1] : ' ';
    return $pecahkan[2].'-'.$bulan[$bln].'-'.$pecahkan[0];
}
