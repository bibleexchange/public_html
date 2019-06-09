<?php

class Controller {

	public function __construct(){
		$this->business = new Business();
		$this->md = new Parsedown();
		$this->announcements = $this->md->text(file_get_contents(posts_path() . "/home.php") );
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

		$page_title = "Blog Post";
		$business = new Business();
		$template =file_get_contents(view_path() . "/template.php");
		$body = $Parsedown->text(file_get_contents(posts_path() . "/".$request->params[1].".php"));

		$replace2 = strtr($template, 
			[ 
				'$page_title' => $page_title,
				'$body' => $body
			]
		);
		
		return $replace2;
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
	public function show($request){
		
		$file = explode("_", $request->params[1], 2);

		switch($file[1]){
			case "css":
				$css = file_get_contents(posts_path() . "/".$file[0].".".$file[1].".php");
				return $css;
			break;

			default:
					dd("Cannot Find: " . $request->params[1]);
		}
	}

}
?>