<?php

class Controller {

	public function __construct(){
		$this->business = new Business();
		$this->md = new Parsedown();
		$this->announcements = $this->md->text(file_get_contents(posts_path() . "/announcements.php") );
		$this->main_sidebar = $this->md->text(file_get_contents(posts_path() . "/main-sidebar.php") );
	}

	public function render($sub_page, $replace = [], $main = "template.php"){
		$template =file_get_contents(view_path() . "/" . $main);
		$body_template = file_get_contents(view_path() . "/" . $sub_page);

		$r = [];

		foreach($replace AS $K=>$V) {
			$key = "$" . $K;
			$r[$key] = $V;
		}

		$r['$body'] = strtr($body_template, $r);
		$r['$announcements'] = $this->announcements;
		$r['$business_name'] = $this->business->name;
		
		$r['$main_sidebar'] = strtr($this->main_sidebar, $r);

		$replace2 = strtr($template, $r);
		
		return $replace2;
	}

	public function home($request){

		return $this->render("pages/home.php", [
				'page_title' => "Home",
				"home_article" => $this->md->text(file_get_contents(posts_path() . "/home.php") )
		]);
	}

	public function blog($request){
		$entries = '';

		foreach(Config::load('posts') AS $d){
			$entries .= '<li><a href="/blog/'.$d->id.'">'.$d->title.'</a></li>';
		}

		return $this->render("pages/blog_index.php", [
				'page_title' => "Blog",
				'entries' => $entries
		]);
	}	

	public function editBlog($request){

		return $this->render("pages/edit_blog.php", [
				'page_title' => "Home",
				'text' => file_get_contents(config_path() . "/posts.json"),
		]);
	}

	public function editBlogUpdate($request){
		file_put_contents(config_path() . "/posts.json", $request->post["data"]);
		return redirect("/edit/blog");
	}

	public function post($request){
		
		return $this->render("pages/post.php", [
				'page_title' => "Blog Post",
				'post_article' => $this->md->text(file_get_contents(posts_path() . "/".$request->params[1].".php"))
		]);
	}	

	public function editPost($request){

		$path = posts_path() . "/" . $request->params[2] . ".php";

		if($request->method === "POST"){
			file_put_contents($path, $request->post["data"]);
			return redirect("/edit/post/" . $request->params[2]);
		}else{
			$Parsedown = new Parsedown();
			$myfile = fopen($path, "a");
			fclose($myfile);
			$text = file_get_contents($path);
			
			return $this->render("pages/edit_post.php", [
				'page_title' => "Editor",
				'text' => $text,
				'uuid' => $request->params[2],
				'output' => $Parsedown->text($text)
			]);

		}

		

	}


}

class StreamController {
	
	public function index($request){
			$listing = scandir(posts_path());
			$x = "<ul>";

				foreach($listing AS $l){
					if(substr($l,0,1) !== "."){
						$x .= "<li>".str_replace(".php", "",$l)."</li>";
					}
				}

			$x .= "</ul>";
			return $x;
	}

	public function show($request){
		
		if(strpos(".", $request->params[1])){
			$file = explode(".", $request->params[1], 2);
		}else{
			$file = explode("_", $request->params[1], 2);	
		}
		
		$type = $file[1];

		switch($type){
			case "css":
				$css = file_get_contents(posts_path() . "/".$request->params[1].".php");
				return $css;
			break;

			default:
					dd("Cannot Find: " . $request->params[1]);
		}
	}

}
?>