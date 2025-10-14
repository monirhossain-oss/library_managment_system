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


// function to get all books 
function getAllBooks()
{
    global $conn;
    $sql = "SELECT * FROM books ORDER BY id DESC";
    $result = $conn->query($sql);
    return $result;
}
