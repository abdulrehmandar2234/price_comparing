<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RequestController;
use App\ProductLink;
use Carbon\Carbon;
use Storage;

class UpdatePricesController extends Controller
{
    public function index()
    {
        $product_links = ProductLink::all();

        $req = new RequestController();

        $pro_result = array();
        // $nodes = ProductLink::find(1)->website->single_product_nodes;

        try {
            foreach ($product_links as $pro) {

                $product_websites_links = $pro->website->product_website_links;

                foreach ($product_websites_links as $pro_link) {

                    //    dd($pro_link);
                    $node = $pro_link->website->product_node[0];
                    //  dd($node);
                    if ($pro_link->product_updated == "" && $pro_link->product_updated < Carbon::today()) {

                        $pro_result = $req->get_product_node($pro_link['product_link'], $node['product_name_node'], $node['product_unit_node'], $node['product_price_node'], $node['product_image_node'], $node['product_description_node'], $node['product_discount_node'], $node['product_description_node']);

                        // if ($pro_result != []) {

                        $pro_link->product_price = $pro_result[0]['price'];
                        $pro_link->product_unit_price = $pro_result[0]['unit'];
                        $pro_link->product_discount = $pro_result[0]['discount'];
                        $pro_link->product_updated = Carbon::now();

                        $url = $pro_result[0]['image'];
                        $contents = file_get_contents($url);

                        $name = substr($url, strrpos($url, '/') + 1);
                        Storage::disk('public')->put($name, $contents);
                        $pro_link->product_image = $name;
                        // $pro_link->product_image = $pro_link->product_image->move(public_path('images'), $name);

                        $pro_link->save();
                        // }

                    }
                }
            }
            return redirect()->back()->with('success', 'Product refresh successfully');

        } catch (\Exception $e) {

            return $e->getMessage();
            // report ($e);
            // return false;
        }

    }
}
