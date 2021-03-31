<?php

namespace App\Http\Controllers;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $crawler = $client->request('get', "https://www.e-leclerc.pt/");
        return view('index');
    }
    public function category_url_scrapper($website, $request_type, $main_listing_node, $category_link, $title_node, $brand_node, $description_node, $price_node, $unit_price_node, $discount_percentage_node, $discount_price_node, $image_node, $image_url_node, $rating_node, $product_link_node, $product_slug)
    {

        $web_data = [];
        $client = new Client();
        $crawler = $client->request($request_type, $category_link);

        $index = 0;
        $nodes = $crawler->filter($main_listing_node);
        //try {
        foreach ($nodes as $node) {
            $node = new Crawler($node);

            if (!empty($title_node)) {
                $web_data[$index]['title'] = $node->filter($title_node)->count() > 0 ? $node->filter($title_node)->text() : 0;
            }
            if (!empty($brand_node)) {
                $web_data[$index]['brand'] = $node->filter($brand_node)->count() > 0 ? $node->filter($brand_node)->text() : 0;
            }
            if (!empty($description_node)) {
                $web_data[$index]['description'] = $node->filter($description_node)->count() > 0 ? $node->filter($description_node)->text() : 0;
            }
            if (!empty($price_node)) {
                if ($website == 'Bolama') {
                    $value = explode(',', $price_node);
                    $price1 = $node->filter($value[0])->count() > 0 ? $node->filter($value[0])->text() : 0;
                    $price2 = $node->filter($value[1])->count() > 0 ? $node->filter($value[1])->text() : 0;
                    $price3 = $node->filter($value[2])->count() > 0 ? $node->filter($value[2])->text() : 0;

                    $web_data[$index]['price'] = $price1 . $price2 . $price3;

                } else {
                    $web_data[$index]['price'] = $node->filter($price_node)->count() > 0 ? $node->filter($price_node)->text() : 0;
                }

            }
            if (!empty($unit_price_node)) {
                $web_data[$index]['unit_price'] = $node->filter($unit_price_node)->count() > 0 ? $node->filter($unit_price_node)->text() : 0;
            }
            // dd($node->filter($discount_price_node)->count());
            if (!empty($discount_percentage_node)) {
                $web_data[$index]['discount_percentage'] = $node->filter($discount_percentage_node)->count() > 0 ? $node->filter($discount_percentage_node)->text() : 0;
            }
            if (!empty($discount_price_node)) {
                $web_data[$index]['discount_price'] = $node->filter($discount_price_node)->count() > 0 ? $node->filter($discount_price_node)->text() : 0;
            }
            if (!empty($image_node)) {

                if (isset($node->filter($image_node)->extract(array("data-src"))[0]) && !empty($node->filter($image_node)->extract(array("data-src"))[0])) {

                    $web_data[$index]['image'] = $node->filter($image_node)->extract(array("data-src"))[0];
                }

                if (isset($node->filter($image_node)->extract(array("data-srcset"))[0]) && !empty($node->filter($image_node)->extract(array("data-srcset"))[0])) {

                    if ($website == "Aldi") {

                        $web_data[$index]['image'] = explode(',', $node->filter($image_node)->extract(array("data-srcset"))[0]);
                        $web_data[$index]['image'] = 'https://www.aldi.pt' . substr(trim(end($web_data[$index]['image'])), 0, strpos(trim(end($web_data[$index]['image'])), "/jcr"));

                    }

                }
                if ($website == 'Go Natural') {
                    $web_data[$index]['image'] = str_replace("{width}", "360", $web_data[$index]['image']);
                    $web_data[$index]['image'] = 'https:' . substr($web_data[$index]['image'], 0, strpos($web_data[$index]['image'], "?"));
                }

                if (isset($node->filter($image_node)->extract(array("data-original"))[0]) && !empty($node->filter($image_node)->extract(array("data-original"))[0])) {
                    $web_data[$index]['image'] = $node->filter($image_node)->extract(array("data-original"))[0];
                }

                if (isset($node->filter($image_node)->extract(array('src'))[0]) && !empty($node->filter($image_node)->extract(array("src"))[0])) {
                    if ($website == "Myapolonia") {
                        $web_data[$index]['image'] = 'https://myapolonia.com/lojaeletronica/' . substr($this->last_match_replace('.', '_g.', $node->filter($image_node)->extract(array('src'))[0]), 3);
                    } else {
                        $web_data[$index]['image'] = $node->filter($image_node)->extract(array('src'))[0];
                    }
                }
                if ($website == 'Bolama') {
                    $web_data[$index]['image'] = 'https://www.bolama.pt/' . $node->filter($image_node)->extract(array("src"))[0];
                }
                if ($website == "Continente") {
                    $web_data[$index]['image'] = $node->filter($image_node)->extract(array("data-original"))[0];
                }
            }
            if (!empty($rating_node)) {
                $web_data[$index]['rating'] = $node->filter($rating_node)->count() > 0 ? $node->filter($rating_node)->text() : 0;
            }
            if (!empty($product_link_node)) {
                if ($website == 'Lidl') {
                    $web_data[$index]['product_link'] = 'https://www.lidl.pt/' . $node->filter($product_link_node)->extract(array('href'))[0];
                } else if ($website == 'Myapolonia') {
                    $web_data[$index]['product_link'] = 'https://myapolonia.com/lojaeletronica/loja/' . $node->filter($product_link_node)->extract(array('href'))[0];
                } else if ($website == 'Bolama') {
                    $web_data[$index]['product_link'] = 'http://www.bolama.pt/index.php';
                } else {
                    if (isset($node->filter($product_link_node)->extract(array('href'))[0])) {
                        $web_data[$index]['product_link'] = $node->filter($product_link_node)->extract(array('href'))[0];
                    }

                }
            }
            $index++;
        };

        // $web_data = array_map("unserialize", array_unique(array_map("serialize", $web_data)));
        $serialized = array_map('serialize', $web_data);
        $unique = array_unique($serialized);

        return array_intersect_key($web_data, $unique);
    }
    public function last_match_replace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);
        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }
        return $subject;
    }
    public function category_api_scrapper($website, $request_type, $main_listing_node, $category_link, $title_node, $brand_node, $description_node, $price_node, $unit_price_node, $discount_percentage_node, $discount_price_node, $image_node, $image_url_node, $rating_node, $product_link_node, $product_slug)
    {

        $web_data = array();
        $client = new GuzzleClient();
        $crawler = $client->request($request_type, $category_link);
        $response_array = json_decode($crawler->getBody(), true);

        if (strpos($main_listing_node, ',') !== false) {

            $response_array = $this->parse_comma($response_array, $main_listing_node);
        }
        $index = 0;

        //try {
        foreach ($response_array as $node) {

            if (!empty($title_node)) {
                $web_data[$index]['title'] = $this->parse_comma($node, $title_node);
            }
            if (!empty($brand_node)) {
                $web_data[$index]['brand'] = $this->parse_comma($node, $brand_node);
            }
            if (!empty($description_node)) {
                $web_data[$index]['description'] = $this->parse_comma($node, $description_node);
            }
            if (!empty($price_node)) {
                $web_data[$index]['price'] = number_format((float) $this->parse_comma($node, $price_node), 2, '.', '');
            }
            if (!empty($unit_price_node)) {
                $web_data[$index]['unit_price'] = number_format((float) $this->parse_comma($node, $unit_price_node), 2, '.', '');
            }
            // dd($node->filter($discount_price_node)->count());
            if (!empty($discount_percentage_node)) {
                $web_data[$index]['discount_percentage'] = $this->parse_comma($node, $discount_percentage_node);
            }
            if (!empty($discount_price_node)) {
                $web_data[$index]['discount_price'] = $this->parse_comma($node, $discount_price_node);
            }
            if (!empty($image_node)) {
                if ($image_url_node != "") {
                    if ($website == 'mercadao') {
                        $web_data[$index]['image'] = $image_url_node . $this->parse_comma($node, $image_node) . '_1';
                    } else {
                        $web_data[$index]['image'] = $image_url_node . $this->parse_comma($node, $image_node);
                    }

                } else {
                    $web_data[$index]['image'] = $this->parse_comma($node, $image_node);
                }

            }
            if (!empty($rating_node)) {
                $web_data[$index]['rating'] = $this->parse_comma($node, $rating_node);
            }
            if (!empty($product_link_node)) {
                if ($product_slug != "") {

                    $web_data[$index]['product_link'] = $product_slug . $this->parse_comma($node, $product_link_node);
                } else {
                    $web_data[$index]['product_link'] = $this->parse_comma($node, $product_link_node);
                }

            }
            $index++;
        };

        return $web_data;
    }
    public function parse_comma($node, $indexes)
    {
        if (strpos($indexes, ',') !== false) {
            $values = explode(",", $indexes);
            $parse_data = $node;
            foreach ($values as $key => $index) {
                $parse_data = isset($parse_data[$index]) ? $parse_data[$index] : 'Not Available';
            }

            if (in_array("cheapestAuction", $values)) {
                if (strlen($parse_data) == 3) {
                    $parse_data = substr($parse_data, 0, 1) . '.' . substr($parse_data, 1, 2);
                } elseif (strlen($parse_data) == 4) {
                    $parse_data = substr($parse_data, 0, 2) . '.' . substr($parse_data, 2, 3);
                }
            }
        } else {
            $parse_data = isset($node[$indexes]) ? $node[$indexes] : 'Not Available';
        }
        return $parse_data;
    }
    public function get_scraped_products($link, $main_listing_node, $name_node, $unit_node, $price_node, $image_node, $product_description_node, $product_discount_price_node, $product_discount_percentage_node, $product_link_node)
    {
        $client = new Client();
        $crawler = $client->request('GET', $link);

        $nodes = $crawler->filter($main_listing_node);

        $name = $this->get_dom_text($crawler, $name_node);
        $unit = $this->get_dom_text($crawler, $unit_node);
        $price = $this->get_dom_text($crawler, $price_node);
        $image = $this->get_dom_image($crawler, $image_node);
        $description = $this->get_dom_text($crawler, $product_description_node);
        $discount_price = $this->get_dom_text($crawler, $product_discount_price_node);
        $discount_percentage = $this->get_dom_text($crawler, $product_discount_percentage_node);
        $product_link = $this->get_dom_link($crawler, $product_link_node);

        $products = array();

        foreach ($nodes as $key => $n) {
            $products[$key]['name'] = isset($name[$key]) ? $name[$key] : '';
            $products[$key]['unit'] = isset($unit[$key]) ? $unit[$key] : '';
            $products[$key]['price'] = isset($price[$key]) ? $price[$key] : '';
            $products[$key]['image'] = isset($image[$key]) ? $image[$key] : '';
            $products[$key]['description'] = isset($description[$key]) ? $description[$key] : '';
            $products[$key]['discount'] = isset($discount[$key]) ? $discount[$key] : '';
            $products[$key]['product_link'] = isset($product_link[$key]) ? $product_link[$key] : '';

        }
        return $products;
    }
    public function get_products($link, $name_node, $unit_node, $price_node, $image_node, $product_description_node, $product_discount_node, $product_link_node)
    {
        $client = new Client();
        $crawler = $client->request('GET', $link);
        $name = $this->get_dom_text($crawler, $name_node);
        $unit = $this->get_dom_text($crawler, $unit_node);
        $price = $this->get_dom_text($crawler, $price_node);
        $description = $this->get_dom_text($crawler, $product_description_node);
        $discount = $this->get_dom_text($crawler, $product_discount_node);
        $image = $this->get_dom_image($crawler, $image_node);
        $product_link = $this->get_dom_link($crawler, $product_link_node);

        $products = array();

        foreach ($name as $key => $n) {
            $products[$key]['name'] = isset($name[$key]) ? $name[$key] : '';
            $products[$key]['unit'] = isset($unit[$key]) ? $unit[$key] : '';
            $products[$key]['price'] = isset($price[$key]) ? $price[$key] : '';
            $products[$key]['image'] = isset($image[$key]) ? $image[$key] : '';
            $products[$key]['description'] = isset($description[$key]) ? $description[$key] : '';
            $products[$key]['discount'] = isset($discount[$key]) ? $discount[$key] : '';
            $products[$key]['product_link'] = isset($product_link[$key]) ? $product_link[$key] : '';

        }
        return $products;
    }

    public function get_product_node($link, $name_node, $unit_node, $price_node, $image_node, $product_description_node, $product_discount_node)
    {
        $client = new Client();
        $crawler = $client->request('GET', $link);
        $name = $this->get_dom_text($crawler, $name_node);
        $unit = $this->get_dom_text($crawler, $unit_node);
        $price = $this->get_dom_text($crawler, $price_node);
        $description = $this->get_dom_text($crawler, $product_description_node);
        $discount = $this->get_dom_text($crawler, $product_discount_node);
        $image = $this->get_dom_image($crawler, $image_node);

        $products = array();

        foreach ($name as $key => $n) {
            $products[$key]['name'] = isset($name[$key]) ? $name[$key] : '';
            $products[$key]['unit'] = isset($unit[$key]) ? $unit[$key] : '';
            $products[$key]['price'] = isset($price[$key]) ? $price[$key] : '';
            $products[$key]['image'] = isset($image[$key]) ? $image[$key] : '';
            $products[$key]['description'] = isset($description[$key]) ? $description[$key] : '';
            $products[$key]['discount'] = isset($discount[$key]) ? $discount[$key] : '';

        }
        return $products;
    }

    public function get_products_links($product_url_node, $name_node, $unit_node, $price_node, $image_node, $product_description_node, $product_discount_node)
    {
        $client = new Client();

        //dd($proxies[mt_rand(0, count($proxies - 1))]);

        $crawler = $client->request('GET', $product_url_node);

        $name = $this->get_dom_text($crawler, $name_node);
        $unit = $this->get_dom_text($crawler, $unit_node);
        $price = $this->get_dom_text($crawler, $price_node);
        $description = $this->get_dom_text($crawler, $product_description_node);
        $discount = $this->get_dom_text($crawler, $product_discount_node);
        $image = $this->get_dom_image($crawler, $image_node);

        $products = array();

        foreach ($name as $key => $n) {
            $products[$key]['name'] = isset($name[$key]) ? $name[$key] : '';
            $products[$key]['unit'] = isset($unit[$key]) ? $unit[$key] : '';
            $products[$key]['price'] = isset($price[$key]) ? $price[$key] : '';
            $products[$key]['image'] = isset($image[$key]) ? $image[$key] : '';
            $products[$key]['description'] = isset($description[$key]) ? $description[$key] : '';
            $products[$key]['discount'] = isset($discount[$key]) ? $discount[$key] : '';
            $products[$key]['product_link'] = isset($product_link[$key]) ? $product_link[$key] : '';

            // $products[$key]['discount'] = isset($discount[$key]) ? $discount[$key] : '' ;
            // $products[$key]['rating'] = isset($rating[$key]) ? $rating[$key] : '' ;
            // $products[$key]['review'] = isset($review[$key]) ? $review[$key] : '' ;
            // $products[$key]['minimum'] = isset($minimum[$key]) ? $minimum[$key] : '' ;
            // $products[$key]['delivery'] = isset($delivery[$key]) ? $delivery[$key] : '' ;
            // $products[$key]['time'] = isset($time[$key]) ? $time[$key] : '' ;
        }
        return $products;
    }

    public function get_search_products($link, $name_node, $unit_node, $price_node, $image_node, $product_description_node, $product_discount_node, $product_link_node)
    {
        $client = new Client();

        //dd($proxies[mt_rand(0, count($proxies - 1))]);

        $crawler = $client->request('GET', $link);

        $name = $this->get_dom_text($crawler, $name_node);
        $unit = $this->get_dom_text($crawler, $unit_node);
        $price = $this->get_dom_text($crawler, $price_node);
        $description = $this->get_dom_text($crawler, $product_description_node);
        $discount = $this->get_dom_text($crawler, $product_discount_node);
        $image = $this->get_dom_image($crawler, $image_node);
        $product_link = $this->get_dom_link($crawler, $product_link_node);

        // $discount = $this->get_dom_text($crawler, $discount_node);
        // $rating = $this->get_dom_text($crawler, $rating_node);
        // $review = $this->get_dom_text($crawler, $review_node);
        // $minimum = $this->get_dom_text($crawler, $minimum_node);
        // $delivery = $this->get_dom_text($crawler, $delivery_node);
        // $time = $this->get_dom_text($crawler, $time_node);

        $products = array();

        foreach ($name as $key => $n) {
            $products[$key]['name'] = isset($name[$key]) ? $name[$key] : '';
            $products[$key]['unit'] = isset($unit[$key]) ? $unit[$key] : '';
            $products[$key]['price'] = isset($price[$key]) ? $price[$key] : '';
            $products[$key]['image'] = isset($image[$key]) ? $image[$key] : '';
            $products[$key]['description'] = isset($description[$key]) ? $description[$key] : '';
            $products[$key]['discount'] = isset($discount[$key]) ? $discount[$key] : '';

            $products[$key]['product_link'] = isset($product_link[$key]) ? $product_link[$key] : '';
            // $products[$key]['discount'] = isset($discount[$key]) ? $discount[$key] : '' ;
            // $products[$key]['rating'] = isset($rating[$key]) ? $rating[$key] : '' ;
            // $products[$key]['review'] = isset($review[$key]) ? $review[$key] : '' ;
            // $products[$key]['minimum'] = isset($minimum[$key]) ? $minimum[$key] : '' ;
            // $products[$key]['delivery'] = isset($delivery[$key]) ? $delivery[$key] : '' ;
            // $products[$key]['time'] = isset($time[$key]) ? $time[$key] : '' ;
        }
        return $products;
    }

    public function get_dom_text($crawler, $node_name)
    {

        if ($node_name != null) {
            return $crawler->filter($node_name)->each(function ($node) {
                $text = $node->text();
                return $text;
            });
        } else {
            return null;
        }

    }

    public function get_dom_image($crawler, $node_name)
    {
        if ($node_name != null) {
            return $crawler->filter($node_name)->each(function (Crawler $node) {
                $image = $node->attr('src');

                return $image;
            });
        } else {
            return null;
        }

        // return $crawler->filter($node_name)->each(function ($node) {
        //     $text =  $node->attr("style");

        //     return $text;
        // });
    }

    public function get_dom_link($crawler, $node_name)
    {
        if ($node_name != null) {
            return $crawler->filter($node_name)->each(function ($node) {
                return isset($node->extract(array('href'))[0]) ? $node->extract(array('href'))[0] : '';
            });
        } else {
            return null;
        }

    }
}
