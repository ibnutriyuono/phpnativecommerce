<?php 

$connect = mysqli_connect("localhost", "root", "", "db_atol");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>swal({
				title: "Ubah Jumlah di Shopping Cart",
				text: "Item sudah ada di shopping cart, silahkan rubah di shopping cart dengan cara remove dan masukkan kembali dengan mengganti jumlah dibawah",
				icon: "info",
				button: "Kembali",
			  });</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?>


                            <h2 class="center-align">LIST PRODUK</h2>
        <?php 
    include 'config/conn.php';
    // $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY id_post DESC");
    ?>
        <?php
				$query = "SELECT * FROM posts ORDER BY id_post ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
		?>
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col s12 m4 offset-m1">
                        <form method="post" action="index.php?page=cart&action=add&id=<?php echo $row["id_post"]; ?>">
                            <div class="card">
                                <div class="card-image">
                                    <img src="assets/images/post/<?php echo $row['image'];?>">
                                    <span class="card-title">
                                        <?php echo $row['title'];?>
                                    </span>
                                </div>
                                <div class="card-content">
                                    <p>Harga = Rp.
                                        <?php echo $row['price'];?>/pcs</p>
                                    <p>Stock =
                                        <?php echo $row['stock'];?> buah</p>
                                        <input type="number" name="quantity" value="1" class="form-control" />
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["title"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                                </div>
                                <div class="card-action">
                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
					}
				}
			?>