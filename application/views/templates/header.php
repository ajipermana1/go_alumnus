<!doctype html>
<html lang="en">

<head>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

  <title><?= $judul; ?></title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url(); ?>/home">Belajar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a <?php if ($this->uri->segment(1) == 'home') {
                  echo 'class="nav-link active"';
                } else {
                  echo 'class="nav-link"';
                } ?> aria-current="page" href="<?= base_url(); ?>home">Home</a>
          </li>
          <li class="nav-item">
            <a <?php if ($this->uri->segment(1) == 'about') {
                  echo 'class="nav-link active"';
                } else {
                  echo 'class="nav-link"';
                }  ?> href=" <?= base_url(); ?>about">About</a>
          </li>
          <li class="nav-item">
            <a <?php if ($this->uri->segment(1) == 'mydata') {
                  echo 'class="nav-link active"';
                } else {
                  echo 'class="nav-link"';
                }  ?> href=" <?= base_url(); ?>mydata">Data</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- </nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= BASEURL; ?>/home">Belajar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL; ?>/mydata">Data</a>
        </li>
    
      </ul>
    </div>
  </div>
</nav> -->