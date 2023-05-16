<?php
include 'functions.php';

?>

<?=template_header('Home')?>

<center>
<div class="content">
	<h1>Welcome to the home page!</h1>

</div>
</center>
<div class="button-list">
  <button class="button" id="btn1" onclick="window.location.href='create.php'">CREATE</button>
  <button class="button" id="btn2" onclick="window.location.href='read.php'">READ</button>
  <button class="button"id="btn3" onclick="window.location.href='update.php'">UPDATE</button>
  <button class="button"id="btn4" onclick="window.location.href='delete.php'">DELETE</button>
</div>

<style>
  .content{
    padding:20px;
    font-weight: bold;
  }

  .button-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
  }
  #btn1{
    
    background:rgba(255,0,0,.7);
  }
  #btn2{
    background:rgba(0,255,0,.7);
  }
  #btn3{
    background:rgba(0,0,255,.7);
  }
  #btn4{
    background:#ab91cf ;
  }

  .button {
    color:rgb(34,34,71);
    display: flex;
    justify-content: center;
    align-items: center;
    width: 150px;
    height: 100px;
   margin-top: 150px;
    color: white;
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }
  

  .button:hover {
    background-color: #0062cc;
  }
</style>




  

<?=template_footer()?>