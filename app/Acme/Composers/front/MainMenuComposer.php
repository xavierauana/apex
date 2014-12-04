<?php namespace Acme\Composers\front;



use Acme\Services\PageServices;
use Cache;
/**
*
*/
class MainMenuComposer
{
	protected $Page;
  public $html = "";

	public function __construct(PageServices $Page)
	{
		$this->Page = $Page;
	}

	public function compose($view)
	{

		$menu = Cache::rememberForever('front_main_menu', function(){
			return $this->createMenu();
		});

		$view->with('menu', $menu);
	}

	public function createMenu()
    {
        $links = $this->Page->getAllPages();

        foreach ($links as $element) {
            if ($element->parent_id == 0) {
                $link[0][] = $element->id;
            } else {
                $link[$element->parent_id][] = $element->id;
            }

            $data[$element->id]["title"] = $element->title;
            $data[$element->id]["url"] = $element->url;
        }



        // fech through first set $link

        function menuAssemble($links_dependency, $links_data, $index=0)
        {
          $html="";
          foreach ($links_dependency[$index] as $element) {
              $index == 0 ? $class = "top" : $class = "item";

              // check $link[0][0] has any children
              if(array_key_exists($element, $links_dependency))
              {
                $index == 0 ? $class = "top" : $class = "with-item";
                $html .= '<li class="dropdown '.$class.' ">';
                  $html .= '<span class="triangle"></span><a href="" class="dropdown-toggle" data-toggle="dropdown">'.$links_data[$element]["title"].'</a>';
                  $html .= '<ul class="dropdown-menu" role="menu">';
                  $html .= menuAssemble($links_dependency, $links_data, $element);
              }else{
                $html .= '<li class="'.$class.'"><span class="triangle"></span><a href="'.$links_data[$element]['url'].'">'.$links_data[$element]["title"].'</a>';
              }
               $html .= "</li>";
          }
              $html .= '</ul>';

          return $html;
        }

        return $result = menuAssemble($link, $data);
	}


}