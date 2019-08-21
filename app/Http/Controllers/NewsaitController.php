<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePost;
use App\Model\Newsait;
use App\Service\NewsaitService;
use App\Service\OptionService;
use Illuminate\Http\Request;
use App\Http\Requests\NewSait as NewSaitReq;


class NewsaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idlist=1,NewsaitService $service)
    {
        $serviceOpt=new OptionService();
        $count = Newsait::all()->count();
        $countPage=$serviceOpt->GetValue('countnew');
        $datas=$service->selectall($idlist,(int)$countPage);
        // Возрошаем список новостей
       return view('front.newsait.index',['datas'=>$datas,'idlist'=>$idlist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Возрошаем список новостей
        return view('back.newsait.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewSaitReq $request,NewsaitService $service)
    {
        // проверка волидации
        $validated = $request->validated();
        // добовляем запись нову
        $urlname=$service->insert($request->all());
        // переходим к записи новости
        return redirect('news/'.$urlname);
    }

    public function showName($name="",NewsaitService $service){
        $data=$service->selectname($name);
        return view('front.newsait.show',['data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Newsait  $newsait
     * @return \Illuminate\Http\Response
     */
    public function show(Newsait $newsait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Newsait  $newsait
     * @return \Illuminate\Http\Response
     */
    public function edit($id=1,Newsait $newsait,NewsaitService $service)
    {
        $data=$service->selectid($id);
        return view('back.newsait.edit',['data'=>$data]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Newsait  $newsait
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Newsait $newsait,NewsaitService $service)
    {
        // проверка волидации
        $validated = $request->validated($request->input('id'));
        $url=$service->update($request->input('id'),$request->all());
        // переходим к записи новости
        return redirect('news/'.$url);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Newsait  $newsait
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Newsait $newsait,NewsaitService $service)
    {
        $service->delete($id);
        //dump($newsait);
        return redirect('news');
        //
    }
}
