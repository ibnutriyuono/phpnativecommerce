		<div class="container">
			<div class="section">
				<div class="row">
					<?php 

						//$connect = mysqli_connect("localhost", "id6454777_atol", "123468", "id6454777_atol");

						if(isset($_POST["add_to_cart"]))
						{
                            if($_POST["quantity"] < 1){
                            	?>
										<script type="text/javascript">
										swal({
										title: "Quantity Error!",
										text: "Jumlah Pesanan tidak boleh 0 atau minus",
										icon: "info",
										button: "Kembali",
									  	});
										</script>
								<?php
                            }elseif(isset($_SESSION["shopping_cart"]))
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
										?>
										<script type="text/javascript">
										swal({
										title: "Remove Data",
										text: "Item di shopping cart, Sudah Berhasil Di Hapus",
										icon: "info",
										button: "Kembali",
									  	});
										//window.location.href="index.php?page=produk";
										</script>
										<?php
									}
								}
							}
						}

					?>
						<br />

						<h3>Order Details</h3>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th width="40%">Nama Produk</th>
									<th width="10%">Jumlah</th>
									<th width="20%">Harga</th>
									<th width="15%">Total</th>
									<th width="5%">Action</th>
								</tr>
								<?php
						if(!empty($_SESSION["shopping_cart"]))
						{
							$total = 0;
							foreach($_SESSION["shopping_cart"] as $keys => $values)
							{
						?>
									<tr>
										<td>
											<?php echo $values["item_name"]; ?>
										</td>
										<td>
											<?php echo $values["item_quantity"]; ?>
										</td>
										<td>Rp.
											<?php echo $values["item_price"]; ?>
										</td>
										<td>Rp.
											<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>
										</td>
										<td>
											<a href="index.php?page=cart&action=delete&id=<?php echo $values["item_id"]; ?>">
												<span class="text-danger">Remove</span>
											</a>
										</td>
									</tr>
									<?php
								$total = $total + ($values["item_quantity"] * $values["item_price"]);
							}
						?>
										<tr>
											<td colspan="3" align="right">Total</td>
											<td align="right">Rp.
												<?php echo number_format($total, 2); ?>
											</td>
											<td>
												<form method="post" action="function/user/checkout.php">
													<input class="btn" type="submit" name="submit" value="Bayar">
												</form>
											</td>
										</tr>
										<?php
						}
						?>

							</table>
						</div>
						<!-- <? print_r($_SESSION['shopping_cart']);?> -->

					</div>
				</div>
				<br />
				</div>
			</div>
		</div>
