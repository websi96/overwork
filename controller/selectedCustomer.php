<?php
$dbconn = pg_connect("host=localhost dbname=h1553755 user=h1553755 password=h1553755");

//Note that we put extra quotes around values
$query="select * from customers
where customer_id = all (
	select selectedcustomer from users
	where userid = 1
	);";

$result = pg_query($query);

$row = pg_fetch_object($result);
echo "<div class='row header'>
        <div class='cell'>
            Name
        </div>
        <div class='cell'>
            Surname
        </div>
        <div class='cell'>
            Adress
        </div>
        <div class='cell'>
            Registered Since
        </div>
    </div>";

while($row) {
echo "<div class='row'>"; 
echo "<div class='cell'> $row->name </div>";
echo "<div class='cell'> $row->surname </div>";
echo "<div class='cell'> $row->adress </div>";
echo "<div class='cell'> $row->registered_since </div>"; 
echo "</div>";
$row = pg_fetch_object($result);
}
pg_free_result($result);
pg_close($dbconn);
?>