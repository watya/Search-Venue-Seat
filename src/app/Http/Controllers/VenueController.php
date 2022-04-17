<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VenueController extends Controller
{
    /**
     * トップページ
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {

        return view(
            'venue.index',
            []
        );
    }

    /**
     * ぴあアリーナ
     *
     * @return \Illuminate\View\View
     */
    public function pia(): View
    {

        return view(
            'venue.pia',
            []
        );
    }

    /**
     * ぴあアリーナ
     *
     * @return \Illuminate\View\View
     */
    public function yokohama(): View
    {

        return view(
            'venue.yokohama',
            []
        );
    }
}
