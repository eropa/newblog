<?php

namespace App\Service;

use App\Model\Newsait;
use Illuminate\Support\Facades\DB;

class NewsaitService{

    function generate_chpu ($str)
    {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',  'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        $str = strtr($str, $converter);
        $str = strtolower($str);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str = trim($str, "-");
        return $str;
    }


    /**
     * Добовляем нового пользовтаеля
     * @param $array
     * @return null|string|string[]
     */
    public function insert($array){
        $url=$this->generate_chpu($array['title']);
        $model=new Newsait();
        $model->title=$array['title'];
        $model->datepublic=$array['datepublic'];
        $model->smalltext=$array['smalltext'];
        $model->bigtext=$array['bigtext'];
        $model->url=$url;
        $model->save();
        return $url;
    }

    public function selectname($name){
        $datanew=Newsait::where('url', $name)->first();
        return $datanew;
    }


    public function selectall($idlist=1,$count=1){
        $datanews=Newsait::orderBy('datepublic', 'desc')->paginate($count);
        return $datanews;
    }

    public function selectid($id){
        $datanew=Newsait::find($id);
        return $datanew;
    }

    public function update($id,$array){

        $model=Newsait::find($id);
        $url=$this->generate_chpu($array['title']);
        $model->title=$array['title'];
        $model->smalltext=$array['smalltext'];
        $model->bigtext=$array['bigtext'];
        $model->datepublic=$array['datepublic'];
        $model->url=$url;
        $model->save();
        return $url;
    }


    public function delete($id){
        $model=Newsait::find($id);
        $model->delete();
    }

}