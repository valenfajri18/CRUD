<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
Data Diri
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<style>
    img{
        display: block;
        margin: auto;
    }
    table, td{
        margin-top: 20px;
        color: black;
        width: 100%;
        border-collapse: collapse;
        table-layout:fixed;
        width: 100%;
    }
    h1{
        text-align: center;
        background-color: rgb(0, 0, 128);
        color: white;
    }
    img{
        border-radius: 50%;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="container">
        <p style="text-align: center; font-weight: bold; font-size: 30px">CRUD CODE IGNITER
</p>
        <div class="content">
            <img src="img/ci.jpg" alt="Code Igniter" width="300" height="300" >
        </div>
    </div>
<?= $this->endSection() ?>