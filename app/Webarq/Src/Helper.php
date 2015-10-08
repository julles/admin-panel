<?php namespace App\Webarq\Src;

use Request;

class Helper
{
	
	public function applicationName()
	{
		return 'MRT - Website';
	}

	public function backendName()
	{
		return 'admin-cp';
	}

	public function segment($segment)
	{
		return Request::segment($segment);
	}

	public function segmentAction()
	{
		return $this->segment(3);
	}

	public function thisUrl()
	{
		return Request::url();
	}

	public function assetUrl()
	{
		return asset(null);
	}

	public function contents()
	{
		return 'contents';
	}

	public function urlBackend($link = "")
	{
		return url($this->backendName()."/".$link);
	}

	public function urlAction($action = "" , $url = "")
	{
		$backendName = $this->backendName();
		$menu = $this->segment(2);

		$generate = $backendName."/".$menu."/".$action;

		return ($url == "no") ? $generate : url($generate);
	}

	public function injectModel($model)
	{
		$class = 'App\Models\\'.$model;

		return new $class;
	}

	public function getMenu()
	{
		$permalink = $this->segment(2);
		$menu = $this->injectModel('Menu');
		$model =  $menu->wherePermalink($permalink)->first();
		if($model !== false)
		{
			return $model;
		}else{
			return [];
		}
	}

	public function getUser()
	{
		return \Auth::user();
	}

	public function labelAction()
	{
		$action = $this->segmentAction();
		$titleMenu = $this->getMenu()->title;

		if(!empty($action))
		{

			switch($action)
			{
				default:
					return $titleMenu;
				break;
				case "index":
					return $titleMenu;
				break;
				case "create":
					return 'Add New - '.$titleMenu;
				break;
				case "update":
					return 'Update - '.$titleMenu;
				break;

				case "view":
					return 'View - '.$titleMenu;
				break;

			}

		}else{
				
			return $titleMenu;

		}
	}

	public function buttonDelete($link)
	{
		$url = $this->urlAction('delete/'.$link);
		return ' <a class="icon delete" href = "'.$url.'" title="Click to delete this item" onclick="return confirm(\'You Want to delete this item ?\')" ></a>';
	}
	public function buttonUpdate($link)
	{
		$url = $this->urlAction('update/'.$link);
		return ' <a class="icon edit" title="Click to edit this item" href="'.$url.'"></a>';
	}

	public function buttonView($link)
	{
		$url = $this->urlAction('view/'.$link);
		return '<a title="Click to view this item" class="icon view" href="'.$url.'"></a>';
	}

	public function buttonPublish($link)
	{
		$url = $this->urlAction('publish/'.$link);
		return '<a title="Click to publish this item" class="icon status active ajax" onclick="return confirm(\'are you sure to un publish this item ? \')" href="'.$url.'"></a>';
	}

	public function buttonUnPublish($link)
	{ 	
		$url = $this->urlAction('publish/'.$link);
		return '<a title="Click to un publish this item" class="icon status in-active ajax" onclick="return confirm(\'are you sure to Publish this item ? \')" href="'.$url.'"></a>';
	}

	public function cekRight()
	{
		$menu = $this->getMenu();

		$user = $this->getUser();
        
        $actionSegment =  $this->segmentAction();
       
        $action = $this->injectModel('Action')->select('id')->whereAction($actionSegment)->first();

		 if(!empty($menu->id))
         {
            $roleId = $user->role_id;
            
            if(!empty($action->id))
            {
                $cek = $this->injectModel('Right')->whereRoleId($roleId)->whereMenuId($menu->id)->whereActionId($action->id)->first();

                if(empty($cek))
                {
                    return 'false';
                }
            }
        }
	}

	public function buttonCreate()
	{
		if($this->cekRightButtons('create') != 'false')
		{
			return '<div id="create-button">
	            	<a href="'.$this->urlAction("create").'"><span>Create Navigation</span></a>
	        	</div>';
		}
	}


	public function cekRightButtons($action)
	{
		$menu = $this->getMenu();

		$user = $this->getUser();
        
        $actionSegment =  $action;
       
        $action = $this->injectModel('Action')->select('id')->whereAction($actionSegment)->first();

		 if(!empty($menu->id))
         {
            $roleId = $user->role_id;
            
            if(!empty($action->id))
            {
                $cek = $this->injectModel('Right')->whereRoleId($roleId)->whereMenuId($menu->id)->whereActionId($action->id)->first();

                if(empty($cek))
                {
                    return 'false';
                }
            }
        }
	}

	public function elfinderUpload()
	{
		if($this->cekRightButtons('upload') != 'false')
		{
			echo "true";
		}else{
			echo "false";
		}
	}

	public function elfinderDelete()
	{
		if($this->cekRightButtons('delete') != 'false')
		{
			echo "true";
		}else{
			echo "false";
		}
	}


	public function buttons($update = "" , $delete = "" , $view = "" , $publish = [])
	{ 
		$menuAction = $this->injectModel('MenuAction');
		
		$menu = $this->getMenu();
		
		$cekRight = '';
		
		$buttons = "";
		
		foreach($menuAction->whereMenuId($menu->id)->get() as $row)
		{
			if($row->action->action == 'update')
			{
				if($this->cekRightButtons('update') != 'false')
				{
					$buttons .= $this->buttonUpdate($update);
				}
			
			}elseif($row->action->action == 'delete'){
				
				if($this->cekRightButtons('delete') != 'false')
				{
					$buttons .= $this->buttonDelete($delete);
				}
				
			}elseif($row->action->action == 'view'){
				
				if($this->cekRightButtons('view') != 'false')
				{
					$buttons .= $this->buttonView($view);
				}	
					
			}elseif($row->action->action == 'publish'){
				
				if($this->cekRightButtons('view') != 'publish')
				{
					if(!empty($publish))
					{
							if($publish[0] == "" || $publish[0] == 'true') 
							{
								$buttons .= $this->buttonPublish($publish[1]);
							
							}elseif($publish[0] == 'false'){
								$buttons .= $this->buttonUnPublish($publish[1]);
							
							}
					}
				}
					
							
			}
		}

		return $buttons;
	}

	public function alert($event , $big , $small ="")
	{
		return ' 
		<script type="text/javascript">
        	swal("'.$big.'", "'.$small.'", "'.$event.'")
        
    	</script>';
	}
}