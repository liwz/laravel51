<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;


class Request2Controller extends Controller
{


    public function getAddCookie()
    {
        $response = new Response();
        $response->withCookie(cookie("website", "aaaaa", 60));


        $response->withCookie(cookie()->forever('name2', 'value'));


        return $response;


    }





    public function getCookie(Request $request)
    {
        $this->getAddCookie();

        $cookies = $request->cookie();
        dd($cookies);
    }


    public function getInputData(Request $request)
    {
        $name = $request->input('name', 'liwz');


        $arrName = $request->input('test.0.name');

        var_dump($request->all());


    }

    public function getBasetest(Request $request)
    {
        $input = $request->input('test');
        echo $input;
    }


    public function getHas(Request $request)
    {


        if ($request->has('t')) {
            echo $request->input(t);
        } else {
            echo 12;
        }

    }

    /**
     * 获取 http method
     * @param Request $request
     */
    public function getMethod(Request $request)
    {
        var_dump($request->getMethod());


        var_dump($request->method());
    }

    /**
     * 获取url
     * @param Request $request
     */
    public function getUrl(Request $request)
    {
        if (!$request->is('request/*')) {
            abort(404);
        }


        $uri = $request->path();
        $url = $request->url();


        echo $uri . "<br/>";


        echo $url;
    }

    public function getA(Request $request)
    {

        $input = $request->input('test');
        echo $input;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
