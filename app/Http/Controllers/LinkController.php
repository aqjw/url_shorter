<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function visit($short_url)
    {
        $link = Link::where('short', $short_url)->firstOrFail();
        $link->visits()->create(['visitor' => request()->ip()]);
        return redirect($link->origin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $short = hash('crc32', $request->url, false);
        $link = Link::firstOrCreate(
            ['short' => $short],
            ['origin' => $request->url]
        );

        return response(['link' => $link]);
    }
}
