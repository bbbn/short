<?php

namespace App;

//use App\User;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	protected $table = 'urls';
    //protected $fillable = ['url'];

   public function getShort($string)
   {
   	//проверка на валидность
   	//проверка на наличие сслыки в базе
   	//return 1;
   	 // Массив с компонентами URL, сгенерированный функцией parse_url()
//      if(get_headers($string, 1)){
//    return 1;
// }
// else return 0;
   	if (filter_var($string, FILTER_VALIDATE_URL) === false) {
     $array['error']=1;
      $array['answer']='Unvalid url';
      return $array;
	} else {
	  if($this->where('url','=',$string)->count())
	  {

	  	$x=$this->where('url','=',$string)->pluck('id');
	  	//var_dump($x[0]);
	  	//return $x;
	  	//echo "<pre>";
	  	//var_dump($_SERVER);
      $array['error']=0;
      $array['answer']=str_replace("/add", "", "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."/".(string)$this->dec2link($x[0]));
	  	return $array;
	  	
	  }
	  else //->pluck('name')
	  {
	  	$array['error']=2;
      $array['answer']='ссылка не найдена';
      return $array;
	  }
	}
   	//return(filter_var($string, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED));
   	//return $this->where('url','=',$string)->count();
   	//возврат короткой ссылки
   }



   private function dec2link($id) {
    $digits='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $link='';
    do {
        $dig=$id%62;
        $link=$digits[$dig].$link;
        $id=floor($id/62);
    } while($id!=0);
    return $link;
}

// Функция получения индекса из кода ссылки 
private function link2dec($link) { 
    $digits=Array('0'=>0,  '1'=>1,  '2'=>2,  '3'=>3,  '4'=>4,  '5'=>5,  '6'=>6, 
                  '7'=>7,  '8'=>8,  '9'=>9,  'a'=>10, 'b'=>11, 'c'=>12, 'd'=>13, 
                  'e'=>14, 'f'=>15, 'g'=>16, 'h'=>17, 'i'=>18, 'j'=>19, 'k'=>20, 
                  'l'=>21, 'm'=>22, 'n'=>23, 'o'=>24, 'p'=>25, 'q'=>26, 'r'=>27, 
                  's'=>28, 't'=>29, 'u'=>30, 'v'=>31, 'w'=>32, 'x'=>33, 'y'=>34, 
                  'z'=>35, 'A'=>36, 'B'=>37, 'C'=>38, 'D'=>39, 'E'=>40, 'F'=>41, 
                  'G'=>42, 'H'=>43, 'I'=>44, 'J'=>45, 'K'=>46, 'L'=>47, 'M'=>48, 
                  'N'=>49, 'O'=>50, 'P'=>51, 'Q'=>52, 'R'=>53, 'S'=>54, 'T'=>55, 
                  'U'=>56, 'V'=>57, 'W'=>58, 'X'=>59, 'Y'=>60, 'Z'=>61); 
    $id=0; 
    for ($i=0; $i<strlen($link); $i++) { 
        $id+=$digits[$link[(strlen($link)-$i-1)]]*pow(62,$i); 
    } 
    return $id; 
} 

public function redirect($id)
{
	if($this->where('id','=',$this->link2dec($id))->count())
	  {

	  	$x=$this->where('id','=',$this->link2dec($id))->pluck('url');
	  	return $x[0];
	  }
	else
	{
		return (0);
	}
}

}