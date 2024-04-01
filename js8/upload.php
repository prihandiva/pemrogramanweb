<?php
//langkah 1 praktikum 1 upload file
// if (isset($_POST["submit"])) {
//     $targetDirectory = "uploads/"; // Direktori tujuan untuk menyimpan file
//     $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetfile)) {
//         echo "File berhasil diunggah.";
//     } else {
//         echo "Gagal mengunggah file.";
//     }
// }

//langkah 5 praktikum 1 upload file
//<?php
// if (isset($_POST["submit"])) {
//     $targetDirectory = "uploads/"; // Direktori tujuan untuk menyimpan file
//     $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
//     $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//     $allowedExtensions = array("jpg", "jpeg", "png", "gif");

//     $maxFileSize = 5 * 1024 * 1024;

//     if (in_array($fileType, $allowedExtensions) && $_FILES["fileToUpload"]["size"] <= $maxfileSize) {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
//         echo "File berhasil diunggah.";
//     } else {
//         echo "Gagal mengunggah file.";
//     }
//     } else {
//         echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
//     }
// }

//langkah 8 praktikum 1 upload file
if (isset($_POST["submit"])) {
    $targetDirectory = "docunents/"; // Direktori tujuan untuk menyimpan dokunen
    $targetFile = $targetDirectory . basename($_FILES["documentToUpload"]["name"]);
    $documentFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedExtensions = array("txt", "pdf", "doc", "docx");

    $maxFileSize = 10 * 1024 * 1024;

    if (in_array($documentFileType, $allowedExtensions) && $_FILES["documentToUpload"]["size"] <- $maxFileSize) {
        if (move_uploaded_file($_FILES["documentToUpload"]["tmp_name"], $targetFile)) {
                echo "Dokumen berhasil diunggah.";
        } else {
                echo "Gagal mengunggah dokumen.";
        }
    } else {
        echo "Jenis dokumen tidak valid atau melebihi ukuran maksimum yang diizinkan.";
    }
}