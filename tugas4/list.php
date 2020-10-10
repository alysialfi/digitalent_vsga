<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="list.css">
<body>

<?php 


  $json = '[{"name":"Beef Satay","price":"75000"},
              {"name":"Omelette with Lamb","price":"55000"},
              {"name":"Spagetti de France","price":"95000"},
              {"name":"Cocktail with Jelly","price":"45000"}]';

  $json_decoded = json_decode($json);
  $sum = 0;

  echo '<form method="post">
          <div class="container d-flex justify-content-center container2">
          <div class="list-group list">
          <div class="list-group-item list-group-item-action active text-center">
              Todays Menu
          </div>';
  foreach ($json_decoded as $result) {

    echo '<div class="list-group-item list-group-item-action" id="onebg">
          <div class="row">';
    echo '<div class="col">
                <input name="food[]" type="checkbox" value="'.$result->price.'" onClick="test(this);"/>
                <input name="type[]" type="hidden" value="'.$result->name.'"><span>' . $result->name . '</span></input>
                </div>';
    echo '<div class="col text-right">
              <span>' . $result->price . '</span>
              </div>';
    echo '</div></div>';
  }
    echo'<div class="list-group-item">
          <div class="row">
            <div class="col">
              <span>Total: </span>
            </div>
            <div class="col text-right">
              <span id="Totalcost">0</span>
            </div>
          </div>
        </div>';
    echo '</form></div></div>';
?>  

</body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    
    var total = 0;

    function test(item){
      if(item.checked){
        total+= parseInt(item.value);
      }
      else{
        total-= parseInt(item.value);
      }
      document.getElementById('Totalcost').innerHTML = total;
    }


  </script>

</html>
