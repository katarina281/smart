<?php
require 'pdfcrowd.php';

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("kaca97", "4b192881736f7345ff2e689322e5e1a7");

    // run the conversion and write the result to a file
    $client->convertUrlToFile("https://www.samsung.com/levant/air-conditioners/all-air-conditioners/", "klime.pdf");
    header('Location: ../view/index.html');
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

?>