<?php
include "../cnx.php";
$cat_res = mysqli_query($cnx, "SELECT * FROM categories");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = mysqli_real_escape_string($cnx, $_POST['title']);
  $description = mysqli_real_escape_string($cnx, $_POST['description']);
  $price = (float) $_POST['price'];
  $quantity = (int) $_POST['quantity'];
  $category = (int) $_POST['category'];

  $upload_dir = "../uploads/uploaded/";
  $img_name = basename($_FILES["pro_images"]["name"]);
  $img_name = preg_replace("/[^A-Za-z0-9.\-_]/", '', $img_name); // Nettoyer le nom
  $pro_images = $upload_dir . time() . "_" . $img_name; // Renommer avec timestamp

  if (move_uploaded_file($_FILES["pro_images"]["tmp_name"], $pro_images)) {
    $d = date("Y-m-d H:i:s");

    $stmt = mysqli_prepare($cnx, "INSERT INTO products (name, description, price, stock_quantity, category_id, image_url, created_at, updated_at) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssdiisss', $title, $description, $price, $quantity, $category, $pro_images, $d, $d);
    $result_of_ins = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($result_of_ins) {
      echo "<script>alert('Product successfully added.');</script>";
    } else {
      echo "<script>alert('Database insertion error.');</script>";
    }
  } else {
    echo "<script>alert('File upload failed.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product Upload</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="main.js"></script>
</head>

<body>
  <?php include '../adminsidebar.php'; ?>

  <div class="form-container">
    <h2><i class="fas fa-plus-circle"></i> Create New Listing</h2>
    <form id="productForm" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="photos">
          <i class="fas fa-images"></i> Photos
          <span class="required">*</span>
        </label>
        <div class="photo-upload" id="photoUploadArea">
          <i class="fas fa-camera"></i>
          <p>Drag photos here or click to upload</p>
          <p class="upload-hint">Supported formats: JPG, PNG, GIF (Max 5MB each)</p>
          <input type="file" id="photos" name="pro_images" accept="image/*" required>
        </div>
      </div>

      <div class="form-group">
        <label for="title">
          <i class="fas fa-heading"></i> Title
          <span class="required">*</span>
        </label>
        <input type="text" id="title" name="title" placeholder="What are you selling?" required minlength="3">
        <div class="input-hint">Minimum 3 characters</div>
      </div>

      <div class="form-group">
        <label for="price">
          <i class="fas fa-tag"></i> Price
          <span class="required">*</span>
        </label>
        <div class="price-container">
          <input type="number" id="price" name="price" placeholder="0.00" min="0.01" step="0.01" required>
        </div>
        <div class="input-hint">Enter a price greater than 0</div>
      </div>

      <div class="form-group">
        <label for="quantity">
          <i class="fas fa-box"></i> Quantity
          <span class="required">*</span>
        </label>
        <div class="quantity-container">
          <input type="number" id="quantity" name="quantity" placeholder="0" min="1" required>
        </div>
        <div class="input-hint">Enter the stock quantity</div>
      </div>

      <div class="form-group">
        <label for="category">
          <i class="fas fa-tags"></i> Category
          <span class="required">*</span>
        </label>
        <select name="category" id="category" required>
          <option value="" disabled selected>Select a category</option>
          <?php while ($t = mysqli_fetch_assoc($cat_res)): ?>
            <option value="<?php echo $t['category_id']; ?>"><?php echo htmlspecialchars($t['name']); ?></option>
          <?php endwhile; ?>
        </select>
        <div class="input-hint">Select a category for your product</div>
      </div>

      <div class="form-group">
        <label for="description">
          <i class="fas fa-align-left"></i> Description
          <span class="required">*</span>
        </label>
        <textarea id="description" name="description"
          placeholder="Include details like size, brand, color, condition, etc." required minlength="10"></textarea>
        <div class="input-hint">Minimum 10 characters</div>
      </div>

      <button type="submit" class="btn">
        <i class="fas fa-paper-plane"></i> Publish Listing
      </button>
    </form>
  </div>
</body>

</html>
<?php mysqli_close($cnx); ?>