<?php
  namespace App\Controllers;
  
  use App\Models\News;

  class NewsController {
    public function index()
    { 
      $limit            = 5;
      $news             = new News();
      if(isset($_GET["page"])){
        $current_page=$_GET["page"];
      }else{
        $current_page=1;
      }
      $rowcount         = $news->row();
      $paginate         = ceil($rowcount/$limit);
      $offset = ($current_page - 1) * $limit;
      $result           = $news->show(['*'], $offset, $limit);
      $data['paginate'] = $paginate;
      $data['result']   = $result;
      $data['current_page'] = $current_page;
      view('news.index', $data);
    }

    public function add()
    {
      if(isset($_POST['add'])){
        $name = $_POST['name'];
        $preview = $_POST['preview'];
        $add       = new News();
        $result    = $add->insert($name,$preview);
        if($result){
          header("LOCATION:/news/index?msg=Bạn đã thêm thành công");
          exit();
        }
      }
      view('news.add-news');
    }

    public function edit($id)
    {
      $news = new News();
      $result = $news->find($id);
      $data['result'] = $result;
      if(isset($_POST['edit'])){
        $idedit      = $_POST['id'];
        $name = $_POST['name'];
        $preview = $_POST['preview'];
        $result_edit   = $news->update($name,$preview,$idedit);
        if($result_edit){
          header("LOCATION:/news/index?msg=Bạn sửa thành công");
          exit();
        }
      }
      view('news.edit-news', $data);
    }

    public function del($id){
      $news   = new News();
      $result = $news->delete($id);
      if($result){
        header("LOCATION:/news/index?msg=Bạn xóa thành công");
        exit();
      }
    }
  }