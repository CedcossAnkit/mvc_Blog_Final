<?php

namespace App\Controllers;
// print_r($_SESSION['allBlogs']);
// echo "<pre>";
// foreach ($_SESSION['allBlogs'] as $key => $value) {
//      print_r($value);
// }
// echo "</pre>";
// die();
// if (session_start()) {
// } else {

//     session_start();
// }

use App\Libraries\Controller;

class Admin extends Controller
{
    public function index()
    {
        echo "default file";
    }
    public function signup()
    {

        $data = array(
            'action' => isset($_POST['register']) ? $_POST['register'] : 'gg',
            'name' => isset($_POST['name']) ? $_POST['name'] : 'gg',
            'email' => isset($_POST['email']) ? $_POST['email'] : 'gg',
            'password' => isset($_POST['password']) ? $_POST['password'] : 'gg',
        );

        if ($data['action'] == 'register') {

            if ($_POST['name'] == "" || $_POST['email'] == "" || $_POST['password'] == "") {
            } else {
                if ($_POST['password'] == $_POST['password2']) {
                    //main insert code
                    $users = $this->model('Users');
                    $users->name = $data['name'];
                    $users->username = $data['name'];
                    $users->email = $data['email'];
                    $users->password = $data['password'];

                    $users->save();
                    echo "data sucessfully inserted";
                } else {
                    echo "password not match";
                }
            }
        }

        $this->view('signup', $data);
    }
    public function signin()
    {

        if (isset($_POST)) {

            $data = array(
                'action' => isset($_POST['login']) ? $_POST['login'] : 'gg',
                'email' => isset($_POST['email']) ? $_POST['email'] : 'gg',
                'password' => isset($_POST['password']) ? $_POST['password'] : 'gg'
            );

            if ($data['action'] == 'login') {

                if ($data['email'] != "" || $data['password'] != "") {
                    $data2 = $this->model('Users')::find_by_email_and_password($data['email'], $data['password']);



                    if (isset($data2)) {
                        // echo "valid";
                        if (isset($data2) && $data2->status == "approved") {
                            $_SESSION['login'] = array(
                                'id' => $data2->id,
                                'name' => $data2->name,
                                'username' => $data2->name,
                                'email' => $data2->email,
                                'password' => $data2->password,
                                'role' => $data2->role,
                                'status' => $data2->status,
                            );
                        }
                        if ($data2->role == 'admin' &&  $data2->status == "approved") {

                            header('Location: http://localhost:8080/public/admin/dashboard');
                        } else if ($data2->role == 'user' &&  $data2->status == "approved") {

                            header('Location: http://localhost:8080/public/admin/blog');
                        }
                        else{
                            echo "User is invalid or not approved";
                        }

                        // // $password = $users->find_by_password($data['password']);
                        // // echo "$name,$password";
                        // echo "<pre>";
                        // // print_r($_SESSION['login']);
                        // // if ($_SESSION['login'][0]['role'] == "user") {
                        // //     echo "user";
                        // // } else {
                        // //     echo "admin";
                        // // }
                        // echo "</pre>";
                    } else {
                        echo "invalid";
                    }
                }
            }
        }
        $this->view('signin', $data);
    }


    public function dashboard()
    {
        $alldata['users'] = $this->model('Users')::find('all');
        $alldata['blogs'] = $this->model('Main')::find('all');

        // $_SESSION['alldata']=$alldata;
        // print_r($alldata);

        $this->view('dashboard', $alldata);

        if (isset($_REQUEST['iddell'])) {
            $id = $_REQUEST['iddell'];
            // $main = $this->model('Main');
            $neww = $this->model('Users')::find_by_id($id);
            $neww->delete();
            // $users->name = $data['name'];
        }
        if (isset($_REQUEST['idapp'])) {
            $id = $_REQUEST['idapp'];
            // // $main = $this->model('Main');
            // $neww=$this->model('Users')::find_by_id($id);
            // $neww->delete();
            // // $users->name = $data['name'];
            echo $id;
            $new = $this->model('Users')::find($id);
            $new->status = "approved";
            $new->save();
            echo "Status Chnage";
        }
        if (isset($_REQUEST['idrejj'])) {
            $id = $_REQUEST['idrejj'];
            // // $main = $this->model('Main');
            // $neww=$this->model('Users')::find_by_id($id);
            // $neww->delete();
            // // $users->name = $data['name'];
            echo $id;
            $new = $this->model('Users')::find($id);
            $new->status = "Rejected";
            $new->save();
            echo "Status Chnage";
        }
        if (isset($_REQUEST['ABlogid'])) {
            $id = $_REQUEST['ABlogid'];
            // // $main = $this->model('Main');
            // $neww=$this->model('Users')::find_by_id($id);
            // $neww->delete();
            // // $users->name = $data['name'];
            echo $id;
            $new = $this->model('Main')::find($id);
            $new->status = "Approved";
            $new->save();
            echo "Status Chnage";
        }
        if (isset($_REQUEST['RBlogid'])) {
            $id = $_REQUEST['RBlogid'];
            // // $main = $this->model('Main');
            // $neww=$this->model('Users')::find_by_id($id);
            // $neww->delete();
            // // $users->name = $data['name'];
            echo $id;
            $new = $this->model('Main')::find($id);
            $new->status = "Rejected";
            $new->save();
            echo "Status Chnage";
        }
        if (isset($_REQUEST['DBlogid'])) {
            $id = $_REQUEST['DBlogid'];
            // // $main = $this->model('Main');
            // $neww=$this->model('Users')::find_by_id($id);
            // $neww->delete();
            // // $users->name = $data['name'];
            echo $id;
            $new = $this->model('Main')::find($id);
            $new->delete();
            echo "Deleted";
        }
    }

    public function Validation()
    {
        if ($_POST['name'] == "" || $_POST['email'] == "" || $_POST['password'] == "") {

            return false;
        } else {
            return true;
        }
    }

    public function blog()
    {
        $data['main'] = $this->model('Main')::find('all');
        $data['feature'] = $this->model('Main')::find(7756);

        // $_SESSION['alldata']=$alldata;
        // print_r($alldata);
        $_SESSION['allBlogs'] = $data;
        $this->view('blog', $data);

        if (isset($_REQUEST['BlogID'])) {
            // $id = $_REQUEST['BlogID'];
            // self::SinglePage($id);
            // echo "oaisdhffobdsfb";
        }
    }

    public function SinglePage()
    {
        // $data['singleblog'] = $this->model('Main')::find($id);
        if (isset($_REQUEST['BlogID'])) {
            $id = $_REQUEST['BlogID'];
            $data['main'] = $this->model('Main')::find($id);
            $this->view('singleBlog', $data['main']);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
        }
    }

    public function writeBlog()
    {
        $writeBlogarray = array(
            'action' => isset($_POST['submit']) ? $_POST['submit'] : 'gg',
            'id' => $_SESSION['login']['id'],
            'category' => isset($_POST['category']) ? $_POST['category'] : 'gg',
            'topic' => isset($_POST['topic']) ? $_POST['topic'] : 'gg',
            'title' => isset($_POST['title']) ? $_POST['title'] : 'gg',
            'Description' => isset($_POST['desc']) ? $_POST['desc'] : 'gg',
            'content' => isset($_POST['content']) ? $_POST['content'] : 'gg',


        );
        // die(json_encode($writeBlogarray));

        $this->view('writeBlog', $writeBlogarray);
        if ($writeBlogarray['action'] == 'submit') {

            $Main = $this->model('Main');
            $Main->post_id =  rand(1000, 9999);
            $Main->user_id =  $writeBlogarray['id'];
            $Main->category = $writeBlogarray['category'];
            $Main->post_title = $writeBlogarray['title'];
            $Main->post_topic = $writeBlogarray['topic'];
            $Main->post_desc = $writeBlogarray['Description'];
            $Main->post_content = $writeBlogarray['content'];
            $Main->save();
            $allBlogs['blogs'] = $this->model('Main')::find('all');
            // $_SESSION['blogs']=$allBlogs['blogs'];
            echo "data Sucessfully inserted";
        }
    }
    // public function feachDeatls()
    // {
    //     $alldata['users'] = $this->model('Users')::find('all');
    //     // echo "<pre>";
    //     // print_r($alldata);
    //     // echo "</pre>";
    //     return $alldata;
    // }

}
