<?php

namespace App\Http\Controllers;

use App\CategoryLink;
use App\Http\Controllers\RequestController;
use App\ScrapedCategory;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class ScrapedCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_nodes = ScrapedCategory::with('website', 'category')->paginate(100);
        return view('backEnd.scraped_category.index', compact('category_nodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_links = CategoryLink::with('website.category_node')->get();
        $req = new RequestController();
        $pro_results = [];
        $store_results = [];

        foreach ($category_links as $category_link) {
            if ($category_link['last_updated'] == "" || $category_link['last_updated'] < Carbon::today()) {
                $node = $category_link->website->category_node;

                if ($category_link->scrap_method == 'API') {
                    $pro_results = $req->category_api_scrapper($category_link->website->website_name, $category_link->request_type, $node['main_listing_node'], $category_link->category_link, $node['title'], $node['brand'], $node['description'], $node['price'], $node['unit_price'], $node['discount_percentage'], $node['discount_price'], $node['image'], $node['image_url'], $node['rating'], $node['product_link'], $node['slug']);
                }
                if ($category_link->scrap_method == 'HTML') {
                    $pro_results = $req->category_url_scrapper($category_link->website->website_name, $category_link->request_type, $node['main_listing_node'], $category_link->category_link, $node['title'], $node['brand'], $node['description'], $node['price'], $node['unit_price'], $node['discount_percentage'], $node['discount_price'], $node['image'], $node['image_url'], $node['rating'], $node['product_link'], $node['slug']);
                }

                foreach ($pro_results as $pro_result) {

                    // $get_domain = parse_url($category_link->website->website_url);
                    // $domain = $get_domain['host'];
                    if (isset($pro_result['image'])) {
                        // if (strpos($domain, $pro_result['image']) !== false) {
                        $url = $pro_result['image'];

                        $contents = file_get_contents($url);

                        $name = substr($url, strrpos($url, '/') + 1);
                        Storage::disk('public')->put($name, $contents);
                        $image = $name;

                        // }
                        // else {

                        //     $url = $pro_result['image'];
                        //     dd($url);
                        //     $contents = file_get_contents($url);
                        //     $name = substr($url, strrpos($url, '/') + 1);
                        //     Storage::disk('public')->put($name, $contents);
                        //     $image = $name;
                        // }
                    }

                    $store_results[] = ['title' => $pro_result['title'], 'description' => isset($pro_result['description']) ? $pro_result['description'] : '',
                        'brand' => isset($pro_result['brand']) ? $pro_result['brand'] : '',
                        'price' => isset($pro_result['price']) ? $pro_result['price'] : '',
                        'unit_price' => isset($pro_result['unit_price']) ? $pro_result['unit_price'] : '',
                        'discount_percentage' => isset($pro_result['discount_percentage']) ? $pro_result['discount_percentage'] : '',
                        'discount_price' => isset($pro_result['discount_price']) ? $pro_result['discount_price'] : '',
                        'rating' => isset($pro_result['rating']) ? $pro_result['rating'] : '',
                        'product_link' => isset($pro_result['product_link']) ? $pro_result['product_link'] : '',
                        'last_updated' => Carbon::now(), 'category_id' => $category_link['category_id'], 'website_id' => $category_link['website_id'], 'image' => isset($image) ? $image : ''];
                    DB::table('category_links')->where('id', $category_link->id)->update(['last_updated' => Carbon::now()]);

                }
                ScrapedCategory::insert($store_results);
            }

        }
        return redirect(route('scraped_categories.index'))->with('success', 'Category Scraped successfully');

    }

    public function search()
    {
        $web_data = array();
        $client = new Client();
        $crawler = $client->request('GET', "https://www.celeiro.pt/produtos/frescos?cat=144");

        $index = 0;
        $nodes = $crawler->filter('.grid-item');

        foreach ($nodes as $node) {
            $node = new Crawler($node);
            $web_data[$index]['title'] = $node->filter('.product-item-link')->text();
            $web_data[$index]['description'] = $node->filter('')->text();
            $web_data[$index]['brand'] = $node->filter('.brand')->text();
            $web_data[$index]['price'] = $node->filter('.price')->text();
            $web_data[$index]['unit_price'] = $node->filter('.apresentacao')->text();
            $web_data[$index]['image'] = $node->filter('IMG.product-image-photo')->extract(array('src'))[0];
            $web_data[$index]['product_link'] = $node->filter('a')->extract(array('href'))[0];

            $index++;
        };
        dd($web_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScrapedCategory  $scrapedCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ScrapedCategory $scrapedCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScrapedCategory  $scrapedCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ScrapedCategory $scrapedCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScrapedCategory  $scrapedCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScrapedCategory $scrapedCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScrapedCategory  $scrapedCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScrapedCategory $scrapedCategory)
    {
        $scrapedCategory->delete();
        return redirect()->back()->with('success', 'product deleted successfully');

    }
    public function scrap()
    {
        $web_data = array();
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.froiz.pt/?category_producto=laticinios-e-produtos-vegetais');

        $index = 0;
        // $nodes = $crawler->filter('.c2prKC');
        $nodes = $crawler->filter('.una-categoria-lista li');

        foreach ($nodes as $node) {
            $node = new Crawler($node);

            if (!empty($node->filter('.produtos_nome')->text())) {
                $web_data[$index]['title'] = $node->filter('.produtos_nome')->count() > 0 ? $node->filter('.produtos_nome')->text() : 0;
            }

            if ($node->filter('.of_precio_rebajado')->text() != "") {
                $web_data[$index]['game_price'] = $node->filter('.of_precio_rebajado')->text();
            }

            $web_data[$index]['game_image_url'] = $node->filter('.of_imagen')->extract(array('src'))[0];

            // (

            //     (isset($node->filter('img')->extract(array('srcset'))[0])) ? $this->parse_comma($node, $node->filter('img')->extract(array('srcset'))[0]) :
            //     ((isset($node->filter('img')->extract(array('src'))[0])) ? $node->filter('img')->extract(array('src'))[0] : ''
            //     )
            // );
            // $web_data[$index]['game_link'] = $node->filter('.ProdutoNome')->extract(array('href'))[0];

            $index++;
        };
        dd($web_data);
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
}
