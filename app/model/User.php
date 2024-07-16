<?php

namespace model;

class User
{

    public function signUp($uname, $email, $pass)
    {
        $conn = $this->mysql_fix_string($_POST);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = " SELECT * FROM user WHERE userName ='{$uname}' OR email ='{$email}' ";
            $result = $conn->query($query) or die("conn faild");
            $arr = array(
                'error' => "", 'success' => "", 'ok' => false,
            );

            if ($result->num_rows > 0) {

                $arr["error"] = 'Մուտքանունը կամ Էլ. հասցեն արդեն գրանցված է';
            } else {
                $salt1 = "qm&h*";
                $salt2 = "pg!@";
                $password = hash('ripemd128', "$salt1$pass$salt2");
                $code = rand(999999, 111111);
                $status = "notverified";

                $insert = "INSERT INTO `user`(`userName`, `email`, `password`, `code`, `status`) VALUES ('{$uname}','{$email}','{$password}', '{$code}', '{$status}')";
                $result = $conn->query($insert) or die("insert faild");

                if ($result) {
                    $subject = "Էլ. հասցեի հաստատման ծածկագիր ";
                    $body = "Ձեր Էլ. հասցեի հաստատման հղումն է <a href='http://localhost/CRUD/public/signin?email=$email&code=$code'>հաստատել</a>";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: <haykanyangreta@gmail.com>' .  "\r\n ";

                    if (mail($email, $subject, $body, $headers)) {
                        $arr["success"]  = 'Հաստատման հղումը ուղարկվել է՝ ' . $email . ' էլ. հասցեին';
                    } else {
                        $arr["error"] = 'Ձախողվեց ուղարկել հաստատման հղումը';
                    }
                } else {
                    $arr["error"] = 'Ձախողվեց գրանցվել';
                }
            }
        } else {
            $arr["error"] = 'Ներմուծել ճիշտ էլ․ հասցե';
        }
        echo (json_encode($arr));
    }


    public function signIn($uname, $pass)
    {

        $conn = $this->mysql_fix_string($_POST);
        $query = " SELECT * FROM user WHERE userName ='{$uname}' ";
        $result = $conn->query($query) or die("connection faild");

        $arr = array(
            'error' => "", 'success' => "", 'ok' => false,
        );

        if ($result->num_rows > 0) {

            $fetch = $result->fetch_assoc();
            $salt1 = "qm&h*";
            $salt2 = "pg!@";
            $password = hash('ripemd128', "$salt1$pass$salt2");
            $fetch_pass = $fetch['password'];

            if ($password == $fetch_pass) {

                if ($fetch['status'] == 'verified') {

                    $_SESSION['uname'] = $uname;

                    if ($uname == 'admin') {
                        $arr["ok"] = true;
                        $arr["success"] = "admin";
                    } else {

                        $_SESSION['id'] = $fetch['userId'];
                        $_SESSION['uname'] = $uname;
                        $arr["ok"] = true;
                        $arr["success"] = "app";
                    }
                } else {
                    $arr["error"]  = "Դուք դեռ չեք հաստատել Ձեր - {$fetch['email']} Էլ. հասցեին ուղարկված հղումը";
                }
            } else {
                $arr["error"] = "Գաղտնաբառը սխալ է";
            }
        } else {
            $arr["error"] = "Այս մուտքանունով օգտատեր գրանցված չէ";
        }
        echo (json_encode($arr));
    }

    public function verified($email, $code)
    {
        $DB =  new \Database();
        $conn = $DB->connectDB();

        $query = "SELECT * FROM user WHERE email ='{$email}' AND code ='{$code}'";
        $result = $conn->query($query) or die("connection faild");

        if ($result) {

            if ($result->num_rows == 1) {

                $fetch = $result->fetch_assoc();

                if ($fetch['status'] == "notverified") {

                    $update = " UPDATE user SET code = '0'  ,status ='verified' WHERE  email ='{$fetch['email']}'";

                    if ($conn->query($update)) {
                        echo "<script>
                        alert('Հաստատված է, կարող եք մուտք գործել');
                        window.location.href = '../public/signin';
                    </script>";
                    }
                }
            }
            echo "<script>
                    alert('Էլ. հասեն արդեն Հաստատված է');
                    window.location.href = '../public/signin';
                  </script>";
        }
    }

    public function forgetPass($email)
    {
        $conn = $this->mysql_fix_string($_POST);

        $query = " SELECT * FROM user WHERE  email ='{$email}' ";
        $result = $conn->query($query) or die("connection faild");

        $arr = array(
            'error' => "", 'success' => "", 'ok' => false,
        );
        if (mysqli_num_rows($result) > 0) {
            $code = rand(999999, 111111);
            $insert = "UPDATE user SET code = $code WHERE email = '{$email}'";
            $result =  $conn->query($insert);
            if ($result) {
                $subject = "Գաղտնաբառի վերականգնման ծածկագիր ";
                $body = "Ձեր գաղտնաբառի վերականգնման ծածկագիրն է $code";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <haykanyangreta@gmail.com>' .  "\r\n ";

                if (mail($email, $subject, $body, $headers)) {
                    $_SESSION['info'] = "Ծածկագիրը ուղարկվել է Ձեր $email էլ. հասցեին";
                    $_SESSION['email'] = $email;
                    $arr["ok"] = true;
                    $arr["success"] = "Reset";
                } else {
                    $arr["error"] = "Սխալ, ծածկագիրը Էլ. հասցեին չի ուղարկվել";
                }
            } else {
                $arr["error"] = "Սխալ";
            }
        } else {
            $arr["error"] = "Էլ. հասցեն սխալ է";
        }
        echo (json_encode($arr));
    }

    public function resetCode($code)
    {
        $conn = $this->mysql_fix_string($_POST);
        $query = "SELECT * FROM user WHERE code = $code";
        $result = $conn->query($query);
        $arr = array(
            'error' => "", 'success' => "", 'ok' => false,
        );
        if (mysqli_num_rows($result) > 0) {

            $fetch_data = mysqli_fetch_assoc($result);

            $_SESSION['email'] = $fetch_data['email'];
            $_SESSION['info'] = 'Ստեղծեք նոր գաղտնաբառ որը նախկինում չեք օգտագործել';

            $arr["ok"] = true;
            $arr["success"] = "Newpass";
        } else {
            $arr['error'] = 'Ներմուծված ծածկագիրը սխալ է';
        }
        echo (json_encode($arr));
    }

    public function changePass($password, $cpassword)
    {
        $conn = $this->mysql_fix_string($_POST);
        $arr = array(
            'error' => "", 'success' => "", 'ok' => false,
        );
        if ($password !== $cpassword) {
            $arr['error'] = "Գաղտնաբառը չի համապատասխանում";
        } else {
            $code = 0;
            $email = $_SESSION['email'];
            $salt1 = "qm&h*";
            $salt2 = "pg!@";
            $password = hash('ripemd128', "$salt1$password$salt2");
            $query = "UPDATE user SET code = $code, password = '$password' WHERE email = '$email'";
            $result = $conn->query($query);
            if ($result) {
                $_SESSION['info'] = "Ձեր գաղտնաբառը փոխված է";
                $arr["ok"] = true;
                $arr["success"] = "signin";
            } else {
                $arr['error'] = "Ձախողվեց գաղտնաբառը փոխել";
            }
        }
        echo (json_encode($arr));
    }

    public function mysql_fix_string(array $metod)
    {
        $DB =  new \Database();
        $conn = $DB->connectDB();

        foreach ($metod as $key => $value) {
            $metod[$key] = htmlentities($conn->real_escape_string($value));
        }
        return $conn;
    }
}
