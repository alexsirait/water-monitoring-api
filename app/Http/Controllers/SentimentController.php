<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Sentiment\Analyzer;
class SentimentController extends Controller
{
    public function sentiment(Request $req)
    {
        $analyzer = new Analyzer();

        $output_text = $analyzer->getSentiment("");

        dd($output_text);
    }
}