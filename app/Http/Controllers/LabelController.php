<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use QrCode;
use GuzzleHttp\Client;

class LabelController extends Controller
{
	public function index()
	{
		return view('public.index');
	}

	public function build()
	{
		return view('public.build');
	}

	public function print(Request $request)
	{
    	$client = new Client();

		$str = $request->ids;

		$ids = explode(',', $str);
    	$products = array();

		foreach ($ids as $id) 
		{
			try 
			{
		        $res = $client->request('POST', 'https://nordenta.se/api/items/get?key=d710c15b8a17d4f89c65a1f222a52a5302a3ed4029671c4c315145c23caa4004&token=EDyHzpuPmVKK5jb76V0ZQGRIRfjfDcJkQf0CpR2BwguU8GzSdX6qomsaOaSL', [
		            'form_params' => [
		                'artnr' => $id,
		            ]
		        ]);
		      
		        if ($res->getStatusCode() == '200')
		        {
			        $data = json_decode($res->getBody());

					array_push($products, $data->data->item);
			    }
			}
			catch (\Exception $e)
			{
				continue;
			}
		}

		$data = [
    		'items' => $products,
    	];

		$pdf = PDF::loadView('print.pdf', $data);

		return $pdf->setPaper('a4')->stream();
	}

	public function customer(Request $request)
    {
    	$id = $request->customerNr;

    	$client = new Client();

    	$done = false;
    	$page = 1;
    	$products = array();

    	while (!$done)
    	{
	        $res = $client->request('POST', 'https://nordenta.se/api/my/items/get?key=d710c15b8a17d4f89c65a1f222a52a5302a3ed4029671c4c315145c23caa4004&token=EDyHzpuPmVKK5jb76V0ZQGRIRfjfDcJkQf0CpR2BwguU8GzSdX6qomsaOaSL', [
	            'form_params' => [
	                'sortby' => 'title',
	                'page' => $page,
	                'customerno' => $id,
	            ]
	        ]);

	        if ($res->getStatusCode() == '200')
	        {
		        $data = json_decode($res->getBody());

		        if ($data->data->pagination->total != 0)
		        {
					$items = $data->data->items;

					foreach ($items as $item)
					{
						array_push($products, $item);
					}

					if ($data->data->pagination->currentPage != $data->data->pagination->lastPage)
					{
						$page = $page + 1;
					}
					else
					{
						$done = true;

				    	$data = [
				    		'items' => $products,
				    	];

						$pdf = PDF::loadView('print.pdf', $data);

						return $pdf->setPaper('a4')->stream();
					}
				}
				else
				{
					$done = true;
					echo 'Kund med nr ('. $id .') har inga mina produkter';
				}
			}
		}
    }
}
