<?php session_start();

class data
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "imggallery";

    var $username;
    var $emailid;
    var $password;

    public $result;
    private $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->conn) {
            return $this->conn;
        } else {
            echo "Not connected";
        }
    }

    public function signup()
    {
        $username = $_REQUEST['username'];
        $emailid = $_REQUEST['emailid'];
        $password = $_REQUEST['password'];
        $query = "select username,emailid from p_data where username='$username' and emailid='$emailid'";
        $result = $this->conn->query($query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "<script>
                alert('User already exist.');
                window.location.href='signup.php';
                </script>";
        } else {
            $query1 = "insert into p_data(username, emailid, password) values('$username','$emailid','$password')";
            $sql = $this->conn->query($query1);
?>
            <script>
                alert('Registration done Successfully.');
                window.location.href = 'index.php';
            </script>
        <?php
        }
    }

    public function login($post)
    {
        $username = $_REQUEST['us'];
        $password = $_REQUEST['ps'];
        $query = "select * from p_data where emailid='$username' and password='$password'";
        $sql = $this->conn->query($query);
        $count = mysqli_num_rows($sql);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $_SESSION['userid'] = $row['id'];
                $_SESSION['uname'] = $row['emailid'];
                $_SESSION['password'] = $row['password'];
            }

        ?> <script>
                alert('Login Successfull.');
                window.location.href = 'imagedisplay.php';
                print_r($_SESSION['userid']);
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Login Failed.');
                window.location.href = 'index.php';
                print_r($_SESSION = ['userid']);
            </script>;
        <?php
        }
    }

    public function logout()
    {
        if (!empty($_SESSION['uname'])) {
            session_unset();
            session_destroy();
            header('location:home.php');
        }
    }

    public function insertimage()
    {
        $views = 0;
        $userid = $_SESSION['userid'];
        $title = $_REQUEST['title'];
        $visible = $_REQUEST['visible'];
        $filename = $_FILES['f']['name'];
        $filepath = $_FILES['f']['tmp_name'];
        $imagename = explode(".", $filename);
        $ext = $imagename[1];
        $query = "show table status like 'uploadimage'";
        $result = $this->conn->query($query);
        $row = mysqli_fetch_assoc($result);
        $id = $row['Auto_increment'];
        $newfilename = $id . "." . $ext; //inorder to avoid overlapping of same name file.
        $query = "insert into uploadimage(userid,image,title,visible,views) values('$userid','$newfilename','$title','$visible','$views')";
        $result = $this->conn->query($query);
        if ($result == true) {
            move_uploaded_file($filepath, "pics/" . $newfilename);
        ?>
            <script>
                alert('Image Uploaded Successfully');
                window.location.href = 'imagedisplay.php';
            </script>
        <?php

            //clearstatcache();
        } else {
            echo "Record Not Inserted";
        }
    }

    public function displayimagepublic()
    {
        $query = "select * from uploadimage";
        // where visible='public'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($r = $result->fetch_assoc()) {
                $data[] = $r;
            }
            return $data;
        } else {
            echo "No records found";
        }
    }

    // public function displayimageprivate()
    // {
    //     $query = "select * from uploadimage where userid=$id";
    //     $result = $this->conn->query($query);
    //     if ($result->num_rows > 0) {
    //         $data = array();
    //         while ($r = $result->fetch_assoc()) {
    //             $data[] = $r;
    //         }
    //         return $data;
    //     } else {
    //         echo "No records found";
    //     }
    // }

    public function favorite($id)
    {
        $username = $_SESSION['uname'];
        $query = "select * from uploadimage where id=$id";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        $image = $row['image'];
        $title = $row['title'];
        $query = "select * from favorite where image='$image', title='$title' and username='$username'";
        $result = $this->conn->query($query);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
        ?>
            <script>
                alert('Image is present in favorites');
                window.location.href = 'imagedisplay.php';
            </script>
            <?php
        } else {
            $query = "insert into favorite (fid,image,title,username) select pid,'$title',,'$image',username from uploadimage where id=$id";
            $result = $this->conn->query($query);
            if ($result == true) {
            ?>
                <script>
                    alert('Image added to favorites');
                    window.location.href = 'imagedisplay.php';
                </script>
<?php
            }
        }
    }

    public function displayfav()
    {
        $username = $_SESSION['uname'];
        $query = "select a.*,b.id,b.username from uplaodimage a,favorite b where a.id=b.id";
        $result = $this->conn->query($query);
        if ($result) {
        }
    }
}
?>