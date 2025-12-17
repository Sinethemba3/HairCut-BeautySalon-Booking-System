<?php 
	class Blog_full extends  Controller
    {
        public function index()
        {
            $blogs       = new Blog();
            
            $limit  = 6;
            $pager  = new Pager($limit);
            $offset = $pager->offset;

            $query = "SELECT * FROM blogs ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $blogz = $blogs->query($query);

            $this->view('blog_full', [
                'rows'  =>  $blogz,
                'pager' =>  $pager,
            ]);
        }
    }