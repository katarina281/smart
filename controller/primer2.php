<?php
require 'pdfcrowd.php';

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("kaca97", "4b192881736f7345ff2e689322e5e1a7");

    // create output stream for conversion result
    $output_stream = fopen("NašSajt.pdf", "wb");

    // check for a file creation error
    if (!$output_stream)
        throw new \Exception(error_get_last()['message']);

    // run the conversion and write the result into the output stream
    $client->convertFileToStream("../view/index.html", $output_stream);

    // close the output stream
    fclose($output_stream);
    header('Location: ../view/admin.php');
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

?>