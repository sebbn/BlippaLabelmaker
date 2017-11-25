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
    	$client = new Client();

    	$done = false;
    	$page = 1;
    	$products = array();

    	while (!$done)
    	{
	        $res = $client->request('POST', 'http://test.nordenta.se/api/my/products/get?key=e9c6bd857377cf6bb3dff2c07c609ed67f3c9439df89675e2244e8a093671b65&token=RTMmdjgxrgwFQbWzVslGWMvINJkKkCXICXikq5foWTZwEpkuZOf2XdGmPkpi', [
	            'form_params' => [
	                'sortby' => 'title',
	                'page' => $page,
	            ]
	        ]);

	        if ($res->getStatusCode() == '200')
	        {
		        $data = json_decode($res->getBody());

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
		}
    }
}
