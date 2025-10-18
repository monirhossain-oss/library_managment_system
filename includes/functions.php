<?php
include_once("../config/db_connect.php");



// Function to add book
function addBook($title, $author, $genre, $year, $price, $desc, $image)
{
    global $conn;
    $sql = "INSERT INTO books (book_title, author_name, genre, published_year, price, description, cover_image)
    VALUES ('$title', '$author', '$genre', '$year', '$price', '$desc', '$image')";

    if ($conn->query($sql)) {
        return true;
    } else {
        return $conn->error;
    }
}

global $conn;

function addUser($full_name,$email,$password){
    global $conn;
    $hased_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name','$email','$hased_password')";
    if ($conn->query($sql)) {
        return true;
    }else{
        return $conn->error;
    }
}


function getUserByEmail( $email ){
    global $conn;
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1 ";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }else{
        return false;
    }
}

// function to get all books 
function getAllBooks()
{
    global $conn;
    $sql = "SELECT * FROM books ORDER BY id DESC";
    $result = $conn->query($sql);
    return $result;
}
